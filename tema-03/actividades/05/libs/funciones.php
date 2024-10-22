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
                'autor' => 'Garci Senz de Urturi',
                'editorial' => 'Anaya',
                'genero' => 'Novela',
                'precio' => '19.5'
            ],
            [
                'id' => 2,
                'titulo' => 'El Rey Recibe',
                'autor' => 'Eduardo Mendoza',
                'editorial' => 'Santillana',
                'genero' => 'Novela',
                'precio' => '20.5'
            ],
            [
                'id' => 3,
                'titulo' => 'Diario de una mujer',
                'autor' => 'Eduardo Mendoza',
                'editorial' => 'Anaya',
                'genero' => 'Juvenil',
                'precio' => '12.95'
            ],
            [
                'id' => 4,
                'titulo' => 'El Quijote de la Mancha',
                'autor' => 'Miguel de Cervantes',
                'editorial' => 'Anaya',
                'genero' => 'Novela',
                'precio' => '15.95'
            ]
        ];
        return $tabla;
    }


    function buscar_tabla($tabla, $colummna, $valor){
        $colummna_id = array_column($tabla, $colummna);
        $indice = array_search($valor, $colummna_id, false);
        return $indice;
    }