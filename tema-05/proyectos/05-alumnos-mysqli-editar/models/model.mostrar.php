<?php



// Obtener etiquetas, materia y cargar el libro

setlocale(LC_MONETARY, "es_ES");

# Creo un objeto de la clase tabla libros
$obj_tabla_libros = new Class_tabla_libros();

# Cargo tabla de materias
$materias = $obj_tabla_libros->getMaterias();

# Cargo tabla de etiquetas
$etiquetas = $obj_tabla_libros->getEtiquetas();

# Relleno el array de objetos
$obj_tabla_libros->getDatos();

$indice = $_GET['indice'];

# Usamos la funcion buscar indice
$libro = $obj_tabla_libros->read($indice);
