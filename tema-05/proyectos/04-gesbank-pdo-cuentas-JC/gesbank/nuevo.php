<?php

/*
        controlador: nuevo.php
        descripción: muestra formulario añadir cuenta
    */

    # Archivos de configuración
    include 'config/configDB.php';

    # Clases
    include 'class/class.cuenta.php';
    include 'class/class.conexion.php';
    include 'class/class.tabla_cuentas.php';

    # Librerias

    # Model
    include 'models/model.nuevo.php';

    # Vista
    include 'views/view.nuevo.php';