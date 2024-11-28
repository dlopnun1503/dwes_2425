<?php

    /*
        modelo: model.editar.php
        descripción: carga los datos del corredor que deseo actualizar

        Método GET:

            - id del corredor
    */

    # Cargamos el id del corredor que vamos a editar
    $id = $_GET['id'];

    # Creo un objeto de la clase tabla corredores
    $tabla_corredores = new Class_tabla_corredores();

    # Cargo tabla de categorias
    $categorias = $tabla_corredores->getCategorias();

    # Cargo tabla de clubs
    $clubs = $tabla_corredores->getClubs();

    # Obtener los detalles del corredor 
    // objeto de la clase corredor
    $corredor = $tabla_corredores->read($id);

   
