<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mensajes = Supplier::where('status' , '=', 1 )->orderBy('created_at', 'DESC')->get();
        return view('pages.supplier.index', compact('mensajes'));
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
    public function store(StoreSupplierRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $message = Supplier::findOrFail($id);

        $message->is_read = 1; 
        $message->save();

        return view('pages.supplier.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        //
    }

    public function borrar(Request $request)
    {

        $mensaje = Supplier::find($request->id);
        $mensaje->status = 0; 
        $mensaje->save();

        return response()->json(['success' => true]);

    }


    public function createProveedor(Request $request){

            $existingUser = User::where('email', $request->email)->first();

            if ($existingUser) {
                if ($existingUser->hasRole('Supplier')) {
                    return response()->json([
                        'success' => false,
                        'icon' => 'success',
                        'message' => 'El usuario ya existe y tiene el rol de proveedor.'
                    ], 409);
                } else {
                    return response()->json([
                        'success' => false,
                        'icon' => 'warning',
                        'message' => 'El usuario ya existe pero no tiene el rol de proveedor.'
                    ], 409);
                }
            }else{
                
                $password = Str::random(10);
      
                $newUser = User::create([
                    'email' => $request->email,
                    'password' => Hash::make($password),
                    'name' =>  $request->full_name, 
                ]);
    
                $newUser->assignRole('Supplier');
            }


            if ($newUser) {
                return response()->json(['success' => true, 'message' => 'Nuevo proveedor agregado'], 200);
            } else {
                return response()->json(['success' => false,'message' => 'Hubo un error'], 500);
            }
        }
}
