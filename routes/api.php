<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeterinarioController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\MascotaController;

Route::apiResource('veterinarios', VeterinarioController::class);
Route::apiResource('proveedores', ProveedorController::class);
Route::apiResource('mascotas', MascotaController::class);
