<?php 

    /**
     * model.calcular.php
     */

    $radio = $_POST["radio"];
    $frecuencia = $_POST["frecuencia"];
    $masa = $_POST["masa"];


    $velocidad_tangencial = 2 * 3.1416 * $radio * $frecuencia;
    $V_tangencial = number_format($velocidad_tangencial, 2, ',', '.'); /**
                                                                         * Damos formato al resultado indicando que quiero dos decimales
                                                                         * El separador decimal sea una coma
                                                                         * El separador de millar un punto
                                                                        */
    $aceleracion_centripeta = ($velocidad_tangencial * $velocidad_tangencial) / $radio;
    $A_centripeta = number_format($aceleracion_centripeta, 2, ',', '.');

    $fuerza_centripeta = $masa * $aceleracion_centripeta;
    $F_centripeta = number_format($fuerza_centripeta, 2, ',', '.');

    $Per = 1 / $frecuencia;
    $periodo = number_format($Per, 2, ',', '.');