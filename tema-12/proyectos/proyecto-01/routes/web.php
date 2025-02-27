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

// Ruta con varios parámetro 
Route::get('/post/{id}/comments/{comment_id}}', function ($id, $comment_id ) {
    return 'Post ' . $id . ' - Comment ' . $comment_id;
});

// Ruta con parámetros opcionales
Route::get('/saludo/{nombre?}/{nickname?}', function ($nombre, $nickname = null) {
    if ($nickname) {
        return 'Hola ' . $nombre . ', tu apodo es ' . $nickname;
    } else {
        return 'Hola ' . $nombre;
    }
});