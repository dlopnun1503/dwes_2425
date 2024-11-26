<?php

    /*
        Modelo: model.index.php
        Descripción: genera array objetos de la clase clientes
    */

    # Símbolo monetario local
    setlocale(LC_MONETARY,"es_ES");

    # Creo un objeto de la clase tabla clientes
    $obj_tabla_clientes = new Class_tabla_clientes('localhost', 'root', '', 'gesbank');

    # Cargo tabla clientes
    $clientes = $obj_tabla_clientes->getClientes();


