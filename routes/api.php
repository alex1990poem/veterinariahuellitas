<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeterinarioController;

Route::apiResource('veterinarios', VeterinarioController::class);
