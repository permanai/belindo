<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;


Route::get('/', function () {
    return view('index');
});

Route::get('/log', function () {
    return view('log');
});

Route::get('/produk1', [ProdukController::class, 'produk']);

