<?php

    /*
        inicio de sesion
    */

    // Personalizar SID
    session_id('1010000111RT');

    // Personalizar name
    session_name('GesBank_01');

    // Inicio sesion
    session_start();

    echo 'sesion iniciada' . '<br>';

    echo 'SID: ' . session_id();
    echo '<br>';
    echo 'NAME: ' . session_name();