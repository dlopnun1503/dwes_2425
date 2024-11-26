<?php


      /**
       * Clase conexion mediante mysqli
       */


       class Class_conexion{

        public $db;

        public function __construct()
        {      
            try{
                
                // Realizo la conexion
                $this->db = new mysqli(SERVER, USER, PASS, BD);

            }catch(mysqli_sql_exception $e){

                include 'views/partials/errorDB.php';

                $this->db->close();

                exit();
            }
            
        }
       }