<?php

    /*
        Modelo: model.ordenar.php
        Descripción: ordena los corredores por algún criterio

        Parámetros:
            - criterio: el número que identifica la posición de la columna en
            la tabla corredores
    */

    # Símbolo monetario local
    setlocale(LC_MONETARY,"es_ES");

    # Obtener el criterio de ordenación
    $criterio = $_GET['criterio'];

    # Creo un objeto de la clase tabla corredores
    $tabla_corredores = new Class_tabla_corredores();

    # Ejecuto el  método order() y devuelve objeto de la clase
    # mysqli_result
    $corredores = $tabla_corredores->order($criterio);

    
