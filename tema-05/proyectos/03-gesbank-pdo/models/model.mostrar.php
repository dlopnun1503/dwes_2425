<?php

    /*
        modelo: model.mostrar.php
        descripción: carga los datos del libro que deseo actualizar

        Método GET:

            - indice de la tabla en la que se encuentra el libro
    */

    # Cargamos el indice del libro
    $id = $_GET['id'];

    # Creo un objeto de la clase tabla de clientes
    $conexion = new Class_tabla_clientes();

    # Obtener el objeto de la clase artículo correspondiente a ese índice
    $cliente = $conexion->read($id);

   
