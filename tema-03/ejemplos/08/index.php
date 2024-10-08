<?php

$nota = 9;
switch ($nota) {
    case ($nota >= 0 && $nota < 5):
        echo "Insufuciente";
        break;
    case ($nota >= 5 && $nota < 6):
        echo "Suficiente";
        break;
    case ($nota >= 6 && $nota < 7):
        echo "Bien";
        break;
    case ($nota >= 7 && $nota < 9):
        echo "Notable";
        break;
    case ($nota >= 9 && $nota <= 10):
        echo "Sobresaliente";
        break;
}
