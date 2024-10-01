<?php 
    
    /**
     * tipos de variables
     * 
     * 
     */


     //Tipo boolean
     $test = true;
     echo "\$test: ";
     var_dump(value:$test);
     echo "<BR>";


     //tipo  int 
     $edad = 20;
     echo "\$edad: ";
     var_dump(value:$edad);
     echo "<BR>";


     //tipo  float 
     $altura = 1.70;
     echo "\$altura: ";
     var_dump(value:$altura);
     echo "<BR>";


     //tipo  float exponencial
     $distancia = 1.70e4;
     echo "\$distancia: ";
     var_dump(value:$distancia);
     echo "<BR>";


     //tipo  string
     $mensaje = "La distancia fue de $distancia km";
     echo "\$mensaje: ";
     var_dump(value:$mensaje);
     echo "<BR>";

     //tipo  string '' con concatenacion
     $mensaje1 = 'La distancia fue de ' . $distancia . ' km';
     echo "\$mensaje1: ";
     var_dump(value:$mensaje1);
     echo "<BR>";