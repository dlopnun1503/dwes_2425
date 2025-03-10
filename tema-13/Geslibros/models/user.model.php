<?php

/*
    userModel.php

    Modelo del controlador user

    Métodos:

        - get()
*/

class userModel extends Model
{

    /*
        método: get()

        Extre los detalles de la tabla user
    */
    public function get()
    {

        try {

            // sentencia sql
            $sql = "SELECT 
            users.id,
            users.name,
            users.email,
            roles.name as perfil
            FROM users
            INNER JOIN roles_users ON users.id = roles_users.user_id
            INNER JOIN roles ON roles_users.role_id = roles.id
            GROUP BY users.id
            ORDER BY users.id";

            // conectamos con la base de datos
            $conexion = $this->db->connect();

            // ejecuto prepare
            $stmt = $conexion->prepare($sql);

            // establezco tipo fetch
            $stmt->setFetchMode(PDO::FETCH_OBJ);

            // ejecutamos
            $stmt->execute();

            // devuelvo objeto stmtatement
            return $stmt;
        } catch (PDOException $e) {

            // error base de datos
            require 'template/partials/errorDB.partial.php';
            $stmt = null;
            $conexion = null;
            $this->db = null;
        }
    }


    /*
        método: create

        descripción: añade nuevo user
        parámetros: objeto de classUser
    */

    public function create($name, $email, $password)
    {

        try {
            $sql = "INSERT INTO Users (
                    name,
                    email,
                    password
                )
                VALUES (
                    :name,
                    :email,
                    :password
                )
                
            ";
            # Conectar con la base de datos
            $conexion = $this->db->connect();


            $stmt = $conexion->prepare($sql);

            $stmt->bindParam(':name', $name, PDO::PARAM_STR, 50);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR, 50);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR, 255);

            // añado usuarios
            $stmt->execute();

            return $conexion->lastInsertId();
        } catch (PDOException $e) {
            // error base de datos
            require_once 'template/partials/errorDB.partial.php';
            $stmt = null;
            $conexion = null;
            $this->db = null;
        }
    }

    public function assignRole($id, $role)
    {

        try {

            // sentencia sql
            $sql = "INSERT INTO roles_users (user_id, role_id) 
            VALUES (:user_id, :role_id)";

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


    /**
     * update role
     */
    public function updateRole($id, $role)
    {
        try {
            $sql = "UPDATE roles_users SET role_id = :role_id WHERE user_id = :user_id";
            $conexion = $this->db->connect();
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':role_id', $role, PDO::PARAM_INT);
            $stmt->bindParam(':user_id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            require 'template/partials/errorDB.partial.php';
            $stmt = null;
            $conexion = null;
            $this->db = null;
        }
    }

    public function get_roles()
    {
        try {
            $sql = "SELECT id, name FROM roles ORDER BY id";
            $conexion = $this->db->connect();
            $stmt = $conexion->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            require 'template/partials/errorDB.partial.php';
            $stmt = null;
            $conexion = null;
            $this->db = null;
        }
    }

    /*
        método: read

        descripción: obtiene los detalles de un usuario
        parámetros: id del usuario
        devuelve: objeto con los detalles del usuario
        
    */

    public function read(int $id)
    {

        try {
            $sql = "SELECT 
                    users.id,
                    users.name,
                    users.email,
                    roles.name as perfil
                    FROM users
                    INNER JOIN roles_users ON users.id = roles_users.user_id
                    INNER JOIN roles ON roles_users.role_id = roles.id
                    GROUP BY users.id
                    HAVING users.id = :id
                    LIMIT 1";

            # Conectar con la base de datos
            $conexion = $this->db->connect();


            $stmt = $conexion->prepare($sql);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute();

            $user = $stmt->fetch();
            return $user;
        } catch (PDOException $e) {
            // // error base de datos
            require_once 'template/partials/errorDB.partial.php';
            $stmt = null;
            $conexion = null;
            $this->db = null;
            exit();
        }
    }

    /*
        método: update

        descripción: actualiza los detalles de un usuario

        @param:
            
objeto de classUser
id del user*/

    public function update(classUser $user, $id)
    {

        try {

            $sql = " UPDATE users SET
                     name = :name,
                     email = :email
                    WHERE
                    id = :id
                    LIMIT 1 ";

            $conexion = $this->db->connect();

            $stmt = $conexion->prepare($sql);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $stmt->bindParam(':name', $user->name, PDO::PARAM_STR, 50);
            $stmt->bindParam(':email', $user->email, PDO::PARAM_STR);

            $stmt->execute();
        } catch (PDOException $e) {
            // error base de datos
            require_once 'template/partials/errorDB.partial.php';
            $stmt = null;
            $conexion = null;
            $this->db = null;
            exit();
        }
    }

    /*
        método: delete

        descripción: elimina un user

        @param: id del user
    */

    public function delete(int $id)
    {

        try {

            $sql = " DELETE FROM users
                WHERE id = :id
                LIMIT 1 ";

            $conexion = $this->db->connect();

            $stmt = $conexion->prepare($sql);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $stmt->execute();
        } catch (PDOException $e) {
            // error base de datos
            require_once 'template/partials/errorDB.partial.php';
            $stmt = null;
            $conexion = null;
            $this->db = null;
            exit();
        }
    }

    /*
        método: validateUniqueEmail()

        descripción: comprueba si un email ya existe en la base de datos, 
        devuelve verdadero si es un valor único
        
        @param: email del usuario

    */
    public function validateUniqueEmail($email)
    {

        try {

            // sentencia sql
            $sql = "SELECT * FROM Users WHERE email = :email";

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
        método: validateUniqueName()

        Valida el name de usuario, devuelve verdadero si el  nombre no existe en la base de datos


        @param: name del usuario
    */
    public function validateUniqueName($name)
    {

        try {

            // sentencia sql
            $sql = "SELECT * FROM Users WHERE name = :name";


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

    public function validateIdUser(int $id)
    {

        try {

            $sql = " SELECT 
                    id
                FROM 
                    users
                WHERE
                    id = :id
            ";

            $conexion = $this->db->connect();
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute();

            if ($stmt->rowCount() == 1) {
                return TRUE;
            }

            return FALSE;
        } catch (PDOException $e) {
            // error base de datos
            require_once 'template/partials/errorDB.partial.php';
            $stmt = null;
            $conexion = null;
            $this->db = null;
            exit();
        }
    }

    /*
        método: filter

        descripción: filtra los libros por una expresión

        @param: expresión a buscar
    */
    public function filter($expresion)
    {
        try {
            $sql = " SELECT 
            users.id,
            users.name,
            users.email,
            roles.name as perfil
            FROM users
            INNER JOIN roles_users ON users.id = roles_users.user_id
            INNER JOIN roles ON roles_users.role_id = roles.id
            GROUP BY users.id
            HAVING
            CONCAT_WS(  ', ', 
            users.id,
            users.name,
            users.email,
            roles.name) 
                like :expresion
            ORDER BY 
                users.id ";

            # Conectar con la base de datos
            $conexion = $this->db->connect();

            $stmt = $conexion->prepare($sql);

            $stmt->bindValue(':expresion', '%' . $expresion . '%', PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {

            // error base de datos
            require_once 'template/partials/errorDB.partial.php';
            $stmt = null;
            $conexion = null;
            $this->db = null;
            exit();
        }
    }

    /*
        método: order

        descripción: ordena los usuarios por un campo

        @param: campo por el que ordenar
    */
    public function order(int $criterio)
    {

        try {

            # comando sql
            $sql = " SELECT 
            users.id,
            users.name,
            users.email,
            roles.name as perfil
            FROM users
            INNER JOIN roles_users ON users.id = roles_users.user_id
            INNER JOIN roles ON roles_users.role_id = roles.id
            ORDER BY 
                :criterio
            ";

            # conectamos con la base de datos

            // $this->db es un objeto de la clase database
            // ejecuto el método connect de esa clase

            $conexion = $this->db->connect();

            # ejecutamos mediante prepare
            $stmt = $conexion->prepare($sql);

            $stmt->bindParam(':criterio', $criterio, PDO::PARAM_INT);

            # establecemos  tipo fetch
            $stmt->setFetchMode(PDO::FETCH_OBJ);

            #  ejecutamos 
            $stmt->execute();

            # devuelvo objeto stmtatement
            return $stmt;
        } catch (PDOException $e) {

            // error base de datos
            require_once 'template/partials/errorDB.partial.php';
            $stmt = null;
            $conexion = null;
            $this->db = null;
            exit();
        }
    }
}
