<?php
// Obtener categorías, marcas y cargar los artículos
setlocale(LC_MONETARY, "es_ES");
$asignaturas = ArrayAlumno::getAsignaturas();

$cursos = ArrayAlumno::getCursos();

$alumnos = new ArrayAlumno();
$alumnos->getAlumnos();

$idBuscado = $_GET['indice'];

# Usamos la funcion buscar de ArrayArticulos
$alumno = $alumnos->buscarID($idBuscado);

?>