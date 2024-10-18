<?php

    /*
        Librería proyecto 31 CRUD alumnos
    */

    # Obtiene la tabla de alumnos
    function get_tabla_alumnos () {

        $tabla = [
            [
                'id' => 1,
                'nombre' => 'Juan',
                'poblacion' => 'Ubrique',
                'curso' => '2DAW'
            ],
            [
                'id' => 2,
                'nombre' => 'María',
                'poblacion' => 'Ubrique',
                'curso' => '2DAW'
            ],
            [
                'id' => 3,
                'nombre' => 'Luís',
                'poblacion' => 'Villamartín',
                'curso' => '1DAW'
            ],
            [
                'id' => 4,
                'nombre' => 'Marta',
                'poblacion' => 'Ubrique',
                'curso' => '2DAW'
            ]
        ];
        return $tabla;
    }


    function buscar_tabla($tabla, $colummna, $valor){
        $colummna_id = array_column($tabla, $colummna);
        $indice = array_search($valor, $colummna_id, false);
        return $indice;
    }