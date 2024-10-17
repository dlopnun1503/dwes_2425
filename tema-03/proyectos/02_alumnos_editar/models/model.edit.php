<?php


        /*
         model.delete.php
         elimina un elemento de la lista
         Metodo get: 
        - id alumno que se desea eliminar   
        */


//Cargar id del alumno que voy a editar 
$id = $_GET['id'];

//Cargar la tabla
$alumnos = get_tabla_alumnos();

//Buscar id en la tabla y devuelvo el indice
$indice_editar = buscar_tabla($alumnos, 'id', $id);

//Validar la busqueda
if ($indice_editar === false) {

    echo "ERROR: Alumno no encontrado";
    exit();

} 

// Creo el array registro solo con los detalles del alumno
$registro = $alumnos[$indice_editar];

// print_r($registro);
// exit();
