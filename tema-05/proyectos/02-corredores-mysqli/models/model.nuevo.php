<?php

    /*
        Modelo: model.nuevo.php
        Descripción: genera los datos necesarios para añadir nuevo corredor
    */

    # Símbolo monetario local
    setlocale(LC_MONETARY,"es_ES");

    # Creo un objeto de la clase tabla corredores
    $corredores = new Class_tabla_corredores();
    
    # Cargo tabla de categorias
    $categorias = $corredores->getCategorias();

     # Cargo tabla de clubs
     $clubs = $corredores->getClubs();

    

