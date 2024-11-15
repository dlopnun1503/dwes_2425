<?php

    /*
        modelo: model.editar.php
        descripción: carga los datos del profesor que deseo actualizar

        Método GET:

            - indice de la tabla en la que se encuentra el profesor
    */

    # Cargamos el id del profesor
    $indice = $_GET['indice'];

    # Creo un objeto de la clase tabla de profesores
    $obj_tabla_profesores = new Class_tabla_profesores();

    #  Cargo los datos de profesores
    $obj_tabla_profesores->getDatos();
    
    # Cargo el array de especialidad - lista desplegable dinámica
    $especialidades = $obj_tabla_profesores->getEspecialidad();

    # Cargo el array de asignaturas - lista checbox dinámica
    $asignaturas = $obj_tabla_profesores->getAsignaturas();

    # Obtener el objeto de la clase profesor correspondiente a ese índice
    $profesor = $obj_tabla_profesores->read($indice);
