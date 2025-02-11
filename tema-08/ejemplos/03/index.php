<?php 


     /**
      * Leer y guardar un archivo de texto plano
      */

      $archivo = file_get_contents("archivo.txt");

      $archivo .= "Nueva información añadida al archivo";

      file_put_contents("archivo.txt", $archivo);

      echo "Información guardada correctamente";