<?php
    /*
        modelo: model.create.php
        descripción: añade el nuevo profesor a la tabla
        
        Métod POST:
            - id
            - nombre
            - apellidos
            - nrp
            - fecha_nacimiento
            - poblacion 
            - especialidad 
            - asignaturas 
    */

    # Cargo los detalles del  formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $nrp = $_POST['nrp'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $poblacion = $_POST['poblacion'];
    $especialidad = $_POST['especialidad'];
    $asignaturas = $_POST['asignaturas'];
    


    # Validación

    # Crear un objeto de la clase profesores a partir de los detalles del formulario
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

    # Crear un objeto de la clase tabla_profesores
    $obj_tabla_profesores = new Class_tabla_profesores();

    # Cargo los profesores
    $obj_tabla_profesores->getDatos();

    # Obtengo el array de Asignaturas
    $asignaturas = $obj_tabla_profesores->getAsignaturas();

    # Obtengo el  array de especialidad
    $especialidades = $obj_tabla_profesores->getEspecialidad();

    

    # Añadir el profesor a la tabla
    $obj_tabla_profesores->create($profesor);

    # Obtener la array profesores
    $array_profesores = $obj_tabla_profesores->tabla;