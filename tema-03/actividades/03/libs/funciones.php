<?php

    /*
        Librería proyecto 31 CRUD alumnos
    */

    # Obtiene la tabla de alumnos
    function get_tabla_libros () {

        $tabla = [
            [
                'id' => 1,
                'titulo' => 'Los Señores del Tiempo',
                'autor' => 'Ubrique',
                'editorial' => '2DAW',
                'genero' => '2DAW',
                'precio' => '2DAW'
            ],
            [
                'id' => 2,
                'titulo' => 'El Rey Recibe',
                'autor' => 'Ubrique',
                'editorial' => '2DAW',
                'genero' => '2DAW',
                'precio' => '2DAW'
            ],
            [
                'id' => 3,
                'titulo' => 'Diario de una mujer',
                'autor' => 'Ubrique',
                'editorial' => '2DAW',
                'genero' => '2DAW',
                'precio' => '2DAW'
            ],
            [
                'id' => 4,
                'titulo' => 'El Quijote de la Mancha',
                'autor' => 'Ubrique',
                'editorial' => '2DAW',
                'genero' => '2DAW',
                'precio' => '2DAW'
            ]
        ];
        return $tabla;
    }


    function buscar_tabla($tabla, $colummna, $valor){
        $colummna_id = array_column($tabla, $colummna);
        $indice = array_search($valor, $colummna_id, false);
        return $indice;
    }