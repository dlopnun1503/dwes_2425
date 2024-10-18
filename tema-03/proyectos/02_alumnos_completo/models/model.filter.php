<?php 


    /*
    model.filter.php
    permite filtrar en  la tabla segun que expresion

    Metodo GET:
    - criterio: id, nombre, poblacion, curso
    */


    # Obtenemos patron
    $expresion = $_GET['expresion'];

    # cargamos la tabla
    $alumnos = get_tabla_alumnos();

    # Filtramos la tabla a partir de la expresion

    // Creo un array vacio donde ire cargando las filas que cumplen
    // con la expresion de filtrado
    $aux = [];

    // Recorrer la tabla fila a fila para comprobar la expresion
    foreach($alumnos as $registro){
        if(array_search($expresion, $registro, false)){
            $aux[] = $registro;
        }
    }

    $alumnos = $aux;