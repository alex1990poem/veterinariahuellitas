<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha', 
        'hora', 
        'cliente_id', 
        'mascota_id', 
        'veterinario_id', 
        'estado', 
        'tipo_servicio'];

    /**
     * Relación con Cliente: Una cita pertenece a un cliente.
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    /**
     * Relación con Mascota: Una cita está asociada a una mascota.
     */
    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }

    /**
     * Relación con Veterinario: Una cita es atendida por un veterinario.
     */
    public function veterinario()
    {
        return $this->belongsTo(Veterinario::class);
    }
}

