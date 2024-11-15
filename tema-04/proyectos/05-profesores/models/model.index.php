<?php

    /*
        Modelo: model.index.php
        Descripción: genera array objetos de la clase profesores
    */

    # Símbolo monetario local
    setlocale(LC_MONETARY,"es_ES");

    # Creo un objeto de la clase tabla profesores
    $obj_tabla_profesores = new Class_tabla_profesores();

    # Cargo tabla de especialidades
    $especialidades = $obj_tabla_profesores->getEspecialidad();

    # Cargo tabla de asignaturas
    $asignaturas = $obj_tabla_profesores->getAsignaturas();

    # Relleno el array de objetos
    $obj_tabla_profesores->getDatos();

    # Obtener tabla de profesores
    $array_profesores = $obj_tabla_profesores->tabla;

