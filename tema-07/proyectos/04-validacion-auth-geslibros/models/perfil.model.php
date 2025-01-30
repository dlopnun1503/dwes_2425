<?php

/*
    perfil.model.php

    Modelo del controlador perfil

    Métodos:

        - validateName
*/

class perfilModel extends Model
{

    /*
        método: getUserId()

        obtiene un usuario por id

        @param: id del usuario
    */
    public function getUserId(int $id)
    {

        try {

            // sentencia sql
            $sql = "SELECT name, email FROM Users WHERE id = :id"; 


            // conectamos con la base de datos
            $conexion = $this->db->connect();

            // ejecuto prepare
            $stmt = $conexion->prepare($sql);

            $stmt->setFetchMode(PDO::FETCH_OBJ);

            // vinculamos parámetros
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // ejecutamos
            $stmt->execute();

            return $stmt->fetch();

        } catch (PDOException $e) {

            // error base de datos
            require 'template/partials/errorDB.partial.php';
            $stmt = null;
            $conexion = null;
            $this->db = null;
        }
    }
}