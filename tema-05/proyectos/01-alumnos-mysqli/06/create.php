<?php

    /*
        controlador: create.php
        descripción: añade nuevo alumno a la tabla

        Método POST:

            - detalles del alumno
    */

    # Archivos de configuración
    include 'config/configDB.php';
    
    # Clases
    include 'class/class.alumno.php';
    include 'class/class.conexion.php';
    include 'class/class.tabla_alumnos.php';

    # Librerias

    # Model
    include 'models/model.create.php';

    # Vista
    // include 'views/view.index.php';