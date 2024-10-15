<?php 
  
     
     function sumar(int $valor1,  $valor2){
        $resultado = $valor1 + $valor2;
        return $resultado;
     }

     function producto($valor1,  &$valor2){
        $resultado = $valor1 * $valor2;
        $valor2 = 7;
        return $resultado;
     }

     $v1 = 5;
     $v2 = 4;

     $calculo = producto($v1, $v2);

     echo $calculo;
     echo "<br>";
     echo $v2;