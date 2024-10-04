<?php 


    /**
     * ejemplo3
     * calificacion de una nota de 0 a 10
     * mostrara: deficiente, insuficiente, suficiente, bien, notable o sobresaliente
     */


     $a = -4;


     if($a >= 0 && $a < 2){
        echo "deficiente";
     }else if($a >=2 && $a < 5){
        echo "insuficiente";
     }else if($a >=5 && $a < 6){
        echo "suficiente";
     }else if($a >=6 && $a < 7){
        echo "bien";
     }else if($a >=7 && $a < 9){
        echo "notable";
     }else if($a >=9 && $a <= 10){
        echo "sobresaliente";
     }else if($a > 10 || $a < 0){
        echo "calificacion no valida";
     }