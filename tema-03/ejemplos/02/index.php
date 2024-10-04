<?php

    /**
     * Operadores de comparacion
     */

     $a = "1";
     $b = "1";

     $c = 4;
     $d = 5;

     if (($a === $b) xor ($c <= $d)){
        echo "verdadero";
     }else {
        echo "falso";
     }