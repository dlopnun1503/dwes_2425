<?php 

    /**
     * Funcion is_null()
     */

     //variable no definida 
     var_dump(is_null($var));
     echo "<br>";

     //variable definida con valor null 
     $var1 = null;
     var_dump(is_null($var1));
     echo "<br>";

     //variable eliminada
     unset($var1);
     var_dump(is_null($var1));
     echo "<br>";