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
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->string('identificacion', 11)->unique();
            $table->string('identificacion_cliente', 11);
            $table->string('nombres', 50);
            $table->decimal('peso', 7, 2);
            $table->string('unidad', 2);
            $table->integer('edad');
            $table->string('sexo');
            $table->string('tipo_mascota');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascotas');
    }
};
