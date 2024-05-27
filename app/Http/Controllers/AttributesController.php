<?php

namespace App\Http\Controllers;

use App\Models\Attributes;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class AttributesController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $attributes = Attributes::all();
    return view('pages.attributes.index', compact('attributes'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('pages.attributes.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    
    $request->validate([
      'titulo' => 'required',
    ]);

    $AboutUs = new Attributes();
    try {

      if ($request->hasFile("imagen")) {
        $file = $request->file('imagen');
        $routeImg = 'storage/images/imagen/';
        $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();

        $this->saveImg($file, $routeImg, $nombreImagen);

        $AboutUs->imagen = $routeImg . $nombreImagen;
        // $AboutUs->name_image = $nombreImagen;
      }

      $AboutUs->titulo = $request->titulo;
      $AboutUs->descripcion = $request->descripcion;
      $AboutUs->color = $request->color;
      $AboutUs->type = $request->type;
      $AboutUs->save();

      return redirect()->route('attributes.index')->with('success', 'Publicación creado exitosamente.');
    } catch (\Throwable $th) {
      return response()->json(['messge' => $th], 400);
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
  /**
   * Display the specified resource.
   */
  public function show(Request $request)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $attributes = Attributes::find($id);

    return view('pages.attributes.edit', compact('attributes'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {

    $request->validate([
      'titulo' => 'required',
    ]);
		$aboutUs = Attributes::find($id);
		try {
			
			if ($request->hasFile("imagen")) {
				$file = $request->file('imagen');
				$routeImg = 'storage/images/imagen/';
				$nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();

				$this->saveImg($file, $routeImg, $nombreImagen);
	
				$aboutUs->imagen = $routeImg.$nombreImagen;
				// $aboutUs->name_image = $nombreImagen;
			}
	
			$aboutUs->titulo = $request->titulo;
			$aboutUs->descripcion = $request->descripcion;
			$aboutUs->color = $request->color;
			$aboutUs->save();

			return redirect()->route('attributes.index')->with('success', 'Publicación creado exitosamente.');
 

		} catch (\Throwable $th) {
			return response()->json(['messge' => 'Verifique sus datos '], 400); 
		}
   
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Attributes $attributes)
  {
    //
  }
  public function updateVisible(Request $request)
  {
    
    $id = $request->id;
    $stauts = $request->status;
    $Attributes = Attributes::find($id);
    $Attributes->status = $stauts;

    $Attributes->save();
    return response()->json(['message' => 'registro actualizado']);
  }

  public function borrar(Request $request)
  {
    $Attributes = Attributes::find($request->id);

		
		if ($Attributes->imagen && file_exists($Attributes->imagen)) {
			unlink($Attributes->imagen);
		}

		$Attributes->delete();
		return response()->json(['message'=>'Atributo eliminado']);
  }
}
