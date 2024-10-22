<?php

/*

        Modelo:  model.update.php
        Descripción: actualiza un libro

        Método POST:
            - id
            - titulo
            - autor
            - editorial
            - genero
            - precio

        Método GET:
            - id

    */

# Extraemos los valores del formulario
$id = $_POST['id'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$editorial = $_POST['editorial'];
$genero = $_POST['genero'];
$precio = $_POST['precio'];

# Extraemos el id del libro
$id_editar = $_GET['id'];

# Cargar tabla libros
$libros = get_tabla_libros();

#Obtenemos el indice de la tabla donde se encuentra el libro
$indice_editar = buscar_tabla($libros, 'id', $id_editar);

# Creo un array asociativo con los detalles del nuevo libro
$libro = [
    'id' => $id,
    'titulo' => $titulo,
    'autor' => $autor,
    'editorial' => $editorial,
    'genero' => $genero,
    'precio' => $precio
];

# Actualizar libro a la tabla
$libros[$indice_editar] = $libro;
