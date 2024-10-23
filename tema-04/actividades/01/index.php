<?php


include 'class/class.calculadora.php'; 


$operacion = new Class_calculadora(10, 5);


$operacion->suma();

// Mostrar detalles de la operación
echo "Valor 1 = " . $operacion->getValor1();
echo "<br>";

echo "Valor 2 = " . $operacion->getValor2();
echo "<br>";

echo "Operador =  " . $operacion->getOperador();
echo "<br>";

echo "Resultado = " . $operacion->getResultado();
echo "<br>";

var_dump($operacion);