<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

use Illuminate\Support\Str;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $banners = Banner::all();
        return view('pages.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $banners = new Banner();
        return view('pages.banners.save', compact('banners'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $body = $request->all();
        $jpa = Banner::find($request->id);
        if (!$jpa) {
            $body['status'] = true;
            $banner =   Banner::create($body);

            $banner->image = $this->saveImg($request, 'image');
            $banner->save();
        } else {

            if (!$request->hasFile('image')) {
                $body['image'] = $jpa->image;
            } else {
                $body['image'] = $this->saveImg($request, 'image');
            }


            $jpa->update($body);
        }
        return redirect()->route('banners.index')->with('success', 'Banner creado correctamente');
    }

    private function saveImg(Request $request, string $field)
    {
        if ($request->hasFile($field)) {
            $file = $request->file($field);
            $route = 'storage/images/imagen/';
            $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();
            $manager = new ImageManager(new Driver());
            $img =  $manager->read($file);
            // $img->coverDown(340, 340, 'center');

            if (!file_exists($route)) {
                mkdir($route, 0777, true);
            }

            $img->save($route . $nombreImagen);
            return $route . $nombreImagen;
        }
        return 'images\img\noimagen.jpg';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $banners = Banner::findOrfail($id);
        return view('pages.banners.save', compact('banners'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
