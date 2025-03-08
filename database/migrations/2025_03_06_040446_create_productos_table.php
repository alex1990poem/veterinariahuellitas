<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecutar las migraciones.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'nombre');
            $table->string(column: 'descripcion')->nullable();
            $table->integer(column: 'cantidad');
            $table->integer(column: 'Precio');
            $table->timestamps();
        });
    }

    /**
     * Invertir las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
