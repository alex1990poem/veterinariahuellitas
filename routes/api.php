<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeterinarioController;
use App\Http\Controllers\ClienteController;

Route::apiResource('veterinarios', VeterinarioController::class);
Route::apiResource('clientes', ClienteController::class);
