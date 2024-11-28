<?php

/*
        modelo: model.eliminar.php
        descripción: elimina alumno de la tabla
        
        Método GET:

            - id: id del alumno
    */

# Cargamos el id del alumno que vamos a editar
$id = $_GET['id'];

# Creo un objeto de la clase tabla alumnos
$tabla_alumnos = new Class_tabla_alumnos();

# Eliminar alumno
$alumno = $tabla_alumnos->delete($id);
