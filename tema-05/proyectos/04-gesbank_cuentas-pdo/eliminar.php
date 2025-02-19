<?php
/*
        controlador: eliminar.php
        descripción: elimina un cuenta de la tabla

        parámetros:

            - Método GET:
                - id - id del cuenta que se desea eliminar
    */

# Archivos de configuración
include 'config/configDB.php';

# Clases
include 'class/class.cuenta.php';
include 'class/class.conexion.php';
include 'class/class.tabla_cuentas.php';
# Librerias

# Model
include 'models/model.eliminar.php';

# Cargo el controlador index
header("location: index.php");
