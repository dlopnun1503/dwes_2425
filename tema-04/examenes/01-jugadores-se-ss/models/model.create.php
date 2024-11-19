<?php
    /*
        autor: model.create.php
        descripción: añade el nuevo jugador a la tabla
        
        Métod POST: Todos los atributos de la clase jugador
            
    */

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $nacionalidad = $_POST['nacionalidad'];
    $num_camiseta = $_POST['num_camiseta'];
    $valor_mercado = $_POST['valor_mercado'];
    $equipo = $_POST['equipo'];
    $posiciones = $_POST['posiciones'];


    // Creamos un objeto de la clase jugador
    $jugador = new Class_jugador(
        $id,
        $nombre,
        $fecha_nacimiento,
        $altura,
        $peso,
        $nacionalidad,
        $num_camiseta,
        $valor_mercado,
        $equipo,
        $posiciones
    );


    // Creamos objeto de la clase tabla pjugadores
    $obj_tabla_jugadores = new Class_tabla_jugadores;

    // Obtenemos datos, equipo y posiciones
    $obj_tabla_jugadores->getDatos();
    $equipos = $obj_tabla_jugadores->getEquipos();
    $array_posiciones = $obj_tabla_jugadores->getPosiciones();

    // Añadir el jugador a la tabla
    $obj_tabla_jugadores->create($jugador);

    // Obtener la array jugadores
    $array_jugadores = $obj_tabla_jugadores->tabla;