<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->string('identificacion', 11)->unique(); // Identificación hasta 11 caracteres, única
            $table->string('nombres', 50); // Nombres hasta 50 caracteres
            $table->string('apellidos', 50); // Apellidos hasta 50 caracteres
            $table->string('email', 50); // Email hasta 50 caracteres, único
            $table->string('telefono', 10); // Teléfono hasta 10 dígitos
            $table->string('direccion', 50); // Dirección hasta 50 caracteres
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
