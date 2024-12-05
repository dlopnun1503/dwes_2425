<?php

/*
        modelo: model.eliminar.php
        descripción: elimina cliente de la tabla
        
        Método GET:

            - id: id del cliente
    */

# Cargamos el id del cliente que vamos a editar
$id = $_GET['id'];

# Creo un objeto de la clase tabla clientes
$conexion = new Class_tabla_clientes();

# Eliminar cliente
$cliente = $conexion->delete($id);
