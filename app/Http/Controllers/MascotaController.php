<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;

class MascotaController extends Controller
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
            'identificacion' => 'required|string|max:11|unique:mascotas',
            'identificacion_cliente' => 'required|string|max:11',
            'nombres' => 'required|string|max:50',
            'peso' => 'required|numeric|min:0|max:99999.99',
            'unidad' => 'required|string|in:KG,GR',
            'edad' => 'required|integer|min:0',
            'sexo' => 'required|string',
            'tipo_mascota' => 'required|string',
        ]);

        $mascota = Mascota::create($request->all());

        return response()->json([
            'message' => 'Mascota creada exitosamente',
            'data' => $mascota,
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
