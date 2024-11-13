<?php

// Model: model.eliminar.php

// Descripción: eliminar un elemto de la tabla

setlocale(LC_MONETARY, "es_ES");
$asignaturas = ArrayAlumno::getAsignaturas();

$cursos = ArrayAlumno::getCursos();

$alumnos = new ArrayAlumno();
$alumnos->getAlumnos();


// No comprendo porqué se llama indice y no id
$id = $_GET['indice'];

if ($id !== false) {
    // elimino elemento seleccionado 
    $alumnos->delete($id);

    # Generamos notificación
    $notificacion = "Alumno eliminado con éxito";

} else {
    echo 'ERROR: libro no encontrado';
    exit();
}

?>