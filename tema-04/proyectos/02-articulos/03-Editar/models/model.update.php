<?php




# Extraemos los valores del formulario
$id = $_POST['id'];
$descripcion = $_POST['descripcion'];
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$categorias = $_POST['categorias'];
$unidades = $_POST['unidades'];
$precio = $_POST['precio'];


# Extraemos el id del articulo
$id_editar = $_GET['id'];

# Creo un objeto de la clase tabla de artículos
$obj_tabla_articulos = new Class_tabla_articulos();

# Cargo los datos 
$obj_tabla_articulos->getDatos();

# Cargo el array de marcas
$marcas = $obj_tabla_articulos->getMarcas();

# Cargo el array de categorias
$categorias = $obj_tabla_articulos->getCategorias();

# Creo un array asociativo con los detalles del nuevo articulo
$articulo = [
    'id' => $id,
    'descripcion' => $descripcion,
    'modelo' => $modelo,
    'marca' => $marca,
    'categorias' => $categorias,
    'unidades' => $unidades,
    'precio' => $precio
];

# Actualizar articulo a la tabla
$obj_tabla_articulos->update($articulo);
