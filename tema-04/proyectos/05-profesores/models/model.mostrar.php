<?php



// Obtener asignaturas, especialidad y cargar el PROFESOR

setlocale(LC_MONETARY, "es_ES");

# Creo un objeto de la clase tabla profesores
$obj_tabla_profesores = new Class_tabla_profesores();

# Cargo tabla de especialidades
$especialidades = $obj_tabla_profesores->getEspecialidad();

# Cargo tabla de asignaturas
$asignaturas = $obj_tabla_profesores->getAsignaturas();

# Relleno el array de objetos
$obj_tabla_profesores->getDatos();

$indice = $_GET['indice'];

# Usamos la funcion buscar indice
$profesor = $obj_tabla_profesores->read($indice);
