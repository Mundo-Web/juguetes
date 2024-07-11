<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\Products;
use App\Models\Sale;
use App\Models\SaleDetail;
use Culqi\Culqi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SoDe\Extend\JSON;
use SoDe\Extend\Response;

class PaymentController extends Controller
{
  public function culqi(Request $request)
  {
    $body = $request->all();
    $response = new Response();
    $culqi = new Culqi(['api_key' => env('CULQI_PRIVATE_KEY')]);

    $sale = new Sale();
    try {

      $productsJpa = Products::select(['id', 'imagen', 'producto', 'precio', 'descuento'])
        ->whereIn('id', array_map(fn ($x) => $x['id'], $body['cart']))
        ->get();

      $totalCost = 0;
      foreach ($productsJpa as $productJpa) {
        $key = array_search($productJpa->id, array_column($body['cart'], 'id'));
        if ($productJpa->descuento > 0) {
          $totalCost += $productJpa->descuento * $body['cart'][$key]['quantity'];
        } else {
          $totalCost += $productJpa->precio * $body['cart'][$key]['quantity'];
        }
      }

      $sale->name = $body['contact']['name'];
      $sale->lastname = $body['contact']['lastname'];
      $sale->email = Auth::check() ? Auth::user()->email : $body['contact']['email'];
      $sale->phone = $body['contact']['phone'];
      $sale->address_price = 0;
      $sale->total = $totalCost;


      if ($request->address) {
        $price = Price::with([
          'district',
          'district.province',
          'district.province.department'
        ])
          ->where('prices.id', $body['address']['id'])
          ->first();

        if ($price) {
          $totalCost += $price->price;

          $sale->address_department = $price->district->province->department->description;
          $sale->address_province = $price->district->province->description;
          $sale->address_district = $price->district->description;
          $sale->address_street = $body['address']['street'];
          $sale->address_number = $body['address']['number'];
          $sale->address_description = $body['address']['description'];
          $sale->address_price = $price->price;
        }
      }

      $sale->status_id = 1;
      $sale->status_message = 'La venta se ha creado. Aun no se ha pagado';
      $sale->code = '000000000000';

      $sale->save();

      foreach ($productsJpa as $productJpa) {
        $key = array_search($productJpa->id, array_column($body['cart'], 'id'));
        $quantity = $body['cart'][$key]['quantity'];
        $price = $productJpa->descuento > 0 ? $productJpa->descuento : $productJpa->precio;

        SaleDetail::create([
          'sale_id' => $sale->id,
          'product_image' => $productJpa->imagen,
          'product_name' => $productJpa->producto,
          'quantity' => $quantity,
          'price' => $price
        ]);
      }

      $config = [
        "amount" => round($totalCost * 100),
        "capture" => true,
        "currency_code" => "PEN",
        "description" => "Compra en Decotab",
        "email" => $body['culqi']['email'] ?? $body['contact']['email'],
        "installments" => 0,
        "antifraud_details" => [
          "address" => isset($request['address']['street']) ? $request['address']['street'] : 'Sin direccion',
          "address_city" => isset($request['address']['city']) ? $request['address']['city'] : 'Sin ciudad',
          "country_code" => "PE",
          "first_name" => $request['contact']['name'],
          "last_name" => $request['contact']['lastname'],
          "phone_number" => $request['contact']['phone'],
        ],
        "source_id" => $request['culqi']['id']
      ];

      $charge = $culqi->Charges->create($config);

      if (gettype($charge) == 'string') {
        $res = JSON::parse($charge);
        throw new Exception($res['user_message']);
      }

      $response->status = 200;
      $response->message = "Cargo creado correctamente";
      $response->data = [
        'charge' => $charge,
        'reference_code' => $charge?->reference_code ?? null,
        'amount' => $totalCost
      ];

      $sale->status_id = 3;
      $sale->status_message = 'La venta se ha generado y ha sido pagada';
      $sale->code = $charge?->reference_code ?? null;
    } catch (\Throwable $th) {
      $response->status = 400;
      $response->message = $th->getMessage();

      $sale->status_id = 2;
      $sale->status_message = $th->getMessage();
    } finally {
      $sale->save();
      return response($response->toArray(), $response->status);
    }
  }
}
