<?php 


     // Inicio sesion
    session_start();

    echo 'sesion iniciada' . '<br>';

    echo 'SID: ' . session_id();
    echo '<br>';
    echo 'NAME: ' . session_name();

    include 'index.php';