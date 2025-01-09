<?php  

   /**
    * Creacion de cookies
    */

    setcookie("nombre", "Juan", time() + 3600);

    setcookie("edad", 30, time() + 3600);

    setcookie("ciudad", "Ubrique", time() + 3600);

    echo "Cookies creadas";

    require "index.php";