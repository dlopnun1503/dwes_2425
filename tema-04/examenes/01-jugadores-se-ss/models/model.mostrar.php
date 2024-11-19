<?php

    /*
        modelo: model.mostrar.php
        descripción: carga los datos del jugador que deseo mostrar

        Método GET:

            - indice de la tabla en la que se encuentra el jugador
    */


setlocale(LC_MONETARY, "es_ES");

// Creo un objeto de la clase tabla jugadores
$obj_tabla_jugadores = new Class_tabla_jugadores();

// Relleno el array de objetos, equipo y posiciones
$obj_tabla_jugadores->getDatos();
$equipos = $obj_tabla_jugadores->getEquipos();
$array_posiciones = $obj_tabla_jugadores->getPosiciones();

$indice = $_GET['indice'];

// Usamos la funcion buscar indice
$jugador = $obj_tabla_jugadores->read($indice);


