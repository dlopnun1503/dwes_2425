<?php 


      /**
       * Crear un script PHP donde se muestre el tipo de dato y resultado de las siguientes expresiones matemáticas:
       * 1. Multiplica valor entero con una cadena que contiene un número inicial
       * 2. Sumar valor entero con cadena con número inicial
       * 3. Sumar valor entero con valor float
       * 4. Concatenar valor entero con cadena
       * 5. Sumar valor entero con valor booleano
       */

       // 1
       $v1 = 3;
       $v2 = "10 poemas de amor y una cancion desesperada";
       var_dump($v1 * $v2);
       echo "<br>";

       // 2
       var_dump($v1 + $v2);
       echo "<br>";

       // 3
       $v3 = 3.5;
       var_dump($v1 + $v3);
       echo "<br>";

       // 4
       $v4 = "perros blancos";
       var_dump($v1 . " " . $v4);
       echo "<br>"; 

       // 5 
       $v5 = true;
       var_dump($v1 + $v5);
       echo "<br>";