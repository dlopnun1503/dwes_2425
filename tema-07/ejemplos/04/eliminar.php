<?php
   

   /**
    * Eliminacion de cookies
    */

    // Eliminamos la cookie "nombre"
    setcookie("nombre", "", time() - 3600);

    // Eliminamos la cookie "edad"
    setcookie("edad", "", time() - 3600);

    // Eliminamos la cookie "ciudad"
    setcookie("ciudad", "", time() - 3600);

    echo "Cookies eliminadas";

    require "index.php";