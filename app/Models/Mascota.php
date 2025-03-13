<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;

    protected $table = 'mascotas';

    protected $fillable = [
        'identificacion',
        'identificacion_cliente',
        'nombres',
        'peso',
        'unidad',
        'edad',
        'sexo',
        'tipo_mascota',
    ];
}
