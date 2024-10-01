<?php 

    /**
     * Crear un script PHP donde se muestre el resultado de 3 valores verdaderos y tres valores falsos para la función is_null()
     */

     // 1
     var_dump(is_null($v));
     echo "<br>";

     // 2
     $var;
     var_dump(is_null($var));
     echo "<br>";

     // 3
     $var2 = null;
     var_dump(is_null($var2));
     echo "<br>";

     // 4
     $var3 = 4;
     var_dump(is_null($var3));
     echo "<br>";
     
     // 5
     $var5 = "David Lopez";
     var_dump(is_null($var5));
     echo "<br>";

     // 6
     $var6 = true;
     var_dump(is_null($var6));
     echo "<br>";