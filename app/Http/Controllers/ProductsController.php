<?php

namespace App\Http\Controllers;

use App\Models\Attributes;
use App\Models\AttributesValues;
use App\Models\Category;
use App\Models\Products;
use App\Models\Specifications;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $products =  Products::where("status", "=", true)->get();

    return view('pages.products.index', compact('products'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $atributos = Attributes::where("status", "=", true)->get();
    $valorAtributo = AttributesValues::where("status", "=", true)->get();
    $tags = Tag::where("status", "=", true)->get();
    $categoria = Category::all();
    return view('pages.products.create', compact('atributos', 'valorAtributo', 'categoria','tags'));
  }

  public function saveImg($file, $route, $nombreImagen)
  {
    $manager = new ImageManager(new Driver());
    $img =  $manager->read($file);
    // $img->coverDown(340, 340, 'center');

    if (!file_exists($route)) {
      mkdir($route, 0777, true); // Se crea la ruta con permisos de lectura, escritura y ejecución
    }

    $img->save($route . $nombreImagen);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $especificaciones = [];
    $data = $request->all();
    $atributos = null;
    $tagsSeleccionados = $request->input('tags_id');
    // $valorprecio = $request->input('precio') - 0.1;
    
    $request->validate([
      'producto' => 'required',
      'precio' => 'min:0|required|numeric', 
      'descuento' => 'lt:' . $request->input('precio'),
    ]);

    if ($request->hasFile("imagen")) {
      $file = $request->file('imagen');
      $routeImg = 'storage/images/imagen/';
      $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();

      $this->saveImg($file, $routeImg, $nombreImagen);

      $data['imagen'] = $routeImg . $nombreImagen;
      // $AboutUs->name_image = $nombreImagen;
    }

    if ($request->hasFile("imagen_ambiente")) {
      $file = $request->file('imagen_ambiente');
      $routeImg = 'storage/images/imagen_ambiente/';
      $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();

      $this->saveImg($file, $routeImg, $nombreImagen);

      $data['imagen_ambiente'] = $routeImg . $nombreImagen;
      // $AboutUs->name_image = $nombreImagen;
    }



    foreach ($data as $key => $value) {

      if (strstr($key, ':')) {
        // Separa el nombre del atributo y su valor
        $atributos = $this->stringToObject($key, $atributos);
        unset($request[$key]);
      } elseif (strstr($key, '-')) {

        //strpos primera ocurrencia que enuentre
        if (strpos($key, 'tittle-') === 0 || strpos($key, 'title-') === 0) {
          $num = substr($key, strrpos($key, '-') + 1); // Obtener el número de la especificación
          $especificaciones[$num]['tittle'] = $value; // Agregar el título al array asociativo
        } elseif (strpos($key, 'specifications-') === 0) {
          $num = substr($key, strrpos($key, '-') + 1); // Obtener el número de la especificación
          $especificaciones[$num]['specifications'] = $value; // Agregar las especificaciones al array asociativo
        }
      }
    }

    $jsonAtributos = json_encode($atributos);

    if (array_key_exists('destacar', $data)) {
      if (strtolower($data['destacar']) == 'on') $data['destacar'] = 1;
    }
    if (array_key_exists('recomendar', $data)) {
      if (strtolower($data['recomendar']) == 'on') $data['recomendar'] = 1;
    }


    $data['atributes'] = $jsonAtributos;

    $cleanedData = Arr::where($data, function ($value, $key) {
      return !is_null($value);
    });

    $producto = Products::create($cleanedData);

    if (isset($atributos)) {
      foreach ($atributos as $atributo => $valores) {
        $idAtributo = Attributes::where('titulo', $atributo)->first();

        foreach ($valores as $valor) {
          $idValorAtributo = AttributesValues::where('valor', $valor)->first();

          if ($idAtributo && $idValorAtributo) {
            DB::table('attribute_product_values')->insert([
              'product_id' => $producto->id,
              'attribute_id' => $idAtributo->id,
              'attribute_value_id' => $idValorAtributo->id,
            ]);
          }
        }
      }
    }

    $this->GuardarEspecificaciones($producto->id, $especificaciones);
    if(!is_null($tagsSeleccionados)){
      $this->TagsXProducts($producto->id, $tagsSeleccionados);
    }
    
    return redirect()->route('products.index')->with('success', 'Publicación creado exitosamente.');
  }

  private function TagsXProducts($id, $nTags){
    foreach ($nTags as $key => $value) {
      DB::insert('insert into tags_xproducts (producto_id, tag_id) values (?, ?)', [$id, $value]);
    }

  }


  private function GuardarEspecificaciones($id, $especificaciones)
  {

    foreach ($especificaciones as $value) {
      $value['product_id'] = $id;
      Specifications::create($value);
    }
  }

  private function actualizarEspecificacion ($especificaciones){
    foreach ($especificaciones as $key => $value) {
      $espect = Specifications::find($key);
      $espect->tittle = $value['tittle'];
      $espect->specifications = $value['specifications'];

      if($value['specifications'] == null ){
        $espect->delete();
      }else{
        $espect->save();
      }

      

    }

  }

  private function stringToObject($key, $atributos)
  {

    $parts = explode(':', $key);
    $nombre = strtolower($parts[0]); // Nombre del atributo
    $valor = strtolower($parts[1]); // Valor del atributo en minúsculas

    // Verifica si el atributo ya existe en el array
    if (isset($atributos[$nombre])) {
      // Si el atributo ya existe, agrega el nuevo valor a su lista
      $atributos[$nombre][] = $valor;
    } else {
      // Si el atributo no existe, crea una nueva lista con el valor
      $atributos[$nombre] = [$valor];
    }
    return $atributos;
  }

  /**
   * Display the specified resource.
   */
  public function show(Products $products)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  { 
    
    $product =  Products::with('tags')->find($id);
    $atributos = Attributes::where("status", "=", true)->get();
    $valorAtributo = AttributesValues::where("status", "=", true)->get();
    $especificacion = Specifications::where("product_id", "=" , $id)->get();
    $allTags = Tag::all();
    $categoria = Category::all();
    
    return view('pages.products.edit', compact('product', 'atributos', 'valorAtributo', 'allTags', 'categoria','especificacion'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $especificaciones = [];
    $product = Products::find($id);
    $tagsSeleccionados = $request->input('tags_id');
    $data = $request->all();
    $atributos = null;
    


     
    
    

    $request->validate([
      'producto' => 'required',
    ]);

    if ($request->hasFile("imagen")) {
      $file = $request->file('imagen');
      $routeImg = 'storage/images/imagen/';
      $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();

      $this->saveImg($file, $routeImg, $nombreImagen);

      $data['imagen'] = $routeImg . $nombreImagen;
      // $AboutUs->name_image = $nombreImagen;
    }

    if ($request->hasFile("imagen_ambiente")) {
      $file = $request->file('imagen_ambiente');
      $routeImg = 'storage/images/imagen_ambiente/';
      $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();

      $this->saveImg($file, $routeImg, $nombreImagen);

      $data['imagen_ambiente'] = $routeImg . $nombreImagen;
      // $AboutUs->name_image = $nombreImagen;
    }

    foreach ($request->all() as $key => $value) {
      
      if (strstr($key, ':')) {
        // Separa el nombre del atributo y su valor
        $atributos = $this->stringToObject($key, $atributos);
        unset($request[$key]);
      }elseif (strstr($key, '-')) {
        //strpos primera ocurrencia que enuentre
        if (strpos($key, 'tittle-') === 0 || strpos($key, 'title-') === 0) {
          $num = substr($key, strrpos($key, '-') + 1); // Obtener el número de la especificación
          $especificaciones[$num]['tittle'] = $value; // Agregar el título al array asociativo
        } elseif (strpos($key, 'specifications-') === 0) {
          
          $num = substr($key, strrpos($key, '-') + 1); // Obtener el número de la especificación
          $especificaciones[$num]['specifications'] = $value; // Agregar las especificaciones al array asociativo
        }
      }
    }

    






    $jsonAtributos = json_encode($atributos);

    if (array_key_exists('destacar', $data)) {
      if (strtolower($data['destacar']) == 'on') $data['destacar'] = 1;
    }
    if (array_key_exists('recomendar', $data)) {
      if (strtolower($data['recomendar']) == 'on') $data['recomendar'] = 1;
    }



    $data['atributes'] = $jsonAtributos;
    $cleanedData = Arr::where($data, function ($value, $key) {
      return !is_null($value);
    });
    $product->update($cleanedData);

    DB::delete('delete from attribute_product_values where product_id = ?', [$product->id]);

    if (isset($atributos)) {
      foreach ($atributos as $atributo => $valores) {
        $idAtributo = Attributes::where('titulo', $atributo)->first();

        foreach ($valores as $valor) {
          $idValorAtributo = AttributesValues::where('valor', $valor)->first();

          if ($idAtributo && $idValorAtributo) {
            DB::table('attribute_product_values')->insert([
              'product_id' => $product->id,
              'attribute_id' => $idAtributo->id,
              'attribute_value_id' => $idValorAtributo->id,
            ]);
          }
        }
      }
    }

    DB::delete('delete from tags_xproducts where producto_id = ?', [$id]);
    if(!is_null($tagsSeleccionados)){
      $this->TagsXProducts($id, $tagsSeleccionados);
    }
    $this->actualizarEspecificacion($especificaciones);
     return redirect()->route('products.index')->with('success', 'Producto editado exitosamente.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function borrar(Request $request)
  {
    //softdelete
    $product = Products::find($request->id);
    $product->status = 0;
    $product->save();
  }

  public function updateVisible(Request $request)
  {
    $id = $request->id;
    $field = $request->field;
    $status = $request->status;

    // Verificar si el producto existe
    $product = Products::find($id);

    if (!$product) {
      return response()->json(['message' => 'Producto no encontrado'], 404);
    }

    // Actualizar el campo dinámicamente
    $product->update([
      $field => $status
    ]);
    return response()->json(['message' => 'registro actualizado']);
  }
}
