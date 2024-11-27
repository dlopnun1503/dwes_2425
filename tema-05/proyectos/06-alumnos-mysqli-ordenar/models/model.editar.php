<?php

    /*
        modelo: model.editar.php
        descripción: carga los datos del alumno que deseo actualizar

        Método GET:

            - id del alumno
    */

    # Cargamos el id del alumno que vamos a editar
    $id = $_GET['id'];

    # Creo un objeto de la clase tabla alumnos
    $tabla_alumnos = new Class_tabla_alumnos();

    # Cargo tabla de cursos
    $cursos = $tabla_alumnos->getCursos();

    # Obtener los detalles del alumno 
    // objeto de la clase alumno
    $alumno = $tabla_alumnos->read($id);

   
