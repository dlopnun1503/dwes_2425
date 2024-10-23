<?php   


     /*
       class.calculadora.php 
       define clase calculadora 
       propiedades: valor1, valor2, operador, resultado
       metodos: suma, resta, division, multiplicacion, potencia
       propiedad de encapsulamiento
     */

     class Class_calculadora{

        # Atributos o propiedades 
        private $valor1;
        private $valor2;
        private $operador;
        private $resultado;

        public function __construct
        (
            $valor1 = 0,
            $valor2 = 0,
            $operador = null,
            $resultado = null
        )
        {
            $this->valor1 = $valor1;
            $this->valor2 = $valor2;
            $this->operador = $operador;
            $this->resultado = $resultado;
        }

        // Getters
        public function getValor1() {
            return $this->valor1;
        }
    
        public function getValor2() {
            return $this->valor2;
        }
    
        public function getOperador() {
            return $this->operador;
        }
    
        public function getResultado() {
            return $this->resultado;
        }
    
        // Setters
        public function setValor1($valor1) {
            $this->valor1 = $valor1;
        }
    
        public function setValor2($valor2) {
            $this->valor2 = $valor2;
        }
    
        public function setOperador($operador) {
            $this->operador = $operador;
        }
    
        public function setResultado($resultado) {
            $this->resultado = $resultado;
        }


        public function suma() {
            $this->resultado = $this->valor1 + $this->valor2;
            $this->operador = '+';
        }
    
        public function resta() {
            $this->resultado = $this->valor1 - $this->valor2;
            $this->operador = '-';
        }
    
        public function multiplicacion() {
            $this->resultado = $this->valor1 * $this->valor2;
            $this->operador = '*';
        }
    
        public function division() {
            if ($this->valor2 != 0) {
                $this->resultado = $this->valor1 / $this->valor2;
                $this->operador = '/';
            } else {
                $this->resultado = null; 
                echo "Error: División por cero.";
            }
        }
    
        public function potencia() {
            $this->resultado = $this->valor1 ** $this->valor2;
            $this->operador = '^';
        }

    
    }

