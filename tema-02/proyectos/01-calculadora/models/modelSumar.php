<?php

    /**
     * Modelo: modelSumar.php
     * Descripcion: suma los valores del formulario
     */

    // print_r($_GET); //Muestra los valores de un array

    // Cargo variables
    $valor1 = $_GET['valor1'];
    $valor2 = $_GET['valor2'];

    // Creo variable con la operacion
    $operacion = "Suma";

    // Realizo los calculos 
    $resultado = $valor1 + $valor2;