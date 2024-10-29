<?php  
 
    
     // concepto de herencias

     include 'class/class.producto.php';

     $producto = new Class_producto
     (
        1,
        'La historia interminable',
        30.45,
        'Carlos',
        'Gil'
     );

     $libro = new Class_libro
     (
        2,
        'Ubrique Villa',
        23.45,
        'David',
        'Lopez',
        300
     );

     var_dump($producto);
     echo '<br>';
     var_dump($libro);
     echo '<br>';
     echo $libro->getResumen();