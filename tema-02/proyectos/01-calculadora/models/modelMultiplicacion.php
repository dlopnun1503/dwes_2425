<?php

    /**
     * Modelo: modelMultiplicacion.php
     * Descripcion: multiplica los valores del formulario
     */

    // print_r($_GET); //Muestra los valores de un array

    // Cargo variables
    $valor1 = $_GET['valor1'];
    $valor2 = $_GET['valor2'];

    // Creo variable con la operacion
    $operacion = "Producto";
    
    // Realizo los calculos 
    $resultado = $valor1 * $valor2;