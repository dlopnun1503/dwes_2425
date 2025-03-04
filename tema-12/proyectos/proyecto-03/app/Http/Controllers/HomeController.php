<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $title = 'Página principal';
        $nombre = 'David López Núñez';
        $curso = 'Laravel 12';
        $ciclo = null;
        $perfil = 'admin';
        $ciudades = ['Madrid', 'Barcelona', 'Valencia', 'Sevilla', 'Zaragoza'];
        // $regiones = ['Andalucía', 'Cataluña', 'Madrid', 'Valencia', 'Galicia'];
        $regiones = [];

        // Cargo la vista principal
        return view('home', compact(
            'title', 
            'nombre', 
            'curso', 
            'ciclo', 
            'perfil',
            'ciudades',
            'regiones'
        ));
    }
}
