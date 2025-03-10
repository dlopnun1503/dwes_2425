<?php

/*
    autorModel.php

    Modelo del controlador autor

    Métodos:

        - get()
*/

class autorModel extends Model
{

    /*
        método: get()

        Extre los detalles de la tabla autor
    */
    public function get()
    {

        try {

            // sentencia sql
            $sql = "SELECT 
            autores.id,
            autores.nombre,
            autores.nacionalidad,
            autores.email,
            autores.fecha_nac,
            autores.fecha_def,
            autores.premios 
            FROM autores
            GROUP BY autores.id
            ORDER BY autores.id";

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

        descripción: añade nuevo autor
        parámetros: objeto de classAutor
    */

    public function create(classAutor $autor)
    {

        try {
            $sql = "INSERT INTO autores (
                    nombre,
                    nacionalidad,
                    email,
                    fecha_nac,
                    fecha_def,
                    premios

                )
                VALUES (
                    :nombre,
                    :nacionalidad,
                    :email,
                    :fecha_nac,
                    :fecha_def,
                    :premios
                )
            ";
            # Conectar con la base de datos
            $conexion = $this->db->connect();


            $stmt = $conexion->prepare($sql);

            $stmt->bindParam(':nombre', $autor->nombre, PDO::PARAM_STR, 50);
            $stmt->bindParam(':nacionalidad', $autor->nacionalidad, PDO::PARAM_STR);
            $stmt->bindParam(':email', $autor->email, PDO::PARAM_STR);
            $stmt->bindParam(':fecha_nac', $autor->fecha_nac, PDO::PARAM_STR);
            $stmt->bindParam(':fecha_def', $autor->fecha_def, PDO::PARAM_STR);
            $stmt->bindParam(':premios', $autor->premios, PDO::PARAM_STR);


            // añado autores
            $stmt->execute();
        } catch (PDOException $e) {
            // error base de datos
            require_once 'template/partials/errorDB.partial.php';
            $stmt = null;
            $conexion = null;
            $this->db = null;
        }
    }

    /*
        método: read

        descripción: obtiene los detalles de un libro
        parámetros: id del libro
        devuelve: objeto con los detalles del libro
        
    */

    public function read(int $id)
    {

        try {
            $sql = "SELECT 
                    autores.id,
                    autores.nombre,
                    autores.nacionalidad,
                    autores.email,
                    autores.fecha_nac,
                    autores.fecha_def,
                    autores.premios 
                    FROM autores
                    GROUP BY autores.id
                    HAVING autores.id = :id
                    LIMIT 1";

            # Conectar con la base de datos
            $conexion = $this->db->connect();


            $stmt = $conexion->prepare($sql);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute();

            $autor = $stmt->fetch();
            return $autor;
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

        descripción: actualiza los detalles de un autor

        @param:
            
objeto de classAutor
id del autor*/

    public function update(classAutor $autor, $id)
    {

        try {

            $sql = " UPDATE autores SET
                     nombre = :nombre,
                     nacionalidad = :nacionalidad,
                     email = :email,
                     fecha_nac = :fecha_nac,
                     fecha_def = :fecha_def,
                     premios = :premios
                    WHERE
                    id = :id
                    LIMIT 1 ";

            $conexion = $this->db->connect();

            $stmt = $conexion->prepare($sql);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $stmt->bindParam(':nombre', $autor->nombre, PDO::PARAM_STR, 50);
            $stmt->bindParam(':nacionalidad', $autor->nacionalidad, PDO::PARAM_STR);
            $stmt->bindParam(':email', $autor->email, PDO::PARAM_STR);
            $stmt->bindParam(':fecha_nac', $autor->fecha_nac, PDO::PARAM_STR);
            $stmt->bindParam(':fecha_def', $autor->fecha_def, PDO::PARAM_STR);
            $stmt->bindParam(':premios', $autor->premios, PDO::PARAM_STR);

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

        descripción: elimina un libro

        @param: id del libro
    */

    public function delete(int $id)
    {

        try {

            $sql = " DELETE FROM autores
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

    public function validateIdAutor(int $id)
    {

        try {

            $sql = " SELECT 
                    id
                FROM 
                    autores
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
            autores.id,
            autores.nombre,
            autores.nacionalidad,
            autores.email,
            autores.fecha_nac,
            autores.fecha_def,
            autores.premios 
            FROM 
                autores 
            GROUP BY autores.id
            HAVING
            CONCAT_WS(  ', ', 
            autores.id,
            autores.nombre,
            autores.nacionalidad,
            autores.email,
            autores.fecha_nac,
            autores.fecha_def,
            autores.premios) 
                like :expresion
            ORDER BY 
                autores.id ";

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

        descripción: ordena los autores por un campo

        @param: campo por el que ordenar
    */
    public function order(int $criterio)
    {

        try {

            # comando sql
            $sql = " SELECT 
            autores.id,
            autores.nombre,
            autores.nacionalidad,
            autores.email,
            autores.fecha_nac,
            autores.fecha_def,
            autores.premios
            FROM 
                autores 
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

    /*
        método: validateUniqueAuthorById

        descripción: valida el autor por Id.

        @param: id 
    */

    public function validateUniqueAuthorById($id)
    {

        try {
            $sql = " SELECT 
                    id
                FROM 
                    autores
                WHERE
                    id = :id
                LIMIT 1
            ";

            $conexion = $this->db->connect();

            $stmt = $conexion->prepare($sql);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $stmt->setFetchMode(PDO::FETCH_OBJ);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
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
        método: get()

        Extre los detalles de la tabla autores
    */
    public function get_csv()
    {

        try {

            // sentencia sql
            $sql = "SELECT 
            autores.id,
            autores.nombre,
            autores.nacionalidad,
            autores.email,
            autores.fecha_nac,
            autores.fecha_def,
            autores.premios
            FROM autores
            GROUP BY autores.id
            ORDER BY autores.id";

            // conectamos con la base de datos
            $conexion = $this->db->connect();

            // ejecuto prepare
            $stmt = $conexion->prepare($sql);

            // establezco tipo fetch
            $stmt->setFetchMode(PDO::FETCH_NUM);

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
        método: import

        descripción: importa un fichero csv con los datos de los autores

        @param: 

            - $autores array con los datos del fichero csv

    */
    public function import($autores)
    {

        try {

            $sql = "INSERT INTO autores (
                    nombre,
                    nacionalidad,
                    email,
                    fecha_nac,
                    fecha_def,
                    premios

                )
                VALUES (
                    :nombre,
                    :nacionalidad,
                    :email,
                    :fecha_nac,
                    :fecha_def,
                    :premios
                )
            ";
            # Conectar con la base de datos
            $conexion = $this->db->connect();

            $stmt = $conexion->prepare($sql);

            foreach ($autores as $autor) {

                $stmt->bindParam(':nombre', $autor[0], PDO::PARAM_STR, 50);
                $stmt->bindParam(':nacionalidad', $autor[1], PDO::PARAM_STR, 30);
                $stmt->bindParam(':email', $autor[2], PDO::PARAM_STR);
                $stmt->bindParam(':fecha_nac', $autor[3], PDO::PARAM_STR);
                $stmt->bindParam(':fecha_def', $autor[4], PDO::PARAM_STR);
                $stmt->bindParam(':premios', $autor[5], PDO::PARAM_STR);

                // añado libro
                $stmt->execute();
            }

            // devuelvo el número de AUTORES importados
            return count($autores);
        } catch (PDOException $e) {
            // error base de datos
            require_once 'template/partials/errorDB.partial.php';
            $stmt = null;
            $conexion = null;
            $this->db = null;
        }
    }

    public function validateUniqueEmail(){
        try {
            $sql = " SELECT 
                    email
                FROM 
                    autores
                WHERE
                    email = :email
                LIMIT 1
            ";

            $conexion = $this->db->connect();

            $stmt = $conexion->prepare($sql);

            $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);

            $stmt->setFetchMode(PDO::FETCH_OBJ);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
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
}
