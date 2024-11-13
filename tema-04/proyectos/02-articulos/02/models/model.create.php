<?php
    /*
        modelo: model.create.php
        descripción: añade el nuevo artículo a la tabla
        
        Métod POST:
            - id
            - descripcion
            - modelo
            - marca (indice)
            - unidades
            - precio
            - categorias[]
    */

    # Cargo los detalles del  formulario
    $id = $_POST['id'];
    $descripcion = $_POST['descripcion'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $unidades = $_POST['unidades'];
    $precio = $_POST['precio'];
    $categorias = $_POST['categorias'];

    # Validación

    # Crear un objeto de la clase tabla_articulos
    $obj_tabla_articulos = new Class_tabla_articulos();

    # Cargo los artículos
    $obj_tabla_articulos->getDatos();

    # Obtengo el array de marcas
    $marcas = $obj_tabla_articulos->getMarcas();

    # Obtengo el  array de categorias
    $array_categorias = $obj_tabla_articulos->getCategorias();

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

    # Añadir el artículo a la tabla
    $obj_tabla_articulos->create($articulo);

    # Obtener la array artículos
    $array_articulos = $obj_tabla_articulos->getTabla();