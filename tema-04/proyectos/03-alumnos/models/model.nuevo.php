<?php

/**
 * 
 * Model: model.nuevo.php
 * Descripción: carga array asignaturas y array de cursos
 * 
 */


# Cargamos arrays para generar de forma dinámica la lista select
setlocale(LC_MONETARY, "es_ES");
$asignaturas = ArrayAlumno::getAsignaturas();

$cursos = ArrayAlumno::getCursos();

?>