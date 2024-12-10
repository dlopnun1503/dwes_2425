<?php
    /*
        controlador: editar.php
        descripción: muestra los detalles de un cuenta en modo edición

        parámetros:

            - Método GET:
                - id del cuenta
    */

    # Archivos de configuración
    include 'config/configDB.php';

    # Clases
    include 'class/class.cuenta.php';
    include 'class/class.conexion.php';
    include 'class/class.tabla_cuentas.php';

    # Librerias

    # Model
    include 'models/model.editar.php';

    # Vista
    include 'views/view.editar.php';