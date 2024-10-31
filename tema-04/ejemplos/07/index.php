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
      1,
        'La historia interminable',
        30.45,
        'Carlos',
        'Gil', 
        500
     );

     $libro->MuestraLibro();
     echo '<br>';

    // $producto->titulo = "La tormenta perfecta"; SOLO FUNCIONA SI EL ATRIBUTO ES PUBLICO

     
    