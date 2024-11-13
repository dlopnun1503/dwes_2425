<?php
    /*
        controlador: editar.php
        descripción: muestra los detalles de un artícul en modo edición

        parámetros:

            - Método GET:
                - id  id del artículo que deseo editar
    */

    # Clases
    include 'class/class.articulo.php';
    include 'class/class.tabla_articulos.php';

    # Librerias

    # Model
    include 'models/model.editar.php';

    # Vista
    include 'views/view.editar.php';