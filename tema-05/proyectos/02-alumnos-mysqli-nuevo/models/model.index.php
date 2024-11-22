<?php

    /*
        Modelo: model.index.php
        Descripción: genera array objetos de la clase alumnos
    */

    # Símbolo monetario local
    setlocale(LC_MONETARY,"es_ES");

    # Creo un objeto de la clase tabla alumnos
    $obj_tabla_alumnos = new Class_tabla_alumnos('localhost', 'root', '', 'fp');

    # Cargo tabla alumnos
    $alumnos = $obj_tabla_alumnos->getAlumnos();


