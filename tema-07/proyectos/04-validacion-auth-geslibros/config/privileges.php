<?php 


    /*
       Definimos los privilegios de la aplicación

       Recordamos los perfiles de la aplicacion: 
         - 1.admin
         - 2.editor
         - 3.registrador

         Los privilegios de la aplicación son:
         - 1. main
         - 2. nuevo
         - 3. editar
         - 4. eliminar
         - 5. mostrar
         - 6. order
         - 7. filter

        Los perfiles se asignaran mediante un array asociativo, 
        donde la clave principal se corresponde con el controlador 
        la clave secundaria con el metodo

        $GLOBALS['libro']['main'] = [1,2,3];
     */

    $GLOBALS['libro']['main'] = [1,2,3];
    $GLOBALS['libro']['nuevo'] = [1,2];
    $GLOBALS['libro']['editar'] = [1,2];
    $GLOBALS['libro']['eliminar'] = [1];
    $GLOBALS['libro']['mostrar'] = [1,2,3];
    $GLOBALS['libro']['filtrar'] = [1,2,3];
    $GLOBALS['libro']['ordenar'] = [1,2,3];
