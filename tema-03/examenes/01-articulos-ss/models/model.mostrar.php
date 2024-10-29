<?php

        /*
         model.mostrar.php
         muestra un elemento de la lista
         Metodo get: 
        - id articulo que se desea mostrar   
        */


//Cargar id del articulo que voy a editar 
$id = $_GET['id'];

//Cargar la tabla
$articulos = generar_tabla();

//Buscar id en la tabla y devuelvo el indice
$indice_mostrar = buscar_registro($articulos, 'id', $id);

//Validar la busqueda
if ($indice_mostrar === false) {

    echo "ERROR: Artículo no encontrado";
    exit();

} 

// Creo el array registro solo con los detalles del articulo
$registro = $articulos[$indice_mostrar];
    
?>