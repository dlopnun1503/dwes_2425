<?php

    /**
     * Modelo: model.calcular.php
     * Descripcion: calcula los valores del formulario
     */

    // print_r($_GET); //Muestra los valores de un array

    // Cargo variables
    $velocidad_inicial = $_POST['Velocidad_Inicial'];
    $angulo_lanzamiento = $_POST['Angulo_Lanzamiento'];

    // Creo variable para pasar a radianes
    $radianes = ($angulo_lanzamiento * pi()) / 180;

    // Creo variables para la velocidad inicial en X
    $v_Inicialx = $velocidad_inicial * (cos($radianes));
    $V_InicialX = number_format($v_Inicialx, 2, ',', '.');

    // Creo variables para la velocidad inicial en Y
    $v_Inicialy = $velocidad_inicial * (sin($radianes));
    $V_InicialY = number_format($v_Inicialy, 2, ',', '.');

    // Creo variables para el alcance maximo
    $alcance_max = (($velocidad_inicial ** 2) * (sin(2 * $radianes))) / 9.8;
    $alcance_maximo = number_format($alcance_max, 2, ',', '.');

    // Creo variables para el tiempo de vuelo
    $tiempo_vue = (2 * $v_Inicialy) / 9.8 ;
    $tiempo_vuelo = number_format($tiempo_vue, 2, ',', '.');

    // Creo variables para la altura maximaa
    $altura_max = (($velocidad_inicial ** 2) * ((sin($radianes)) * (sin($radianes)))) / (2 * 9.8);
    $altura_maxima = number_format($altura_max, 2, ',', '.');