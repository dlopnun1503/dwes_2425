<?php


include 'class/class.noticia.php';

$noticia = new Class_noticia();
$p1 = 'Cientos de afectados en Valencia por el temporal';
$p2 = 'Llame al 112 para cualquier urgencia';
$noticia->id = 1;
$noticia->titulo = 'DANA';
$noticia->extracto = 'Tragedia temporal en Valencia';
$noticia->cuerpo = [];
$noticia->autor = 'David López';
$noticia->fechaEdicion = '30/10/2024';
$noticia->fotografia = 'C:\Users\David\OneDrive\Escritorio\dana';
$noticia->epigrafe = 'Foto del día 29/10/2024 en Valencia';

echo 'Parrafo: ' . $noticia->inParrafo($p1, $p2);
echo $noticia->showTexto();