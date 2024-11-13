<?php

    /*
        modelo: model.editar.php
        descripción: carga los datos del artículo que deseo actualizar

        Método GET:

            - indice de la tabla en la que se encuentra el artículo
    */

    # Cargamos el id del artículo
    $indice = $_GET['indice'];

    # Creo un objeto de la clase tabla de artículos
    $obj_tabla_articulos = new Class_tabla_articulos();

    #  Cargo los datos de artículos
    $obj_tabla_articulos->getDatos();
    
    # Cargo el array de marcas - lista desplegable dinámica
    $marcas = $obj_tabla_articulos->getMarcas();

    # Cargo el array de categorias - lista checbox dinámica
    $categorias = $obj_tabla_articulos->getCategorias();

    # Obtener el objeto de la clase artículo correspondiente a ese índice
    $articulo = $obj_tabla_articulos->read($indice);
