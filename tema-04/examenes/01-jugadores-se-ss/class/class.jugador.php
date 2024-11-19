<?php

    /*
        archivo:class.jugador.php
        nombre: define la clase jugador sin encapsulamiento
    */


    class Class_jugador{

        public $id;
        public $nombre;
        public $fecha_nacimiento;
        public $altura;
        public $peso;
        public $nacionalidad;
        public $num_camiseta;
        public $valor_mercado;
        public $equipo;
        public $posiciones;


        public function __construct(
            $id = null,
            $nombre = null,
            $fecha_nacimiento = null,
            $altura = null,
            $peso = null,
            $nacionalidad = null,
            $num_camiseta = null,
            $valor_mercado = null,
            $equipo = null,
            $posiciones = []
        )
        {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->fecha_nacimiento = $fecha_nacimiento;
            $this->altura = $altura;
            $this->peso = $peso;
            $this->nacionalidad = $nacionalidad;
            $this->num_camiseta = $num_camiseta;
            $this->valor_mercado = $valor_mercado;
            $this->equipo = $equipo;
            $this->posiciones = $posiciones;
        }


        public function edad(){

            $fecha_actual = new DateTime();
            $fechaNacimiento = new DateTime($this->fecha_nacimiento);
            $edad = $fecha_actual->diff($fechaNacimiento)->y;

            return $edad;
        }

    }
