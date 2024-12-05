<?php
/*
        controlador: mostrar.php
        descripción: muestra los detalles de un libro sin edición

        parámetros:

            - Método GET:
                - indice donde se ecuentra el libro dentro de la tabla
    */

# Archivos de configuración
include 'config/configDB.php';

# Clases
include 'class/class.cliente.php';
include 'class/class.conexion.php';
include 'class/class.tabla_clientes.php';

# Librerias

# Model
include 'models/model.mostrar.php';

# Vista
include 'views/view.mostrar.php';
