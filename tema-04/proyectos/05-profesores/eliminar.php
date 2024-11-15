<?php
    /*
        controlador: eliminar.php
        descripción: elimina un profesor de la tabla

        parámetros:

            - Método GET:
                - indice - indice del profesor que voy a eliminar
    */

    # Clases
    include 'class/class.profesor.php';
    include 'class/class.tabla_profesores.php';

    # Librerias

    # Model
    include 'models/model.eliminar.php';

    # Vista
    include 'views/view.index.php';