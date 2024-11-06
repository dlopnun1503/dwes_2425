<?php


      /**
       * model.create.php
       * añade el nuevo articulo a la tabla
       * POST: 
       *      - id
       *      - descripcion
       *      - modelo
       *      - marca (indice)
       *      - categorias[]
       *      - unidades
       *      - precio
       */


       # Cargo los detalles del formulario 
       $id = $_POST['id'];
       $descripcion = $_POST['descripcion'];
       $modelo = $_POST['modelo'];
       $marca = $_POST['marca'];
       $categorias = $_POST['categorias'];
       $unidades = $_POST['unidades'];
       $precio = $_POST['precio'];
       

       # Validacion

       # Crear un objeto de la clase tabla articulos 
       $obj_tabla_articulos = new Class_tabla_articulos();

       # Cargo los articulos
       $obj_tabla_articulos->getDatos();

       # Obtengo el array de marcas
       $marcas = $obj_tabla_articulos->getMarcas();

       # Obtengo el array de categorias
       $array_categorias = $obj_tabla_articulos->getCategorias();

       # Creo un objeto de la clase articulo a partir de los detalles del formulario
       // OJO AL ORDEN DE LOS PARAMETROS
       $articulo = new Class_articulo(
        $id,
        $descripcion,
        $modelo,
        $marca,
        $categorias,
        $unidades,
        $precio
       );

       # Añadir el articulo a la tabla
       $obj_tabla_articulos->create($articulo);

       # Obtener el array articulos
       $array_articulos = $obj_tabla_articulos->getTabla();