<?php

/*
        modelo: model.eliminar.php
        descripción: elimina cuenta de la tabla
        
        Método GET:

            - id: id del cuenta
    */

# Cargamos el id del cuenta que vamos a editar
$id = $_GET['id'];

# Creo un objeto de la clase tabla cuentas
$conexion = new Class_tabla_cuentas();

# Eliminar cuenta
$cuenta = $conexion->delete($id);
