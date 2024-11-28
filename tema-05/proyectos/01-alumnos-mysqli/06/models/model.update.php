<?php

/*
    Modelo: model.update.php
    Descripción: actualiza los datos del alumno

     Métod POST:
        
        - Los detalles del alumno
    
    Método GET:

        - id del alumno
*/

# Símbolo monetario local
setlocale(LC_MONETARY, "es_ES");

# Cargo el id del alumno
$id = $_GET['id'];

# Cargo los detalles del alumno
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$fechaNac = $_POST['fechaNac'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$nacionalidad = $_POST['nacionalidad'];
$dni = $_POST['dni'];
$id_curso = $_POST['id_curso'];

# Validación

 # Creamos objeto de la clase Class_alumno
 $alumno = new Class_alumno (
    $id,
    $nombre,
    $apellidos,
    $email,
    $telefono,
    $nacionalidad,
    $dni,
    $fechaNac, 
    $id_curso
);

# Actulizo los detalles del alumno en la  tabla
$alumnos = new Class_tabla_alumnos();

# Llamo al método update de Class_tabla_alumnos
$alumnos->update($alumno, $id);









