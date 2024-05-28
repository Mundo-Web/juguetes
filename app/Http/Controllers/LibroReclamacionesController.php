<?php

namespace App\Http\Controllers;

use App\Models\LibroReclamaciones;
use App\Http\Requests\StoreLibroReclamacionesRequest;
use App\Http\Requests\UpdateLibroReclamacionesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;


class LibroReclamacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mensajes = LibroReclamaciones::where('status' , '=', 1 )->orderBy('created_at', 'DESC')->get();
        
        return view('pages.claim.index', compact('mensajes'));
    }

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
    public function store(StoreLibroReclamacionesRequest $request)
    {
        //
    }


    function storePublic(Request $request)
    {
        
        $validatedData = $request->validate([
            'fullname' => 'required|string',
            'type_document' => 'required|string',
            'number_document'=> 'required|string',
            'cellphone'=> 'required|numeric',
            'email'=> 'required|string',
            'department'=> 'required|string',
            'province'=> 'required|string',
            'district'=> 'required|string',
            'address'=> 'required|string',
            'typeitem'=> 'required|string',
            'amounttotal' => 'required|numeric',
            'category_product_service'=> 'required|string',
            'description'=> 'required|string',
            'type_claim'=> 'required|string',
            'date_incident'=> 'required|string',
            'address_incident'=> 'required|string',
            'detail_incident'=> 'required|string',
            'g-recaptcha-response' => 'required|captcha',
            
        ]);
    
        $recaptchaToken = $request->input('g-recaptcha-response');
        $recaptchaSecret = env('NOCAPTCHA_SECRET');
        $recaptchaResponse = Http::post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $recaptchaSecret,
            'response' => $recaptchaToken,
        ]);

        $recaptchaData = $recaptchaResponse->json();

        if (!$recaptchaData['success']) {
            return response()->json(['message' => ['captcha' => 'La verificación de reCAPTCHA ha fallado.']], 422);
        }
      
        LibroReclamaciones::create($validatedData);

        return response()->json(['message' => 'Mensaje enviado']);
        
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
    public function show($id)
    {
        $message = LibroReclamaciones::findOrFail($id);

        $message->is_read = 1; 
        $message->save();

        return view('pages.claim.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LibroReclamaciones $libroReclamaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLibroReclamacionesRequest $request, LibroReclamaciones $libroReclamaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LibroReclamaciones $libroReclamaciones)
    {
        //
    }

    public function borrar(Request $request)
    {

        $mensaje = LibroReclamaciones::find($request->id);
        $mensaje->status = 0; 
        $mensaje->save();

        return response()->json(['success' => true]);

    }
}
