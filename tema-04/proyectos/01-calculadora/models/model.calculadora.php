<?php  



     /*
          model.calculadora.php 
          realiza los calculos
     */



     # cargar los datos del formulario
     $valor1 = $_GET['valor1'];
     $valor2 = $_GET['valor2'];
     $operador = $_GET['operador'];

     # Creo objeto calculadora
     $calcular = new Class_calculadora
     (
        $valor1,
        $valor2,
        $operador,
        null
     );


     # Evaluo el tipo de operacion
     switch($operador){
        case 'suma':
            $calcular->suma();
            break;
        case 'resta': 
            $calcular->resta();
            break;
        case 'multiplicacion':
            $calcular->multiplicacion();
            break;
        case 'dividision': 
            $calcular->division();
            break;
        case 'potencia':
            $calcular->potencia();
            break;
               
     }