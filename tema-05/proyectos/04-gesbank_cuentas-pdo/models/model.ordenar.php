<?php

    /*
        Modelo: model.ordenar.php
        Descripción: ordena los cuentas por algún criterio

        Parámetros:
            - criterio: el número que identifica la posición de la columna en
            la tabla cuentas
    */

    # Símbolo monetario local
    setlocale(LC_MONETARY,"es_ES");

    # Obtener el criterio de ordenación
    $criterio = $_GET['criterio'];

    # Creo un objeto de la clase tabla cuentas
    $conexion = new Class_tabla_cuentas();

    # Ejecuto el  método order() y devuelve objeto de la clase
    # mysqli_result
    $stmt_cuentas = $conexion->order($criterio);

    
