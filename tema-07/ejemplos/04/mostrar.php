<?php


  /**
   * Mostrar cookies
   */

   // Comprobamos si existe la cookie "nombre"
    if(isset($_COOKIE["nombre"])) {
         echo "La cookie nombre es: " . $_COOKIE["nombre"] . "<br>";
    } else {
         echo "La cookie nombre no existe <br>";
    }

    // Comprobamos si existe la cookie "edad"
    if(isset($_COOKIE["edad"])) {
         echo "La cookie edad es: " . $_COOKIE["edad"] . "<br>";
    } else {
         echo "La cookie edad no existe <br>";
    }

    // Comprobamos si existe la cookie "ciudad"
    if(isset($_COOKIE["ciudad"])) {
         echo "La cookie ciudad es: " . $_COOKIE["ciudad"] . "<br>";
    } else {
         echo "La cookie ciudad no existe <br>";
    }

    // Mostrar array asociativo con todas las cookies
    print_r($_COOKIE);

    require "index.php";