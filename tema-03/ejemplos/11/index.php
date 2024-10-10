<?php 


    /**
     * Array de dos dimensiones
     */


     $matriz = [
        [3, 2, 6, 7],
        [4, 3, 7, 8],
        [8, 6, 1, 10]
     ];

    // echo $matriz[1][1];

    // mostrar todo el array 
    foreach($matriz as $valor){
        foreach($valor as $num){
            echo $num;
            echo ", ";
        }
        echo "<br>";
    };