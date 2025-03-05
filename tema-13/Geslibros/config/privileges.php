<?php

    /*
        Definimos los privilegios de la aplicación

        Recordamos los perfiles:
        - 1: Administrador
        - 2: Editor
        - 3: Registrado

        Recordamos los controladores o recursos:
        - 1: libro

        Los privilegios son:
        - 1: main
        - 2: nuevo
        - 3: editar
        - 4: eliminar
        - 5: mostarar
        - 6: ordenar
        - 7: filtrar

        Los perfiles se asignarán mediante un array asociativo, 
        donde la clave principal se corresponde con el controlador 
        la clave secundaria con el  método.

        $GLOBALS['libro']['main] = [1, 2, 3];

        Se asignan los perfiles que tienen acceso a un determinado método del controlador libro.

    */ 
    $GLOBALS['libro']['main'] = [1, 2, 3];
    $GLOBALS['libro']['nuevo'] = [1, 2];
    $GLOBALS['libro']['editar'] = [1, 2];
    $GLOBALS['libro']['eliminar'] = [1];
    $GLOBALS['libro']['mostrar'] = [1, 2, 3];
    $GLOBALS['libro']['filtrar'] = [1, 2, 3];
    $GLOBALS['libro']['ordenar'] = [1, 2, 3];
    $GLOBALS['libro']['exportar'] = [1];
    $GLOBALS['libro']['importar'] = [1];
    $GLOBALS['libro']['pdf'] = [1, 2];

    
    $GLOBALS['autor']['main'] = [1, 2, 3];
    $GLOBALS['autor']['nuevo'] = [1, 2];
    $GLOBALS['autor']['editar'] = [1, 2];
    $GLOBALS['autor']['eliminar'] = [1];
    $GLOBALS['autor']['mostrar'] = [1, 2, 3];
    $GLOBALS['autor']['filtrar'] = [1, 2, 3];
    $GLOBALS['autor']['ordenar'] = [1, 2, 3];
    $GLOBALS['autor']['exportar'] = [1];
    $GLOBALS['autor']['importar'] = [1];
    $GLOBALS['autor']['pdf'] = [1, 2];


    $GLOBALS['user']['main'] = [1];
    $GLOBALS['user']['nuevo'] = [1];
    $GLOBALS['user']['editar'] = [1];
    $GLOBALS['user']['eliminar'] = [1];
    $GLOBALS['user']['mostrar'] = [1];
    $GLOBALS['user']['filtrar'] = [1];
    $GLOBALS['user']['ordenar'] = [1];