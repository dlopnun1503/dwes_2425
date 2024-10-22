<?php


        /*
         model.edit.php
         edita un elemento de la lista
         Metodo get: 
        - id libro que se desea editar   
        */


//Cargar id del libro que voy a editar 
$id = $_GET['id'];

//Cargar la tabla
$libros = get_tabla_libros();

//Buscar id en la tabla y devuelvo el indice
$indice_editar = buscar_tabla($libros, 'id', $id);

//Validar la busqueda
if ($indice_editar === false) {

    echo "ERROR: Libro no encontrado";
    exit();

} 

// Creo el array registro solo con los detalles del libro
$libro = $libros[$indice_editar];


