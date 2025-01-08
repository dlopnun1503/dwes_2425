<?php 


    /**
     * Crear variables de sesion
     */

     // Inicia o continua la sesion
     session_start();

     // Crear variables de sesion
     $_SESSION['nombre'] = 'Juan';
     $_SESSION['email'] = 'juan@gmail.com';
     $_SESSION['perfil'] = 'Admin';

     echo 'Variables de sesion creadas';

     include 'index.php';