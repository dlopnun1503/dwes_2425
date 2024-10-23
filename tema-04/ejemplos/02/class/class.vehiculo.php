<?php 
  
     /*
         Clase: class.vehiculo.php
         definicion de la clase vehiculo
         autor: 
         version: 
         fecha: 
     */

     class Class_vehiculo {
        
        # Propiedades o atributos de la clase

        public $matricula;
        public $velocidad; 

        # Metodos o funciones
        // Constructor
        // Metodo que se ejeecuta automaticamente cuando se crea un objeto a partir de dicha clase 

        public function __construct(
            $matricula = null,
            $velocidad = null
        ){
            $this->matricula = $matricula;
            $this->velocidad = $velocidad;
        }



        # Metodo que devuelve la propiedad matricula
        public function getMatricula(){
            return $this->matricula;
        }

        # Metodo que devuelve la propiedad matricula
         public function getVelocidad(){
            return $this->velocidad;
        }



        # Metodo que establece la propiedad matricula
        public function setMatricula($matricula){
            $this->matricula = $matricula;
        }

        # Metodo que establece la propiedad matricula
         public function setVelocidad($velocidad){
            $this->velocidad = $velocidad;
        }



        # Metodo que aumenta la velocidad
        public function aumentarVelocidad() {
            $this->velocidad++;
            $this->setVelocidad(40);
        }

        # Metodo que disminuye la velocidad
        public function disminuirVelocidad() {
            $this->velocidad--;
        }

        # Metodo que para el coche
        public function parar() {
            $this->velocidad = 0;
        }
           
     }