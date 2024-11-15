<?php

    /*
        modelo: model.eliminar.php
        descripción: elimina un profesor de la tabla
        
        Método GET:

            - indice: de la tabla donde se encuentra el profesor que voy a eliminar
    */

    # Cargamos el indice del profesor
    $indice = $_GET['indice'];

    # Creo un objeto de la clase tabla de profesores
    $obj_tabla_profesores = new Class_tabla_profesores();

    #  Cargo los datos de profesores
    $obj_tabla_profesores->getDatos();
    
    # Cargo el array de especialidades - lista desplegable dinámica
    $especialidades = $obj_tabla_profesores->getEspecialidad();

    # Obtener el objeto de la clase profesor correspondiente a ese índice
    $obj_tabla_profesores->delete($indice);

    # Obtengo la tabla de artículos actualizada para la vista
    $array_profesores = $obj_tabla_profesores->tabla;