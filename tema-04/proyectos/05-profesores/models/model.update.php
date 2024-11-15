<?php

    /*
        Modelo: model.update.php
        Descripción: actualiza los datos del registro a partir de los detalles del formulario

        Métod POST:
            - id
            - nombre
            - apellidos
            - nrp
            - fecha_nacimiento
            - poblacion 
            - especialidad 
            - asignaturas 
        
        Método GET:
                    - indice (indice de la tabla correspondiente a dicho registro)
    */

    # Símbolo monetario local
    setlocale(LC_MONETARY,"es_ES");

    # Cargo los detalles del  formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $nrp = $_POST['nrp'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $poblacion = $_POST['poblacion'];
    $especialidad = $_POST['especialidad'];
    $asignaturas = $_POST['asignaturas'];

    # Crear un objeto de la clase profesor a partir de los detalles del formulario
    $profesor = new Class_profesor(
        $id,
        $nombre,
        $apellidos,
        $nrp,
        $fecha_nacimiento,
        $poblacion,
        $especialidad,
        $asignaturas
    );

    # Cargo el índice de la tabla donde se encuentra el profesor
    $indice = $_GET['indice'];
    
    # Creo un objeto de la clase tabla profesores
    $obj_tabla_profesores = new Class_tabla_profesores();

    # Cargo los datos en el objeto de la clase tabla de profesores
    $obj_tabla_profesores->getDatos();

    # Actualizo la tabla 
    $obj_tabla_profesores->update($profesor, $indice);

    # Extraer la tabla para la vista
    $array_profesores = $obj_tabla_profesores->tabla;

    # Extraer array de especialidades para la vista
    $especialidades = $obj_tabla_profesores->getEspecialidad();


    

    

