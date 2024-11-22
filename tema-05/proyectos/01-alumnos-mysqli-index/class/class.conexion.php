<?php


      /**
       * Clase conexion mediante mysqli
       */


       class Class_conexion{

        public $server;
        public $user;
        public $pass;
        public $base_datos;
        public $mysqli;

        public function __construct(
            $server,
            $user,
            $pass,
            $base_datos
        ) {            
            $this->server = $server;
            $this->user = $user;
            $this->pass = $pass;
            $this->base_datos = $base_datos;

            // Realizo la conexion
            $this->mysqli = new mysqli($server, $user, $pass, $base_datos);

            // Verificar conexion
            if($this->mysqli->connect_errno){
                die ('Error de conexion: ' . $this->mysqli->connect_error);
            }

        }
       }