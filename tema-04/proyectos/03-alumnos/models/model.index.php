<?php

/*

    Modelo: model.index.php
    Descripcion: genera en array de objetos de los artículos

*/

setlocale(LC_MONETARY, "es_ES");
$asignaturas = ArrayAlumno::getAsignaturas();

$cursos = ArrayAlumno::getCursos();

$alumnos = new ArrayAlumno();
$alumnos->getAlumnos();

?>