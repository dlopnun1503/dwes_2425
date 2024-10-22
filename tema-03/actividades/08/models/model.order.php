<?php
    /*
        Modelo: model.order.php
        Descripción: permite ordenar la tabla por cualquiera de las columnas
        siempre en orden ascendente

        Método GET:
            - criterio: id, titulo, autor, editorial, genero, precio

    */

    # Obtenemos criterio de ordenación
    $criterio = $_GET['criterio'];
    
    # cargamos la tabla
    $libros = get_tabla_libros();

    # Ordenar tabla

    // Cargo en un array todos los valores de la columna de ordenación
    $aux = array_column($libros, $criterio);

    // Función array_multisort
    array_multisort($aux, SORT_ASC, $libros);