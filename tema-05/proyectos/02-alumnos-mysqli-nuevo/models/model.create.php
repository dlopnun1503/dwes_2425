<?php
    /*
        modelo: model.create.php
        descripción: añade el nuevo alumno a la tabla
        
        Métod POST:
            - id
            - nombre
            - apellidos
            - email
            - telefono
            - nacionalidad
            - dni 
            - id_curso  
    */

    # Cargo los detalles del  formulario
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $nacionalidad = $_POST['nacionalidad'];
    $dni = $_POST['dni'];
    $fechaNac = $_POST['fechaNac'];
    $id_curso = $_POST['id_curso'];
    

    # Validación

    # Crear un objeto de la clase alumnos a partir de los detalles del formulario
    $alumno = new Class_alumno(
        null,
        $nombre,
        $apellidos,
        $email,
        $telefono,
        $nacionalidad,
        $dni,
        $fechaNac,
        $id_curso
    );

    # Crear un objeto de la clase tabla_alumnos
    $obj_tabla_alumnos = new Class_tabla_alumnos('localhost', 'root', '', 'fp');

    # Añadir el alumno a la tabla
    $obj_tabla_alumnos->create($alumno);

    # Redirecciom al controlador index
    header("location: index.php");
