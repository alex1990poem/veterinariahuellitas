<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

// Ruta principal
Route::get('/', function () {
    return view('welcome');
});

// Ruta para la página de inicio
Route::get('/index', function () {
    return view('index');
});

// Ruta para la página de gestión
Route::get('/management', function () {
    return view('management');
});

// Rutas para gestionar imágenes
Route::controller(ImageController::class)->group(function () {
    Route::get('/images', 'index')->name('images.index');
    Route::post('/images', 'store')->name('images.store');
});

