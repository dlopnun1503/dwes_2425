<?php 

    /**
     * Crear un script PHP donde se muestre el resultado de 3 valores verdaderos y tres valores falsos para la función empty()
     */


     // 1
     var_dump(empty($v));
     echo "<br>";

     // 2
     $var;
     var_dump(empty($var));
     echo "<br>";

     // 3
     $var2 = "";
     var_dump(empty($var2));
     echo "<br>";

     // 4
     $var3 = 4;
     var_dump(empty($var3));
     echo "<br>";
     
     // 5
     $var5 = "David Lopez";
     var_dump(empty($var5));
     echo "<br>";

     // 6
     $var6 = true;
     var_dump(empty($var6));
     echo "<br>";