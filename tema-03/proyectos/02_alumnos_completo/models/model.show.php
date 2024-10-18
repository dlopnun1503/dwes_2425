<?php


        /*
         model.show.php
         muestra un elemento de la lista
         Metodo get: 
        - id alumno que se desea mostrar   
        */


//Cargar id del alumno que voy a editar 
$id = $_GET['id'];

//Cargar la tabla
$alumnos = get_tabla_alumnos();

//Buscar id en la tabla y devuelvo el indice
$indice_mostrar = buscar_tabla($alumnos, 'id', $id);

//Validar la busqueda
if ($indice_mostrar === false) {

    echo "ERROR: Alumno no encontrado";
    exit();

} 

// Creo el array registro solo con los detalles del alumno
$registro = $alumnos[$indice_mostrar];