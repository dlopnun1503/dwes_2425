<?php

    /*
        controlador: editar.php
        descripción: muestra los detalles de un articulo en modo edicion

        parametros:
              Metodo GET:
              - ID del articulo que se va a editar
    */

    # Clases
    include 'class/class.articulo.php';
    include 'class/class.tabla_articulos.php';

    # Librerias

    # Model
    include 'models/model.editar.php';

    # Vista
    include 'views/view.editar.php';