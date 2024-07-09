<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Culqi\Culqi;
use Exception;
use Illuminate\Http\Request;
use SoDe\Extend\JSON;
use SoDe\Extend\Response;

class PaymentController extends Controller
{
  public function culqi(Request $request)
  {
    $body = $request->all();
    $response = new Response();
    $culqi = new Culqi(['api_key' => env('CULQI_PRIVATE_KEY')]);
    try {

      $productsJpa = Products::select(['id', 'precio', 'descuento'])
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
    } catch (\Throwable $th) {
      $response->status = 400;
      $response->message = $th->getMessage();
    } finally {
      return response($response->toArray(), $response->status);
    }
  }
}
