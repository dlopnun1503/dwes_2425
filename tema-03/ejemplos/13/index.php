<?php 


$array_equipo = ['portero', 
                 'laterales', 
                 'centrales', 
                 'mediocentros', 
                 'interiores', 
                 'delanteros'
                ];
 
$cadena_equipo = implode(", ", $array_equipo);

echo $cadena_equipo;
