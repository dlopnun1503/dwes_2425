<?php

/*
    clase: class.tabla_jugadores.php
    descripcion: define la clase que va a contener el array de objetos de la clase jugadores.
*/


class Class_tabla_jugadores
{

    public $tabla;

    public function __construct()
    {
        $this->tabla = [];
    }

    /**
     * Metodo que crea un array con todos los equipos
     */
    public function getEquipos()
    {
        $equipos = [
            'Barcelona',
            'Real Madrid',
            'Atlético de Madrid',
            'Sevilla',
            'Real Sociedad',
            'Villarreal',
            'Real Betis',
            'Athletic Club',
            'Osasuna',
            'Celta de Vigo',
            'Mallorca',
            'Girona',
            'Getafe',
            'Cádiz',
            'Rayo Vallecano',
            'Alavés',
            'Granada',
            'Las Palmas',
            'Almería'
        ];

        asort($equipos);
        return $equipos;
    }


    /**
     * Metodo que crea un array con todas las posiciones
     */

    public function getPosiciones()
    {
        $posiciones = [
            'Portero',
            'Defensa central',
            'Lateral derecho',
            'Lateral izquierdo',
            'Pivote',
            'Mediocentro',
            'Mediapunta',
            'Extremo derecho',
            'Extremo izquierdo',
            'Delantero centro'
        ];

        return $posiciones;
    }


    /**
     * Metodo que crea objetos de la clase jugador y los añade a la tabla
     */
    public function getDatos(){

        $this->tabla = [
        // Jugador 1
        new Class_jugador(
            1,
            'Daniel Carvajal',
            '1991-06-22',
            1.76,
            75,
            'España',
            2,
            20 ,
            1,
            [1, 2]
        ),
        

        // Jugador 2
        new Class_jugador(
            2,
            'Vitor Roque',
            '2004-03-27',
            1.76,
            70,
            'Brasil',
            8,
            60 ,
            6,
            [8, 9]
        ),
        

        // Jugador 3
        new Class_jugador(
            3,
            'Robert Lewandoswki',
            '1988-04-17',
            1.88,
            84,
            'Polonia',
            9,
            30,
            0,
            [9]
        ),
        

        // Jugador 4
        new Class_jugador(
            4,
            'Ter Stegen',
            '1990-10-27',
            1.85,
            78,
            'Alemania',
            1,
            20,
            0,
            [0]
        ),
       

        // Jugador 5
        new Class_jugador(
            5,
            'Isco',
            '1990-03-02',
            1.76,
            75,
            'España',
            22,
            10,
            6,
            [5, 6, 8]
        )
        ];
      
    }


    /**
     * Metodo mostrar_nombre_posiciones()
     * Metodo con el que mostramos el nombre de las posiciones en lugar de la posicion del array
     * Parametros: 
     *           - indice_posiciones
     */
    public function mostrar_nombre_posiciones($indice_posiciones = []){

        $nombre_posiciones = [];

        $posiciones_jugadores = $this->getPosiciones();

        foreach($indice_posiciones as $indice){
            $nombre_posiciones[] = $posiciones_jugadores[$indice];
        }

        return $nombre_posiciones;
    }

    /**
     * Metodo create()
     * Metodo con el que creamos un nuevo objeto jugador añadiendolo a la tabla
     * Parametros:
     *           - Class_jugador $jugador
     */
    public function create(Class_jugador $jugador){
        $this->tabla[] = $jugador;
    }


    /**
     * Metodo read()
     * Metodo con el que devolvemos el indice de un jugador en la tabla
     * Parametros:
     *           - Class_jugador $jugador
     */
    public function read($indice){
        return $this->tabla[$indice];
    }
}
