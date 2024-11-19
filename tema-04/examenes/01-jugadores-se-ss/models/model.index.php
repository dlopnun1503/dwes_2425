<?php

    /*
        Modelo: model.index.php
        Descripción: genera array objetos de la clase jugadores
    */

    // Creamos objeto de la clase tabla pjugadores
    $obj_tabla_jugadores = new Class_tabla_jugadores;

    // Obtenemos datos, equipo y posiciones
    $obj_tabla_jugadores->getDatos();
    $equipos = $obj_tabla_jugadores->getEquipos();
    $array_posiciones = $obj_tabla_jugadores->getPosiciones();

    // Obtener la array jugadores
    $array_jugadores = $obj_tabla_jugadores->tabla;

    


