<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Cita::all(), 200);
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
            'fecha' => 'required|date',
            'hora' => 'required',
            'cliente_id' => 'required|exists:clientes,id',
            'mascota_id' => 'required||exists:mascotas,id',
            'veterinario_id' => 'required|exists:veterinarios,id',
            'estado' => 'required|string',
            'tipo_servicio' => 'required|string',
        ]);

        $cita = Cita::create($request->all());

        return response()->json([
            'message' => 'Cita creada exitosamente',
            'data' => $cita
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cita = Cita::find($id);

        if (!$cita) {
            return response()->json(['message' => 'Cita no encontrada'], 404);
        }

        return response()->json($cita, 200);
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
        $cita = Cita::find($id);

        if (!$cita) {
            return response()->json(['message' => 'Cita no encontrada'], 404);
        }

        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required',
            'cliente_id' => 'required|exists:clientes,id',
            'mascota_id' => 'required||exists:mascotas,id',
            'veterinario_id' => 'required|exists:veterinarios,id',
            'estado' => 'required|string',
            'tipo_servicio' => 'required|string',
        ]);

        $cita->update($request->all());

        return response()->json([
            'message' => 'Cita actualizada exitosamente',
            'data' => $cita
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cita = Cita::find($id);

        if (!$cita) {
            return response()->json(['message' => 'Cita no encontrada'], 404);
        }

        $cita->delete();

        return response()->json(['message' => 'Cita eliminada exitosamente'], 200);
    }
}



