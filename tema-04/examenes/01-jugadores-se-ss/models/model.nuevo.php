<?php

    /*
        Modelo: model.nuevo.php
        Descripción: genera los datos necesarios para añadir nuevo jugador
    */

    // Símbolo monetario local
    setlocale(LC_MONETARY,"es_ES");

    // Creo un objeto de la clase tabla jugadores
    $obj_tabla_jugadores = new Class_tabla_jugadores();

    // Cargo tabla de equipos
    $equipos = $obj_tabla_jugadores->getEquipos();

    // Cargo tabla de posiciones
    $array_posiciones = $obj_tabla_jugadores->getPosiciones();
    

    

