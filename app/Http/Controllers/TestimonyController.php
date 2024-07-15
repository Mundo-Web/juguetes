<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use App\Http\Requests\StoreTestimonyRequest;
use App\Http\Requests\UpdateTestimonyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TestimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimony = Testimony::where("status", "=", true)->get();

        return view('pages.testimonies.index', compact('testimony'));

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.testimonies.create');
    }


    private function getYTVideoId($url)
    {
        $patterns = [
            '/(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', // URL estándar
            '/(?:https?:\/\/)?(?:www\.)?youtu\.be\/([a-zA-Z0-9_-]+)/', // URL corta
            '/(?:https?:\/\/)?(?:www\.)?youtube\.com\/embed\/([a-zA-Z0-9_-]+)/', // URL embebida
            '/(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)(?:&.*)?/', // URL estándar con parámetros adicionales
        ];
        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $url, $matches)) {
            return $matches[1];
            }
        }
        return null;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $testimony = new Testimony(); 

        $testimony->name = $request->name;
        $testimony->ocupation = $request->ocupation;
        $testimony->testimonie = $request->testimonie;
        $url = $request->video;
        $testimony->url_video = $this->getYTVideoId($url);
        $testimony->status = 1;
        $testimony->visible = 1;

        $testimony->save();
       
        return redirect()->route('testimonios.index')->with('success', 'Testimonio creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimony $testimony)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimony $testimony, $id)
    {
        $testimony = Testimony::findOrfail($id);

        return view('pages.testimonies.edit', compact('testimony'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $testimony = Testimony::findOrfail($id); 

        // $testimony->name = $request->name;
        // $testimony->email = $request->email;
        // $testimony->ocupation = $request->ocupation;
        // $testimony->testimonie = $request->testimonie;
        // $testimony->ocupation = $request->ocupation;
        // $testimony->status = $request->status;
        $url = $request->video;
    
        if ($testimony->url_video == $url) {
        $testimony->url_video == $url;
        }else{
        $testimony->url_video = $this->getYTVideoId($url);
        }
        $testimony->update($request->all());

        $testimony->save();

        return redirect()->route('testimonios.index')->with('success', 'Testimonio modificado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimony $testimony)
    {
        //
    }

    public function deleteTestimony(Request $request)
    {
        $id = $request->id;
        //Busco el servicio con id como parametro
        $testimony = Testimony::findOrfail($id); 
        //Modifico el status a false
        $testimony->status = false;
        //Guardo 
        $testimony->save();

        // Devuelvo una respuesta JSON u otra respuesta según necesites
        return response()->json(['message' => 'Testimonio eliminado.']);
    }


    
    public function updateVisible(Request $request)
    {
        // Lógica para manejar la solicitud AJAX
        //return response()->json(['mensaje' => 'Solicitud AJAX manejada con éxito']);
        $id = $request->id;

        $field = $request->field;

        $status = $request->status;

        $testimony = Testimony::findOrFail($id);
        
        $testimony->$field = $status;

        $testimony->save();

         return response()->json(['message' => 'Estado modificado.']);
    
    }
}
