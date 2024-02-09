<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;



Route::get('/', function () {
    return view('index');
});

Route::get('/log', function () {
    return view('log');
});
Route::get('/footer/about', function () {
    return view('footer/about');
});
Route::get('/admin/register', function () {
    return view('admin/register');
});


