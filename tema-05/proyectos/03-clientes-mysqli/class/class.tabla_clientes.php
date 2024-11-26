<?php

/*
    clase: class.tabla_clientes.php
    descripcion: define la clase que va a contener el array de objetos de la clase clientes.
*/

class Class_tabla_clientes extends Class_conexion
{

    /*
        método: getclientes()
        descripcion: devuelve un array de objetos
    */

    public function getClientes()
    {
        $sql = "
             SELECT
                  clientes.id,
                  clientes.apellidos,
                  clientes.nombre,
                  clientes.telefono,
                  clientes.ciudad,
                  clientes.dni,
                  clientes.email
             FROM
                  clientes
        ";

        // Ejecuto comando sql
        $result = $this->db->query($sql);

        // Obtengo un objeto de la clase mysqli_result
        // devuelvo dicho objeto
        return $result;
    }


    /*
        método: create()
        descripcion: permite añadir un objeto de la clase cliente a la tabla
        parámetros:

            - $cliente - objeto de la clase clientes

    */
    public function create(Class_cliente $cliente)
    {
        $sql = "
             INSERT INTO
                   clientes(
                           apellidos,
                           nombre,
                           telefono,
                           ciudad,
                           dni,
                           email
                           )
             VALUES       (
                            ?, ?, ?, ?, ?, ?)
      ";

      // Ejecuto la sentencia preparada
      $stmt = $this->db->prepare($sql);

      // verifico la sentencia
      if(!$stmt){
        die("Error al prepara sql " . $this->db->connect_error);
      }

      //Vinculacion de parametros
      $stmt->bind_param('ssisss', 
                         $apellidos, 
                         $nombre, 
                         $telefono, 
                         $ciudad, 
                         $dni, 
                         $email);

      // Asignar valores
      $apellidos = $cliente->apellidos;
      $nombre = $cliente->nombre;
      $telefono = $cliente->telefono;
      $ciudad = $cliente->ciudad;
      $dni = $cliente->dni;
      $email = $cliente->email;

      // Ejecutamos
      $stmt->execute();


    }


}
