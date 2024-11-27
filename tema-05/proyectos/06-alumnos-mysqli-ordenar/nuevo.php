<?php

/*
        controlador: nuevo.php
        descripción: muestra formulario añadir alumno
    */

    # Archivos de configuración
    include 'config/configDB.php';

    # Clases
    include 'class/class.alumno.php';
    include 'class/class.conexion.php';
    include 'class/class.tabla_alumnos.php';

    # Librerias

    # Model
    include 'models/model.nuevo.php';

    # Vista
    include 'views/view.nuevo.php';