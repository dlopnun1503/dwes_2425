<?php


      /**
       * Clase conexion mediante mysqli
       */


       class Class_conexion{

        public $server;
        public $user;
        public $pass;
        public $base_datos;
        public $db;

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
            $this->db = new mysqli($server, $user, $pass, $base_datos);

            // Verificar conexion
            if($this->db->connect_errno){
                die ('Error de conexion: ' . $this->db->connect_error);
            }

        }
       }