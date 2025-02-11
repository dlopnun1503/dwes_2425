<?php

/*
    albumModel.php

    Modelo del controlador album

    Métodos:

        - get()
*/

class albumModel extends Model
{

    /*
        método: get()

        Extrae los detalles de la tabla albumes
    */
    public function get()
    {

        try {

            // sentencia sql
            $sql ="SELECT 
            albumes.id,
            albumes.titulo,
            albumes.descripcion,
            albumes.autor,
            albumes.fecha,
            albumes.lugar,
            albumes.categoria,
            albumes.etiquetas,
            albumes.num_fotos,
            albumes.num_visitas,
            albumes.carpeta
            FROM albumes
            ORDER BY albumes.id";

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

       descripción: añade nuevo album
       parámetros: objeto de classAlbum
    */

    public function create(classAlbum $album)
    {

        try {
            $sql = "INSERT INTO albumes (
                    titulo,
                    descripcion,
                    autor,
                    fecha,
                    lugar,
                    categoria,
                    etiquetas,
                    num_fotos,
                    num_visitas,
                    carpeta
                )
                VALUES (
                    :titulo,
                    :descripcion,
                    :autor,
                    :fecha,
                    :lugar,
                    :categoria,
                    :etiquetas,
                    :num_fotos,
                    :num_visitas,
                    :carpeta
                )
            ";
            # Conectar con la base de datos
            $conexion = $this->db->connect();

            $stmt = $conexion->prepare($sql);

            $stmt->bindParam(':titulo', $album->titulo, PDO::PARAM_STR, 100);
            $stmt->bindParam(':descripcion', $album->descripcion, PDO::PARAM_STR);
            $stmt->bindParam(':autor', $album->autor, PDO::PARAM_STR, 50);
            $stmt->bindParam(':fecha', $album->fecha, PDO::PARAM_STR);
            $stmt->bindParam(':lugar', $album->lugar, PDO::PARAM_STR, 50);
            $stmt->bindParam(':categoria', $album->categoria, PDO::PARAM_STR, 50);
            $stmt->bindParam(':etiquetas', $album->etiquetas, PDO::PARAM_STR, 250);
            $stmt->bindParam(':num_fotos', $album->num_fotos, PDO::PARAM_INT);
            $stmt->bindParam(':num_visitas', $album->num_visitas, PDO::PARAM_INT);
            $stmt->bindParam(':carpeta', $album->carpeta, PDO::PARAM_STR, 50);

            // añado albumes
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

        descripción: obtiene los detalles de un album
        parámetros: id del album
        devuelve: objeto con los detalles del album
        
    */

    public function read(int $id)
    {

        try {
            $sql = "SELECT 
                    albumes.id,
                    albumes.titulo,
                    albumes.descripcion,
                    albumes.autor,
                    albumes.fecha,
                    albumes.lugar,
                    albumes.categoria,
                    albumes.etiquetas,
                    albumes.num_fotos,
                    albumes.num_visitas,
                    albumes.carpeta,
                    albumes.created_at,
                    albumes.update_at
                    FROM albumes
                    WHERE albumes.id = :id
                    LIMIT 1";

            # Conectar con la base de datos
            $conexion = $this->db->connect();

            $stmt = $conexion->prepare($sql);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute();

            $album = $stmt->fetch();
            return $album;
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

        descripción: actualiza los detalles de un album

        @param:
            
        objeto de classAlbum
        id del album
    */

    public function update(classAlbum $album, $id)
    {

        try {

            $sql = "
            UPDATE albumes
            SET
                titulo = :titulo,
                descripcion = :descripcion,
                autor = :autor,
                fecha = :fecha,
                lugar = :lugar,
                categoria = :categoria,
                etiquetas = :etiquetas,
                num_fotos = :num_fotos,
                num_visitas = :num_visitas,
                carpeta = :carpeta
            WHERE
                id = :id
            LIMIT 1
            ";

            $conexion = $this->db->connect();

            $stmt = $conexion->prepare($sql);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':titulo', $album->titulo, PDO::PARAM_STR, 100);
            $stmt->bindParam(':descripcion', $album->descripcion, PDO::PARAM_STR);
            $stmt->bindParam(':autor', $album->autor, PDO::PARAM_STR, 50);
            $stmt->bindParam(':fecha', $album->fecha, PDO::PARAM_STR);
            $stmt->bindParam(':lugar', $album->lugar, PDO::PARAM_STR, 50);
            $stmt->bindParam(':categoria', $album->categoria, PDO::PARAM_STR, 50);
            $stmt->bindParam(':etiquetas', $album->etiquetas, PDO::PARAM_STR, 250);
            $stmt->bindParam(':num_fotos', $album->num_fotos, PDO::PARAM_INT);
            $stmt->bindParam(':num_visitas', $album->num_visitas, PDO::PARAM_INT);
            $stmt->bindParam(':carpeta', $album->carpeta, PDO::PARAM_STR, 50);

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

        descripción: elimina un album

        @param: id del album
    */

    public function delete(int $id)
    {

        try {

            $sql = "
                DELETE FROM albumes
                WHERE id = :id
                LIMIT 1
            ";

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
        método: filter

        descripción: filtra los albumes por una expresión

        @param: expresión a buscar
    */
    public function filter($expresion)
    {
        try {
            $sql = "
            SELECT 
                albumes.id,
                albumes.titulo,
                albumes.descripcion,
                albumes.autor,
                albumes.fecha,
                albumes.lugar,
                albumes.categoria,
                albumes.etiquetas,
                albumes.num_fotos,
                albumes.num_visitas,
                albumes.carpeta,
                albumes.created_at,
                albumes.update_at
            FROM 
                albumes
            WHERE
                CONCAT_WS(', ', 
                albumes.id,
                albumes.titulo,
                albumes.descripcion,
                albumes.autor,
                albumes.fecha,
                albumes.lugar,
                albumes.categoria,
                albumes.etiquetas,
                albumes.num_fotos,
                albumes.num_visitas,
                albumes.carpeta,
                albumes.created_at,
                albumes.update_at) 
                LIKE :expresion
            ORDER BY 
                albumes.id
            ";

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

        descripción: ordena los albumes por un campo

        @param: campo por el que ordenar
    */
    public function order(int $criterio)
    {

        try {

            # comando sql
            $sql = "
            SELECT 
                albumes.id,
                albumes.titulo,
                albumes.descripcion,
                albumes.autor,
                albumes.fecha,
                albumes.lugar,
                albumes.categoria,
                albumes.etiquetas,
                albumes.num_fotos,
                albumes.num_visitas,
                albumes.carpeta
            FROM 
                albumes
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

    /**
     * validateIdAlbum
     * 
     * descripcion: valida el id de un album que exista en la base de datos
     * 
     * @param int $id
     */

    public function validateIdAlbum(int $id){
        
        try {
            $sql = "SELECT id FROM albumes WHERE id = :id";

            $conexion = $this->db->connect();

            $stmt = $conexion->prepare($sql);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            if($stmt->rowCount() == 1){
                return true;
            }
            return false;

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
