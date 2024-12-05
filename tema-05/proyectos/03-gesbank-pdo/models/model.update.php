<?php

/*
    Modelo: model.update.php
    Descripción: actualiza los datos del cliente

     Métod POST:
        
        - Los detalles del cliente
    
    Método GET:

        - id del cliente
*/

# Símbolo monetario local
setlocale(LC_MONETARY, "es_ES");

# Cargo el id del cliente
$id = $_GET['id'];

# Cargo los detalles del cliente
$apellidos = $_POST['apellidos'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$ciudad = $_POST['ciudad'];
$dni = $_POST['dni'];
$email = $_POST['email'];


# Validación

 # Creamos objeto de la clase Class_cliente
 $cliente = new Class_cliente (
    $id,
    $apellidos,
    $nombre,
    $telefono,
    $ciudad,
    $dni,
    $email
);

# Actulizo los detalles del cliente en la  tabla
$conexion = new Class_tabla_clientes();

# Llamo al método update de Class_tabla_conexion
$conexion->update($cliente, $id);









