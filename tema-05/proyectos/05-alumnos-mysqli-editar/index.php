<?php

    /*
        controlador: index.php
        descripción: muestra los detalles de los alumnos
    */

    # Archivos de configuracion
    include 'config/configDB.php';

    # Clases
    include 'class/class.alumno.php';
    include 'class/class.conexion.php';
    include 'class/class.tabla_alumnos.php';

    # Librerias

    # Model
    include 'models/model.index.php';

    # Vista
    include 'views/view.index.php';