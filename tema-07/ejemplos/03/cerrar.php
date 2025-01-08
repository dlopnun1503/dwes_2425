<?php

/**
 * Cerrar la sesion 
 */

// inicia o continua la sesion
session_start();

// destruye las variables de sesion
session_unset();

// destruye la sesion
session_destroy();

echo 'SID: ' . session_id();
echo '<br>';
echo 'NAME: ' . session_name();

include 'index.php';
