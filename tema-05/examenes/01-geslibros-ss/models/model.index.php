<?php

    /*
        Modelo: model.index.php
        Descripción: muestra los detalles de clientes

    */

    setlocale(LC_MONETARY, 'es_ES');

    $conexion = new Class_tabla_libros;

    $stmt_libros = $conexion->get_libros();
