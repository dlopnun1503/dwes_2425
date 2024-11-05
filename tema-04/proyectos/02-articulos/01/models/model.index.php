<?php
 
    
     /**
      * model.index.php
      * genera array objetos de la clase articulos
      */


      setlocale(LC_MONETARY, "es_ES"); // Establece simbolo de euro

      #Creo un objeto de la clase tabla_articulos 
      $articulos = new Class_tabla_articulos();

      #Cargamos tabla de marcas
      $marcas = $articulos->getMarca();

      #Cargo tabla de categorias
      $categorias = $articulos->getCategorias();

      #Relleno el array de objetos
      $articulos->getDatos();

      #Obtener tabla de articulos
      $tabla_articulos = $articulos->getTabla();

      