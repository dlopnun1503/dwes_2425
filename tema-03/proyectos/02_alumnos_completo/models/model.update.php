<?php

/*

        Modelo:  model.update.php
        Descripción: actualiza un alumno

        Método POST:
            - id
            - nombre
            - poblacion
            - curso

        Método GET:
            - id

    */

# Extraemos los valores del formulario
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$poblacion = $_POST['poblacion'];
$curso = $_POST['curso'];

# Extraemos el id del alumno
$id_editar = $_GET['id'];

# Cargar tabla alumnos
$alumnos = get_tabla_alumnos();

#Obtenemos el indice de la tabla donde se encuentra el alumno
$indice_editar = buscar_tabla($alumnos, 'id', $id_editar);

# Creo un array asociativo con los detalles del nuevo alumno
$registro = [
    'id' => $id,
    'nombre' => $nombre,
    'poblacion' => $poblacion,
    'curso' => $curso
];

# Actualizar alumno a la tabla
$alumnos[$indice_editar] = $registro;
