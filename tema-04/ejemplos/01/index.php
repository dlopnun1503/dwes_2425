<?php 


     /*
        Ejemplo
        crear objetos a partir de la clase Class_vehiculo
     */

     include 'class/class.vehiculo.php';

     # Creo un objeto de la clase vehiculo
     $vehiculo = new Class_vehiculo();

     # Establecer la matricula del vehiculo
     $vehiculo->setMatricula("6712HRM");

     # Establecer velocidad a 10 km
     $vehiculo->setVelocidad(10);

     # Incrementar velocidad
     $vehiculo->aumentarVelocidad();

     # Mostrar detalles del vehiculo 
     echo "Matricula: " . $vehiculo->getMatricula();
     echo "<br>";
     echo "Velocidad: " . $vehiculo->getVelocidad();