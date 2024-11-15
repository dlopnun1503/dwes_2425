<?php

    /*
        Modelo: model.nuevo.php
        Descripción: genera los datos necesarios para añadir nuevo profesor
    */

    # Símbolo monetario local
    setlocale(LC_MONETARY,"es_ES");

    # Creo un objeto de la clase tabla profesores
    $obj_tabla_profesores = new Class_tabla_profesores();

    # Cargo tabla de especialidades
    $especialidades = $obj_tabla_profesores->getEspecialidad();

    # Cargo tabla de asignaturas
    $asignaturas = $obj_tabla_profesores->getAsignaturas();

    

