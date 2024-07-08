<?php

namespace App\Http\Controllers;

use App\Helpers\EmailConfig;
use App\Http\Requests\StoreIndexRequest;
use App\Http\Requests\UpdateIndexRequest;
use App\Models\Attributes;
use App\Models\AttributesValues;
use App\Models\Faqs;
use App\Models\General;
use App\Models\Index;
use App\Models\Message;
use App\Models\Products;
use App\Models\Slider;
use App\Models\Strength;
use App\Models\Testimony;
use App\Models\Category;
use App\Models\Department;
use App\Models\Galerie;
use App\Models\PolyticsCondition;
use App\Models\Price;
use App\Models\Specifications;
use App\Models\TermsAndCondition;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

use function PHPUnit\Framework\isNull;

class IndexController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    // $productos = Products::all();
    $url_env = env('APP_URL');
    $productos =  Products::with('tags')->get();
    $categorias = Category::all();
    $destacados = Products::where('destacar', '=', 1)->where('status', '=', 1)
      ->where('visible', '=', 1)->with('tags')->activeDestacado()->get();
    $descuentos = Products::where('descuento', '>', 0)->where('status', '=', 1)
      ->where('visible', '=', 1)->with('tags')->activeDestacado()->get();

    $general = General::all();
    $benefit = Strength::where('status', '=', 1)->get();
    $faqs = Faqs::where('status', '=', 1)->where('visible', '=', 1)->get();
    $testimonie = Testimony::where('status', '=', 1)->where('visible', '=', 1)->get();
    $slider = Slider::where('status', '=', 1)->where('visible', '=', 1)->get();
    $category = Category::where('status', '=', 1)->where('destacar', '=', 1)->get();



    return view('public.index', compact('url_env', 'productos', 'destacados', 'descuentos', 'general', 'benefit', 'faqs', 'testimonie', 'slider', 'categorias', 'category'));
  }

  public function catalogo(Request $request, ?string $category = '0', ?string $subcategory = '0')
  {
    $categorias = null;
    $productos = null;

    $rangefrom = $request->query('rangefrom');
    $rangeto = $request->query('rangeto');
    $url_env = env('APP_URL');




    try {
      $general = General::all();
      $faqs = Faqs::where('status', '=', 1)->where('visible', '=', 1)->get();

      $categorias = Category::all();

      $testimonie = Testimony::where('status', '=', 1)->where('visible', '=', 1)->get();



      if ($category == 0) {
        $productos = Products::where('status', '=', 1)->where('visible', '=', 1)->paginate(9);
        $categoria = Category::all();
      } else {
        $productos = Products::select('products.*')
          ->join('categories', 'products.categoria_id', '=', 'categories.id')
          ->where('categories.slug', '=', $category)
          ->where('products.status', '=', 1)
          ->where('products.visible', '=', 1)
          ->paginate(9);
        $categoria = Category::where('slug', $category)->first();
      }

      if ($rangefrom !== null && $rangeto !== null) {

        if ($category == 0) {
          $productos = Products::where('status', '=', 1)->where('visible', '=', 1)->paginate(9);
          $categoria = Category::all();
        } else {
          $productos = Products::select('products.*')
            ->join('categories', 'products.categoria_id', '=', 'categories.id')
            ->where('categories.slug', '=', $category)
            ->where('products.status', '=', 1)
            ->where('products.visible', '=', 1)
            ->paginate(9);
          $categoria = Category::where('slug', $category)->first();
        }

        $cleanedData = $productos->filter(function ($value) use ($rangefrom, $rangeto) {

          if ($value['descuento'] == 0) {

            if ($value['precio'] <= $rangeto && $value['precio'] >= $rangefrom) {
              return $value;
            }
          } else {

            if ($value['descuento'] <= $rangeto && $value['descuento'] >= $rangefrom) {
              return $value;
            }
          }
        });

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $productos = new LengthAwarePaginator(
          $cleanedData->forPage($currentPage, 9), // Obtener los productos por página
          $cleanedData->count(), // Contar todos los elementos
          9, // Número de elementos por página
          $currentPage, // Página actual
          ['path' => request()->url()] // URL base para la paginación
        );
      }

      $destacados = Products::where('destacar', '=', 1)->where('status', '=', 1)
        ->where('visible', '=', 1)->with('tags')->activeDestacado()->get();

      return view('public.catalogo', compact('url_env', 'general', 'faqs', 'categorias', 'testimonie', 'category', 'productos', 'categoria', 'rangefrom', 'rangeto', 'destacados'));
    } catch (\Throwable $th) {
      // dump($th->getMessage());
    }
  }

  public function comentario()
  {
    $comentarios = Testimony::where('status', '=', 1)->where('visible', '=', 1)->paginate(15);
    $categorias = Category::all();
    $contarcomentarios = count($comentarios);
    $url_env = env('APP_URL');
    $destacados = Products::where('destacar', '=', 1)->where('status', '=', 1)
      ->where('visible', '=', 1)->with('tags')->activeDestacado()->get();
    return view('public.comentario', compact('comentarios', 'contarcomentarios', 'url_env', 'categorias', 'destacados'));
  }

  public function hacerComentario(Request $request)
  {
    $user = auth()->user();

    $newComentario = new Testimony();
    if (isset($user)) {
      $alert = null;
      $request->validate([
        'testimonie' => 'required',
      ], [
        'testimonie.required' => 'Ingresa tu comentario',
      ]);

      $newComentario->name = $user->name;
      $newComentario->testimonie = $request->testimonie;
      $newComentario->visible = 0;
      $newComentario->status = 1;
      $newComentario->email = $user->email;
      $newComentario->save();

      $mensaje = "Gracias. Tu comentario pasará por una validación y será publicado.";
      $alert = 1;
    } else {
      $alert = 2;
      $mensaje = "Inicia sesión para hacer un comentario";
    }

    return redirect()->route('comentario')->with(['mensaje' => $mensaje, 'alerta' => $alert]);
  }

  public function contacto()
  {
    $general = General::all();
    $categorias = Category::all();
    $url_env = env('APP_URL');
    $destacados = Products::where('destacar', '=', 1)->where('status', '=', 1)
      ->where('visible', '=', 1)->with('tags')->activeDestacado()->get();

    return view('public.contact', compact('general', 'url_env', 'categorias', 'destacados'));
  }

  public function carrito()
  {
    //
    $destacados = Products::where('destacar', '=', 1)->where('status', '=', 1)
      ->where('visible', '=', 1)->with('tags')->activeDestacado()->get();
    $categorias = Category::all();
    $url_env = env('APP_URL');
    return view('public.checkout_carrito', compact('url_env', 'categorias', 'destacados'));
  }

  public function pago()
  {
    //
    $detalleUsuario = [];
    $user = auth()->user();

    if (!is_null($user)) {
      $detalleUsuario = UserDetails::where('email', $user->email)->get();
    }

    // $departamento = DB::select('select * from departments where active = ? order by 2', [1]);
    $departments = Price::select([
      'departments.id AS id',
      'departments.description AS description',
    ])
      ->join('districts', 'districts.id', 'prices.distrito_id')
      ->join('provinces', 'provinces.id', 'districts.province_id')
      ->join('departments', 'departments.id', 'provinces.department_id')
      ->where('departments.active', 1)
      ->groupBy('id', 'description')
      ->get();

    $provinces = Price::select([
      'provinces.id AS id',
      'provinces.description AS description',
      'provinces.department_id AS department_id'
    ])
      ->join('districts', 'districts.id', 'prices.distrito_id')
      ->join('provinces', 'provinces.id', 'districts.province_id')
      ->where('provinces.active', 1)
      ->groupBy('id', 'description', 'department_id')
      ->get();

    $districts = Price::select([
      'districts.id AS id',
      'districts.description AS description',
      'districts.province_id AS province_id'
    ])
      ->join('districts', 'districts.id', 'prices.distrito_id')
      ->where('districts.active', 1)
      ->groupBy('id', 'description', 'province_id')
      ->get();

    // $distritos  = DB::select('select * from districts where active = ? order by 3', [1]);
    // $provincias = DB::select('select * from provinces where active = ? order by 3', [1]);

    $categorias = Category::all();

    $destacados = Products::where('destacar', '=', 1)->where('status', '=', 1)
      ->where('visible', '=', 1)->with('tags')->activeDestacado()->get();


    $url_env = env('APP_URL');
    return view('public.checkout_pago', compact('url_env', 'districts', 'provinces', 'departments', 'detalleUsuario', 'categorias', 'destacados'));
  }

  public function procesarPago(Request $request)
  {

    $codigoAleatorio = '';
    $mensajes2compra = [
      'email.required' => 'El campo Email es obligatorio.',
      'nombre.required' => 'El campo Nombre es obligatorio.',
      'apellidos.required' => 'El campo Email es obligatorio.',
      'departamento_id.required ' => 'Seleccione un Departamento es obligatorio.',
      'provincia_id.required' => 'Seleccione una Provincia es obligatorio.',
      'distrito_id.required' => 'Seleccione un Distrito obligatorio.',
      'dir_av_calle.required' => 'El campo Avenida/Calle obligatorio.',
      'dir_numero.required' => 'El campo Numero es obligatorio.'
    ];

    try {
      $reglasPrimeraCompra = [
        'email' => 'required',
      ];
      $mensajes = [
        'email.required' => 'El campo Email es obligatorio.',

      ];
      $request->validate($reglasPrimeraCompra, $mensajes);

      $email = $request->email;
      $existeUser = UserDetails::where('email', $email)->get()->toArray();

      if (count($existeUser) === 0) {
        UserDetails::create($request->all());
        $datos = $request->all();
        $codigoAleatorio = $this->codigoVentaAleatorio();
        $this->guardarOrden();
        $this->envioCorreoCompra($datos);
        return response()->json(['message' => 'Data procesada correctamente', 'codigoCompra' => $codigoAleatorio],);
      } else {
        $existeUsuario = User::where('email', $email)->get()->toArray();

        if ($existeUsuario) {
          $validator = Validator::make($request->all(), [
            'email' => 'required',
            'nombre' => 'required',
            'apellidos' => 'required',
            'departamento_id' => 'required',
            'provincia_id' => 'required',
            'distrito_id' => 'required',
            'dir_av_calle' => 'required',
            'dir_numero' => 'required',
            'dir_bloq_lote' => 'required',
            // Otras reglas de validación
          ]);

          if ($validator->fails()) {
            // Aquí puedes manejar el error como desees, por ejemplo, devolver una respuesta con los errores
            return response()->json(['errors' => $validator->errors()], 422);
          } else {
            $datos = $request->all();
            //Procesar Compra
            $userdetailU = UserDetails::where('email', $email)->first();
            $userdetailU->update($request->all());

            $codigoAleatorio = $this->codigoVentaAleatorio();
            $this->guardarOrden();
            $this->envioCorreoCompra($datos);
            return response()->json(['message' => 'Todos los datos estan correctos', 'codigoCompra' => $codigoAleatorio],);
          }
        } else {
          return response()->json(['errors' => 'Por favor registrese e inicie session '], 422);
        }
      }
    } catch (\Throwable $th) {
      //throw $th;
      return response()->json(['message' => $th], 400);
    }
  }

  private function guardarOrden()
  {
    //almacenar venta, generar orden de pedido , guardar en tabla detalle de compra, li
  }

  private function codigoVentaAleatorio()
  {
    $codigoAleatorio = '';

    // Longitud deseada del código
    $longitudCodigo = 10;

    // Genera un código aleatorio de longitud 10
    for ($i = 0; $i < $longitudCodigo; $i++) {
      $codigoAleatorio .= mt_rand(0, 9); // Agrega un dígito aleatorio al código
    }
    return $codigoAleatorio;
  }

  public function agradecimiento()
  {
    //
    $categorias = Category::all();
    return view('public.checkout_agradecimiento', compact(
      'categorias'
    ));
  }

  public function cambiofoto(Request $request)
  {


    $user = User::findOrFail($request->id);

    if ($request->hasFile("image")) {

      $file = $request->file('image');
      $route = 'storage/images/users/';
      $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();

      if (File::exists(storage_path() . '/app/public/' . $user->profile_photo_path)) {
        File::delete(storage_path() . '/app/public/' . $user->profile_photo_path);
      }

      $this->saveImg($file, $route, $nombreImagen);

      $routeforshow = 'images/users/';
      $user->profile_photo_path = $routeforshow . $nombreImagen;

      $user->save();

      return response()->json(['message' => 'La imagen se cargó correctamente.']);
    }
  }

  public function actualizarPerfil(Request $request)
  {

    $name = $request->name;
    $lastname = $request->lastname;
    $email = $request->email;
    $user = User::findOrFail($request->id);


    if ($request->password !== null || $request->newpassword !== null || $request->confirmnewpassword !== null) {
      if (!Hash::check($request->password, $user->password)) {
        $imprimir = "La contraseña actual no es correcta";
        $alert = "error";
      } else {
        $user->password = Hash::make($request->newpassword);
        $imprimir = "Cambio de contraseña exitosa";
        $alert = "success";
      }
    }


    if ($user->name == $name &&  $user->lastname == $lastname) {
      $imprimir = "Sin datos que actualizar";
      $alert = "question";
    } else {
      $user->name = $name;
      $user->lastname = $lastname;
      $alert = "success";
      $imprimir = "Datos actualizados";
    }


    $user->save();
    return response()->json(['message' => $imprimir, 'alert' => $alert]);
  }

  public function micuenta()
  {
    $user = Auth::user();
    return view('public.dashboard', compact('user'));
  }


  public function pedidos()
  {
    $user = Auth::user();
    return view('public.dashboard_order',  compact('user'));
  }


  public function direccion()
  {
    $user = Auth::user();
    $direcciones = UserDetails::where('email', $user->email)->get();

    return view('public.dashboard_direccion', compact('user', 'direcciones'));
  }

  public function error()
  {
    //
    return view('public.404');
  }

  public function producto(string $id)
  {

    // $productos = Products::where('id', '=', $id)->first();
    // $especificaciones = Specifications::where('product_id', '=', $id)->get();
    $product = Products::findOrFail($id);
    $especificaciones = Specifications::where('product_id', '=', $id)
      ->where(function ($query) {
        $query->whereNotNull('tittle')
          ->orWhereNotNull('specifications');
      })
      ->get();
    $productosConGalerias = DB::select("
            SELECT products.*, galeries.*
            FROM products
            INNER JOIN galeries ON products.id = galeries.product_id
            WHERE products.id = :productId limit 5 
        ", ['productId' => $id]);


    // $IdProductosComplementarios = $productos->toArray();
    // $IdProductosComplementarios = $IdProductosComplementarios[0]['categoria_id'];

    $ProdComplementarios = Products::select()
      ->where('id', '<>', $id)
      ->where('categoria_id', '=', $product->categoria_id)
      ->where('status', '=', true)
      ->where('visible', '=', true)
      ->get();
    $atributos = Attributes::where("status", "=", true)->get();
    $valorAtributo = AttributesValues::where("status", "=", true)->get();
    $url_env = env('APP_URL');

    $capitalizeFirstLetter = function ($string) {
      // Convert the entire string to lowercase
      $string = strtolower($string);
      // Capitalize the first letter and concatenate with the rest of the string
      return ucfirst($string);
    };

    $categorias = Category::all();

    $destacados = Products::where('destacar', '=', 1)->where('status', '=', 1)
      ->where('visible', '=', 1)->with('tags')->activeDestacado()->get();

    $otherProducts = Products::select()
      ->where('id', '<>', $id)
      ->where('producto', $product->producto)
      ->whereNotNull('color')
      ->get();

    $galery = Galerie::where('product_id', $product->id)->get();

    return view('public.product', compact('atributos', 'valorAtributo', 'ProdComplementarios', 'productosConGalerias', 'especificaciones', 'url_env', 'product', 'capitalizeFirstLetter', 'categorias', 'destacados', 'otherProducts', 'galery'));
  }

  //  --------------------------------------------
  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreIndexRequest $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(Index $index)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Index $index)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateIndexRequest $request, Index $index)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Index $index)
  {
    //
  }

  /**
   * Save contact from blade
   */
  public function guardarContacto(Request $request)
  {

    $data = $request->all();
    $data['full_name'] = $request->name . ' ' . $request->last_name;

    try {
      $reglasValidacion = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
      ];
      $mensajes = [
        'name.required' => 'El campo nombre es obligatorio.',
        'email.required' => 'El campo correo electrónico es obligatorio.',
        'email.email' => 'El formato del correo electrónico no es válido.',
        'email.max' => 'El campo correo electrónico no puede tener más de :max caracteres.',
      ];
      $request->validate($reglasValidacion, $mensajes);
      $formlanding = Message::create($data);
      $this->envioCorreo($formlanding);

      return response()->json(['message' => 'Mensaje enviado con exito']);
    } catch (ValidationException $e) {

      return response()->json(['message' => $e->validator->errors()], 400);
    }
  }



  public function saveImg($file, $route, $nombreImagen)
  {
    $manager = new ImageManager(new Driver());
    $img =  $manager->read($file);

    if (!file_exists($route)) {
      mkdir($route, 0777, true); // Se crea la ruta con permisos de lectura, escritura y ejecución
    }
    $img->save($route . $nombreImagen);
  }


  private function envioCorreo($data)
  {

    $name = $data['full_name'];
    $mensaje = "Gracias por comunicarte con Decotab";
    $mail = EmailConfig::config($name, $mensaje);
    // dd($mail);
    try {
      $mail->addAddress($data['email']);
      $mail->Body = '<html lang="es">
        <head>
          <meta charset="UTF-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <title>Mundo web</title>
          <link rel="preconnect" href="https://fonts.googleapis.com" />
          <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
          <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
            rel="stylesheet"
          />
          <style>
            * {
              margin: 0;
              padding: 0;
              box-sizing: border-box;
            }
          </style>
        </head>
        <body>
          <main>
            <table
              style="
                width: 600px;
                height: 700px;
                margin: 0 auto;
                text-align: center;
                background-image: url(https://decotab.pe/mail/ImagenFondo.png);
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;
              "
            >
              <thead>
                <tr>
                  <th
                    style="
                      display: flex;
                      flex-direction: row;
                      justify-content: center;
                      align-items: center;
                      margin: 40px;
                    "
                  >
                    <img src="https://decotab.pe/mail/LogoP.png" alt="mundo web"  style="
                    margin: auto;
                  "/>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="height: 10px">
                    <p
                      style="
                        color: #ffffff;
                        font-weight: 500;
                        font-size: 18px;
                        text-align: center;
                        width: 500px;
                        margin: 0 auto;
                        font-family: Montserrat, sans-serif;
                        line-height: 30px;
                      "
                    >
                      <span style="display: block">Hola </span>
                    </p>
                  </td>
                </tr>
                <tr>
                  <td style="height: 10px">
                    <p
                      style="
                        color: #ffffff;
                        font-size: 40px;
                        font-family: Montserrat, sans-serif;
                        line-height: 60px;
                      "
                    >
                      <span style="display: block">' . $name . ' </span>
                    </p>
                  </td>
                </tr>
                <tr>
                  <td style="height: 10px">
                    <p
                      style="
                        color: #74a68d;
                        font-size: 40px;
                        font-family: Montserrat, sans-serif;
                        font-weight: bold;
                        line-height: 60px;
                      "
                    >
                      !Gracias
                      <span style="color: #ffffff">por escribirnos!</span>
                    </p>
                  </td>
                </tr>
                <tr>
                  <td style="height: 10px">
                    <p
                      style="
                        color: #ffffff;
                        font-weight: 500;
                        font-size: 18px;
                        text-align: center;
                        width: 250px;
                        margin: 0 auto;
                        font-family: Montserrat, sans-serif;
                        line-height: 30px;
                      "
                    >
                      En breve estaremos comunicandonos contigo.
                    </p>
                  </td>
                </tr>
                <tr>
                  <td
                    style="
                    text-align: center;
                  "
                  >
                    <a
                      href="https://decotab.pe/"
                      style="
                        text-decoration: none;
                        background-color: #74a68d;
                        color: white;
                        padding: 10px 16px;
                        display: inline-flex;
                        justify-content: center;
                        align-items: center;
                        gap: 10px;
                        font-weight: 600;
                        font-family: Montserrat, sans-serif;
                        font-size: 16px;
                        border-radius: 30px;
                      "
                    >
                      <span>Visita nuestra web</span>
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </main>
        </body>
      </html>
      ';
      $mail->isHTML(true);
      $mail->send();
    } catch (\Throwable $th) {
      //throw $th;
    }
  }

  private function envioCorreoCompra($data)
  {

    $name = $data['nombre'];
    $mensaje = "Gracias por comprar en Decotab";
    $mail = EmailConfig::config($name, $mensaje);
    try {
      $mail->addAddress($data['email']);
      $mail->Body = '<html lang="es">
        <head>
          <meta charset="UTF-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <title>Mundo web</title>
          <link rel="preconnect" href="https://fonts.googleapis.com" />
          <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
          <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
            rel="stylesheet"
          />
          <style>
            * {
              margin: 0;
              padding: 0;
              box-sizing: border-box;
            }
          </style>
        </head>
        <body>
          <main>
            <table
              style="
                width: 600px;
                height: 700px;
                margin: 0 auto;
                text-align: center;
                background-image: url(https://decotab.pe/mail/ImagenFondo.png);
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;
              "
            >
              <thead>
                <tr>
                  <th
                    style="
                      display: flex;
                      flex-direction: row;
                      justify-content: center;
                      align-items: center;
                      margin: 40px;
                    "
                  >
                    <img src="https://decotab.pe/mail/Logo P.png" alt="mundo web" />
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="height: 10px">
                    <p
                      style="
                        color: #ffffff;
                        font-weight: 500;
                        font-size: 18px;
                        text-align: center;
                        width: 500px;
                        margin: 0 auto;
                        font-family: Montserrat, sans-serif;
                        line-height: 30px;
                      "
                    >
                      <span style="display: block">Hola </span>
                    </p>
                  </td>
                </tr>
                <tr>
                  <td style="height: 10px">
                    <p
                      style="
                        color: #ffffff;
                        font-size: 40px;
                        font-family: Montserrat, sans-serif;
                        line-height: 60px;
                      "
                    >
                      <span style="display: block">' . $name . ' </span>
                    </p>
                  </td>
                </tr>
                <tr>
                  <td style="height: 10px">
                    <p
                      style="
                        color: #74a68d;
                        font-size: 40px;
                        font-family: Montserrat, sans-serif;
                        font-weight: bold;
                        line-height: 60px;
                      "
                    >
                      !Gracias
                      <span style="color: #ffffff">por escribirnos!</span>
                    </p>
                  </td>
                </tr>
                <tr>
                  <td style="height: 10px">
                    <p
                      style="
                        color: #ffffff;
                        font-weight: 500;
                        font-size: 18px;
                        text-align: center;
                        width: 250px;
                        margin: 0 auto;
                        font-family: Montserrat, sans-serif;
                        line-height: 30px;
                      "
                    >
                      En breve estaremos comunicandonos contigo.
                    </p>
                  </td>
                </tr>
                <tr>
                <td
                  style="
                  text-align: center;
                "
                >
                    <a
                      href="https://decotab.pe/"
                      style="
                        text-decoration: none;
                        background-color: #74a68d;
                        color: white;
                        padding: 10px 16px;
                        display: inline-flex;
                        justify-content: center;
                        align-items: center;
                        gap: 10px;
                        font-weight: 600;
                        font-family: Montserrat, sans-serif;
                        font-size: 16px;
                        border-radius: 30px;
                      "
                    >
                      <span>Visita nuestra web</span>
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </main>
        </body>
      </html>
      ';
      $mail->isHTML(true);
      $mail->send();
    } catch (\Throwable $th) {
      //throw $th;
    }
  }

  public function librodereclamaciones()
  {
    $departamentofiltro = DB::select('select * from departments where active = ? order by 2', [1]);

    return view('public.librodereclamaciones', compact('departamentofiltro'));
  }

  public function obtenerProvincia($departmentId)
  {
    $provinces = DB::select('select * from provinces where active = ? and department_id = ? order by description', [1, $departmentId]);
    return response()->json($provinces);
  }

  public function obtenerDistritos($provinceId)
  {
    $distritos = DB::select('select * from districts where active = ? and province_id = ? order by description', [1, $provinceId]);
    return response()->json($distritos);
  }

  public function politicasDevolucion()
  {
    $politicDev = PolyticsCondition::first();
    return view('public.politicasdeenvio', compact('politicDev'));
  }

  public function TerminosyCondiciones()
  {
    $termsAndCondicitions = TermsAndCondition::first();
    return view('public.terminosycondiciones', compact('termsAndCondicitions'));
  }
}
