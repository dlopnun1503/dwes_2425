<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeController::class)->name('index');

//Rutas para el controlador ProductController con resource
Route::resource('products', ProductController::class);
