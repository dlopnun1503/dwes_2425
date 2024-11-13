<?php

    /*
        Modelo: model.update.php
        Descripción: actualiza los datos del registro a partir de los detalles del formulario

        Método POST:
                    - id
                    - descripcion
                    - modelo
                    - genero
                    - marca
                    - unidades
                    - precio
                    - categorias
        
        Método GET:
                    - indice (indice de la tabla correspondiente a dicho registro)
    */

    # Símbolo monetario local
    setlocale(LC_MONETARY,"es_ES");

    # Cargo los detalles del  formulario
    $id = $_POST['id'];
    $descripcion = $_POST['descripcion'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $unidades = $_POST['unidades'];
    $precio = $_POST['precio'];
    $categorias = $_POST['categorias'];

    # Crear un objeto de la clase artículos a partir de los detalles del formulario
    $articulo = new Class_articulo(
        $id,
        $descripcion,
        $modelo,
        $marca,
        $categorias,
        $unidades,
        $precio
    );

    # Cargo el índice de la tabla donde se encuentra el artículo
    $indice = $_GET['indice'];
    
    # Creo un objeto de la clase tabla artículos
    $obj_tabla_articulos = new Class_tabla_articulos();

    # Cargo los datos en el objeto de la clase tabla de artículos
    $obj_tabla_articulos->getDatos();

    # Actualizo la tabla 
    $obj_tabla_articulos->update($articulo, $indice);

    # Extraer la tabla para la vista
    $array_articulos = $obj_tabla_articulos->getTabla();

    # Extraer array de marcas para la vista
    $marcas = $obj_tabla_articulos->getMarcas();


    

    

