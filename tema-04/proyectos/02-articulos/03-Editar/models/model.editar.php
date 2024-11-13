<?php

    /**
     * model.editar.php 
     * carga los datos del articulo que deseo editar
     * Metdo GET:
     *        - indice del articulo
     */

     # Cargamos el id
     $indice = $_GET['indice'];

     # Creo un objeto de la clase tabla de artículos
     $obj_tabla_articulos = new Class_tabla_articulos();

     # Cargo los datos 
     $obj_tabla_articulos->getDatos();

     # Cargo el array de marcas
     $marcas = $obj_tabla_articulos->getMarcas();

     # Cargo el array de categorias
     $categorias = $obj_tabla_articulos->getCategorias();

     # Obtener el objeto de articulo correspondiente a ese indice
     $articulo = $obj_tabla_articulos->read($indice);