<?php

    /**
     * model.editar.php 
     * carga los datos del articulo que deseo editar
     * Metdo GET:
     *        - id del articulo
     */

     # Cargamos el id
     $id = $_GET['id'];

     # Creo un objeto de la clase tabla de artículos
     $obj_tabla_articulos = new Class_tabla_articulos();

     # Cargo el array de marcas
     $marcas = $obj_tabla_articulos->getMarcas();

     # Cargo el array de categorias
     $categorias = $obj_tabla_articulos->getCategorias();

     # Obtener el indice del articulo en la tabla
     $indice = $obj_tabla_articulos->devolver_indice($id);

     # Obtener el objeto de articulo correspondiente a ese indice
     $articulo = $obj_tabla_articulos->read($indice);