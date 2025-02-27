<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ruta test 
Route::get('/test', function () {
    $mensaje = 'Nombre: David López<br>';
    $mensaje .= 'Módulo: DAW<br>';
    $mensaje .= 'Curso: 2ºDAW<br>';
    $mensaje .= 'Centro: IES Ntra. Sra. de los Remedios<br>';
    return $mensaje;
});
