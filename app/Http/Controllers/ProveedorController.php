<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $request->validate([
            'identificacion' => 'required|string|max:11|unique:proveedores',
            'nombres' => 'required|string|max:50',
            'apellidos' => 'required|string|max:50',
            'email' => 'required|string|email|max:50',
            'telefono' => 'required|string|size:10',
            'direccion' => 'required|string|max:50',
            'categoria' => 'required|string|max:50',
        ]);

        $proveedor = Proveedor::create($request->all());

        return response()->json([
            'message' => 'Proveedor creado exitosamente',
            'data' => $proveedor
        ], 201);
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
