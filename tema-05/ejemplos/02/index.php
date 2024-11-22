<?php


     /**
      * Ejemplo sentencia preparada para añadir a la tabla alumnos
      * de la base de datos fp 
      */

      // Configuracion de la conexion
      $server = 'localhost';
      $user = 'root';
      $pass = '';
      $dbname = 'fp';

      // 1. conexion a la base de datos 
      $db = new mysqli($server, $user, $pass, $dbname);

      // verificar conexion
      if($db->connect_errno){
        die ("Error de conexión " . $db->connect_error);
      }


      // 2. Prepara la sentencia
      $sql = "
             INSERT INTO
                   alumnos(
                           id,
                           nombre,
                           apellidos,
                           email,
                           telefono,
                           nacionalidad,
                           dni,
                           fechaNac,
                           id_curso
                           )
             VALUES       (
                            null, ?, ?, ?, ?, ?, ?, ?, ?)
      ";

      $stmt = $db->prepare($sql);

      // 3. verifico la sentencia
      if(!$stmt){
        die("Error al prepara sql " . $db->connect_error);
      }

      // Vinculamos los parametros
      $stmt->bind_param('sssisssi', 
                         $nombre, 
                         $apellidos, 
                         $email, 
                         $telefono, 
                         $nacionalidad, 
                         $dni, 
                         $fechaNac, 
                         $id_curso);

     //Asignamos los valores 
     $nombre = 'David';
     $apellidos = 'López Núñez';
     $email = 'david@gmail.com';
     $telefono = 666777888;
     $nacionalidad = 'España';
     $dni = '77496750K';
     $fechaNac = '2004/03/15';
     $id_curso = 2;

     $stmt->execute();

     // 4. Mensaje 
     echo 'registro añadido correctamente';

     // 5. Cerrar sentencia y conexion
     $stmt->close();
     $db->close();