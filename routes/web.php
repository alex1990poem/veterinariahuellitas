<?php

use Illuminate\Support\Facades\Route;

Route::get('/management', function () {
    return view('management');
});


Route::get('/appointment', function () {
    return view('appointment');
});
