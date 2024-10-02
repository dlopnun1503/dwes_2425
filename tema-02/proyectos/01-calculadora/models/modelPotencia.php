<?php

    /**
     * Modelo: modelPotencia.php
     * Descripcion: realiza la potencia de los valores del formulario
     */

    // print_r($_GET); //Muestra los valores de un array

    // Cargo variables
    $valor1 = $_GET['valor1'];
    $valor2 = $_GET['valor2'];

    // Creo variable con la operacion
    $operacion = "Potencia";
    
    // Realizo los calculos 
    $resultado = $valor1 ** $valor2;