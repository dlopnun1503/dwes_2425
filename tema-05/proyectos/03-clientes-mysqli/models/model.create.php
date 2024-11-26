<?php
    /*
        modelo: model.create.php
        descripción: añade el nuevo cliente a la tabla
        
        Métod POST:
            - id
            - apellidos
            - nombre
            - telefono
            - ciudad
            - dni 
            - email  
    */

    # Cargo los detalles del  formulario
    $apellidos = $_POST['apellidos'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $ciudad = $_POST['ciudad'];
    $dni = $_POST['dni'];
    $email = $_POST['email'];
    

    # Validación

    # Crear un objeto de la clase clientes a partir de los detalles del formulario
    $cliente = new Class_cliente(
        null,
        $apellidos,
        $nombre,
        $telefono,
        $ciudad,
        $dni,
        $email
    );

    # Crear un objeto de la clase tabla_clientes
    $obj_tabla_clientes = new Class_tabla_clientes('localhost', 'root', '', 'gesbank');

    # Añadir el cliente a la tabla
    $obj_tabla_clientes->create($cliente);

    # Redirecciom al controlador index
    header("location: index.php");
