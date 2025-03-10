<?php

use Illuminate\Support\Facades\Route;

Route::get('/management', function () {
    return view('management');
});
