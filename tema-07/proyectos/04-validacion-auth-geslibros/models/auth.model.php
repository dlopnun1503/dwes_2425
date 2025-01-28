<?php

/*
    auth.model.php

    Modelo del controlador auth

    Métodos:

        - validateName
*/

class authModel extends Model
{

    /*
        método: validateName()

        Valida el name de usuario, devuelvo TRUE si el nombre no existe
    */
    public function validateUniqueName($name)
    {

        try {

            // sentencia sql
            $sql = "SELECT * FROM users WHERE name = :name";



            // conectamos con la base de datos
            $conexion = $this->db->connect();

            // ejecuto prepare
            $stmt = $conexion->prepare($sql);

            // vinculamos parámetros
            $stmt->bindParam(':name', $name, PDO::PARAM_STR, 50);

            // ejecutamos
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return FALSE;
            }

            return TRUE;

        } catch (PDOException $e) {

            // error base de datos
            require 'template/partials/errorDB.partial.php';
            $stmt = null;
            $conexion = null;
            $this->db = null;
        }
    }


    /*
        método: validateEmail()

        Valida el email de usuario, devuelvo TRUE si el email no existe
    */
    public function validateUniqueEmail($email)
    {

        try {

            // sentencia sql
            $sql = "SELECT * FROM users WHERE email = :email";

            // conectamos con la base de datos
            $conexion = $this->db->connect();

            // ejecuto prepare
            $stmt = $conexion->prepare($sql);

            // vinculamos parámetros
            $stmt->bindParam(':email', $email, PDO::PARAM_STR, 50);

            // ejecutamos
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return FALSE;
            }

            return TRUE;

        } catch (PDOException $e) {

            // error base de datos
            require 'template/partials/errorDB.partial.php';
            $stmt = null;
            $conexion = null;
            $this->db = null;
        }
    }

    /*
        método: create()

        Crea un nuevo usuario en la base de datos

        @param: name, email, password
    */

    public function create($name, $email, $password)
    {

        try {

            // encriptamos la contraseña
            $password = password_hash($password, PASSWORD_DEFAULT);

            // sentencia sql
            $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";

            // conectamos con la base de datos
            $conexion = $this->db->connect();

            // ejecuto prepare
            $stmt = $conexion->prepare($sql);

            // vinculamos parámetros
            $stmt->bindParam(':name', $name, PDO::PARAM_STR, 50);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR, 50);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR, 255);

            // ejecutamos
            $stmt->execute();

            // devuelvo id asignado al nuevo usuario
            return $conexion->lastInsertId();

        } catch (PDOException $e) {

            // error base de datos
            require 'template/partials/errorDB.partial.php';
            $stmt = null;
            $conexion = null;
            $this->db = null;
        }
    }

    /*
        método: assignRole(int $id, int $role)

        descripcion: asigna un rol a un usuario

        @param: id, role
    */

    public function assignRole($id, $role)
    {

        try {

            // sentencia sql
            $sql = "INSERT INTO roles_users (user_id, role_id) VALUES (:user_id, :role_id)";

            // conectamos con la base de datos
            $conexion = $this->db->connect();

            // ejecuto prepare
            $stmt = $conexion->prepare($sql);

            // vinculamos parámetros
            $stmt->bindParam(':user_id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':role_id', $role, PDO::PARAM_INT);

            // ejecutamos
            $stmt->execute();

        } catch (PDOException $e) {

            // error base de datos
            require 'template/partials/errorDB.partial.php';
            $stmt = null;
            $conexion = null;
            $this->db = null;
        }
    }

    /*
        metodo: getUserEmail($email)

        descripcion: obtiene un usuario por email

        @param: email
    */

    public function getUserEmail($email)
    {

        try {

            // sentencia sql
            $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";

            // conectamos con la base de datos
            $conexion = $this->db->connect();

            // ejecuto prepare
            $stmt = $conexion->prepare($sql);

            // Tipo de fecth
            $stmt->setFetchMode(PDO::FETCH_OBJ);

            // vinculamos parámetros
            $stmt->bindParam(':email', $email, PDO::PARAM_STR, 50);

            // ejecutamos
            $stmt->execute();

            // devuelvo objeto usuario
            return $stmt->fetch();

        } catch (PDOException $e) {

            // error base de datos
            require 'template/partials/errorDB.partial.php';
            $stmt = null;
            $conexion = null;
            $this->db = null;
        }
    }

    /*
        metodo: getIdPerfilUser($id)

        descripcion: obtiene el perfil de un usuario

        @param: id
    */

    public function getIdPerfilUser($id)
    {

        try {

            // sentencia sql
            $sql = "SELECT role_id FROM roles_users WHERE user_id = :user_id LIMIT 1";

            // conectamos con la base de datos
            $conexion = $this->db->connect();

            // ejecuto prepare
            $stmt = $conexion->prepare($sql);

            // vinculamos parámetros
            $stmt->bindParam(':user_id', $id, PDO::PARAM_INT);

            // ejecutamos
            $stmt->execute();

            // devuelvo objeto usuario
            return $stmt->fetch();

        } catch (PDOException $e) {

            // error base de datos
            require 'template/partials/errorDB.partial.php';
            $stmt = null;
            $conexion = null;
            $this->db = null;
        }
    }

    /*
        metodo: getNamePerfil($id)

        descripcion: obtiene el nombre del perfil de un usuario

        @param: id
     */

    public function getNamePerfil($id){
        
        try {

            // sentencia sql
            $sql = "SELECT name FROM roles WHERE id = :id LIMIT 1";

            // conectamos con la base de datos
            $conexion = $this->db->connect();

            // ejecuto prepare
            $stmt = $conexion->prepare($sql);

            // vinculamos parámetros
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // ejecutamos
            $stmt->execute();

            // devuelvo objeto usuario
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