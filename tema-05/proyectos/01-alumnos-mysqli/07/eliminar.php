<?php
/*
        controlador: eliminar.php
        descripción: elimina un alumno de la tabla

        parámetros:

            - Método GET:
                - id - id del alumno que se desea eliminar
    */

# Archivos de configuración
include 'config/configDB.php';

# Clases
include 'class/class.alumno.php';
include 'class/class.conexion.php';
include 'class/class.tabla_alumnos.php';
# Librerias

# Model
include 'models/model.eliminar.php';

# Cargo el controlador index
header("location: index.php");
