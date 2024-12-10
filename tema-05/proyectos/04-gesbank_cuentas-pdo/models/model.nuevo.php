<?php

    /*
        Modelo: model.nuevo.php
        Descripción: genera los datos necesarios para añadir nuevo alumno
    */

    # Símbolo monetario local
    setlocale(LC_MONETARY,"es_ES");

    $conexion = new Class_tabla_cuentas();
    
    # Creo un objeto de la clase tabla clientes
    $clientes = $conexion->getClientes();

    

    

    

