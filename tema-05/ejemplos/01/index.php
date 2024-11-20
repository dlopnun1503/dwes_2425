<?php



     /*
      Conexion:
              - servidor: localhost
              - usuario: root
              - password: 
              - base de datos: fp
      */

      #variables de conexion
      $ip = '127:0.0.1:3306';
      $server = 'localhost';
      $user = 'root';
      $pass = '';
      $bd = 'fp';

      # Establecemos conexion
      $conexion = new mysqli($server, $user, $pass, $bd);

      #Verificamos conexion
      if ($conexion->connect_errno){
        echo 'ERROR DE CONEXIÓN Nº: ' . $conexion->connect_errno;
        echo '<br>';
        echo 'DESCRIPCIÓN ERROR: ' . $conexion->connect_error;
        exit();
      }

      echo "conexión establecida con éxito";
      echo "<br>";
      echo "<br>";
      
      $sql = 'select * from alumnos order by id';
      $result = $conexion->query($sql);

      # Manejo de resultado
      // !!!!!!!!!!!!!!!! $result es un objeto de la clase mysqli_result !!!!!!!!!!!!!!!!!!!!!!!!!!!

      #Muestro el resultado 
      while ($alumno = $result->fetch_assoc()){
        echo 'id: ' . $alumno['id'];
        echo '<br>';
        echo 'nombre: ' . $alumno['nombre'];
        echo '<br>';
        echo 'poblacion: ' . $alumno['poblacion'];
        echo '<br>';
      }


      # libero memoria y cierro conexion 
      $result->free();
      $conexion->close();