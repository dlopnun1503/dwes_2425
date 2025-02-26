<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

 Route::get('/hola', function () {
    return 'Hola mundo Laravel - David López';
});

// Ruta con parámetro
Route::get('/saludo/{nombre}', function ($nombre) {
    return 'Hola ' . $nombre;
});