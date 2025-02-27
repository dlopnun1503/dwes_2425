<?php

    /* 
        Creamos una clase para la tabla de autores
        con propiedades públicas para cada columna.
    */

    class classAutor {

        public $id;
        public $nombre;
        public $nacionalidad;
        public $email;
        public $fecha_nac;
        public $fecha_def;
        public $premios;
        

        public function __construct(
            $id = null,
            $nombre = null,
            $nacionalidad = null,
            $email = null,
            $fecha_nac = null,
            $fecha_def = null,
            $premios = null
            ) {
                $this->id = $id;
                $this->nombre = $nombre;
                $this->nacionalidad = $nacionalidad;
                $this->email = $email;
                $this->fecha_nac = $fecha_nac;
                $this->fecha_def = $fecha_def;
                $this->premios = $premios;
            } 
    }
