<?php
    /*
        controlador: editar.php
        descripción: muestra los detalles de un profesor en modo edición

        parámetros:

            - Método GET:
                - id  id del profesor que deseo editar
    */

    # Clases
    include 'class/class.profesor.php';
    include 'class/class.tabla_profesores.php';

    # Librerias

    # Model
    include 'models/model.editar.php';

    # Vista
    include 'views/view.editar.php';