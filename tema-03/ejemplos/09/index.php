<?php 

    /**
     * Ejemplo 
     * 
     * array de tipo indexado o escalar
     * 
     * solo un indice numerico 
     */

    $numeros = [3, 4, 7, 9];

    // Mostrar array 
    // print_r($numeros);
    foreach($numeros as $i => $valor){
        echo "[$i] = $valor";
        echo "<br>";
    }