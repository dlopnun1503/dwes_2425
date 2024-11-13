<?php

/**
 * Generamos nuevo alumno 
 */

$alumnos = new ArrayAlumno();
$alumnos->getAlumnos();

$asignaturas = ArrayAlumno::getAsignaturas();

$cursos = ArrayAlumno::getCursos();

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$fecha_nac = $_POST['fechaNac'];
$cursos_alum = $_POST['cursos'];
$asignaturas_alum = $_POST['asignaturas'];

# Validación


# Creo un objeto clase alumno a partir de los detalles 
# del formulario 
$alumno = new Alumno(
    $id,
    $nombre,
    $apellidos,
    $email,
    $fecha_nac,
    $cursos_alum,
    $asignaturas_alum
);



# Añadimos el alumno a la tabla 
$alumnos->create($alumno);

# Generamos notificación
$notificacion = "Alumno creado con éxito";

?>