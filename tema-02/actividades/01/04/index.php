<?php 


     /**
      * Crear en un script Php que cree dos variables una de tipo float y otra de tipo int. Almacenar en nuevas variables el resultado de la suma, resta, división, producto y potencia.
      * Mostrar mediante var_dump() las variables con los resultados de las operaciones anteriores.
      */

      $var1 = 5;
      $var2 = 2.5;

      $suma = $var1 + $var2;
      var_dump(value: $suma);
      echo "<br>";

      $resta = $var1 - $var2;
      var_dump(value: $resta);
      echo "<br>";

      $div = $var1 / $var2;
      var_dump(value: $div);
      echo "<br>";

      $prod = $var1 * $var2;
      var_dump(value: $prod);
      echo "<br>";

      $pot = $var1 ** $var2;
      var_dump(value: $pot);
      echo "<br>";