<?php
 
    
     /**
      * model.index.php
      * genera los datos necesarios para añadir nuevo articulo
      */


      setlocale(LC_MONETARY, "es_ES"); // Establece simbolo de euro

      #Creo un objeto de la clase tabla_articulos 
      $articulos = new Class_tabla_articulos();

      #Cargamos tabla de marcas
      $marcas = $articulos->getMarca();

      #Cargo tabla de categorias
      $categorias = $articulos->getCategorias();

      