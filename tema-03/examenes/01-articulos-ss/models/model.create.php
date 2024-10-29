<?php

/*
        Modelo:  model.create.php
        Descripción: añade un nuevo articulo a la tabla
    */

# Extraemos los valores del formulario
$id = $_POST['id'];
$descripcion = $_POST['descripcion'];
$modelo = $_POST['modelo'];
$categoria = $_POST['categoria'];
$unidades = $_POST['unidades'];
$precio = $_POST['precio'];

# Cargar tabla articulos
$articulos = generar_tabla();

# Creo un array asociativo con los detalles del nuevo articulo
$registro = [
    'id' => $id,
    'descripcion' => $descripcion,
    'modelo' => $modelo,
    'categoria' => $categoria,
    'unidades' => $unidades,
    'precio' => $precio
];

# Añadir nuevo articulo a la tabla
$articulos[] = $registro;
