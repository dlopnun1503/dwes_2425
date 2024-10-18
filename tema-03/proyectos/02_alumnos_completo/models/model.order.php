<?php 


    /*
    model.order.php
    permite ordenar la tabla segun que criterios
    orden ascendente

    Metodo GET:
    - criterio: id, nombre, poblacion, curso
    */


    # Cargamos el criterio
    $criterio = $_GET['criterio'];

    # cargamos la tabla
    $alumnos = get_tabla_alumnos();

    # Ordenar tabla

    // Cargo en un array los valores de la columna de ordenacion
    $aux = array_column($alumnos, $criterio);

    // Funcion array_multisort -> Para ordenar
    array_multisort($aux, SORT_ASC, $alumnos);