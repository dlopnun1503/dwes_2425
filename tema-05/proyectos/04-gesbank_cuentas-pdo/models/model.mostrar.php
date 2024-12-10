<?php

    /*
        modelo: model.mostrar.php
        descripción: carga los datos del cuenta que deseo actualizar

        Método GET:

            - indice de la tabla en la que se encuentra el cuenta
    */

    # Cargamos el indice del cuenta
    $id = $_GET['id'];

    # Creo un objeto de la clase tabla de cuentas
    $conexion = new Class_tabla_cuentas();

    $clientes = $conexion->getClientes();


    # Obtener el objeto de la clase artículo correspondiente a ese índice
    $cuenta = $conexion->read($id);

   
