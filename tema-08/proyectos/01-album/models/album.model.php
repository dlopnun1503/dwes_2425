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
            categorias.nombre AS categoria,
            albumes.etiquetas,
            albumes.num_fotos,
            albumes.num_visitas,
            albumes.carpeta
            FROM albumes 
            INNER JOIN categorias ON albumes.categoria_id = categorias.id
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

    public function getCategorias(){
        try {
            $sql = "SELECT id, nombre FROM categorias";
            $conexion = $this->db->connect();
            $stmt = $conexion->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_KEY_PAIR);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    # Método getAlbum
    # Obtiene los detalles de un álbum a partir del id
    public function getAlbum($id)
    {
        try {
            $sql = " 
                SELECT     
                    id,
                    titulo,
                    descripcion,
                    autor,
                    fecha,
                    lugar,
                    categoria_id,
                    etiquetas,
                    num_fotos,
                    num_visitas,
                    carpeta
                FROM  
                    albumes  
                WHERE
                    id = :id";

            $conexion = $this->db->connect();
            $pdoSt = $conexion->prepare($sql);
            $pdoSt->bindParam(":id", $id, PDO::PARAM_INT);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();
            return $pdoSt->fetch();
        } catch (PDOException $e) {
            require_once("template/partials/errorDB.php");
            exit();
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
                    categoria_id,
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
                    :categoria_id,
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
            $stmt->bindParam(':categoria_id', $album->categoria_id, PDO::PARAM_STR, 50);
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
                    albumes.categoria_id,
                    categorias.nombre AS categoria,
                    albumes.etiquetas,
                    albumes.num_fotos,
                    albumes.num_visitas,
                    albumes.carpeta,
                    albumes.created_at,
                    albumes.update_at
                    FROM albumes
                    INNER JOIN categorias ON albumes.categoria_id = categorias.id
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
                categoria_id = :categoria_id,
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
            $stmt->bindParam(':categoria_id', $album->categoria_id, PDO::PARAM_STR, 50);
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
                categorias.nombre AS categoria,
                albumes.etiquetas,
                albumes.num_fotos,
                albumes.num_visitas,
                albumes.carpeta,
                albumes.created_at,
                albumes.update_at
            FROM 
                albumes
            INNER JOIN 
                categorias ON albumes.categoria_id = categorias.id
            WHERE
                CONCAT_WS(', ', 
                albumes.id,
                albumes.titulo,
                albumes.descripcion,
                albumes.autor,
                albumes.fecha,
                albumes.lugar,
                categorias.nombre ,
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
                categorias.nombre AS categoria,
                albumes.etiquetas,
                albumes.num_fotos,
                albumes.num_visitas,
                albumes.carpeta
            FROM 
                albumes
            INNER JOIN 
                categorias ON albumes.categoria_id = categorias.id
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

    public function obtenerCarpetaPorId($albumId)
    {
        try {
            $sql = "
                        SELECT 
                                carpeta
                        FROM 
                                albumes
                        WHERE
                                id = :id
                ";

            # Conectar con la base de datos
            $conexion = $this->db->connect();


            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindParam(':id', $albumId, PDO::PARAM_INT);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();

            return $pdoSt->fetch();
        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }


    public function incrementarVisitas($id)
    {
        try {
            $sql = "UPDATE albumes SET num_visitas = num_visitas + 1 WHERE id = :id";
            $conexion = $this->db->connect();
            $pdost = $conexion->prepare($sql);
            $pdost->bindParam(':id', $id, PDO::PARAM_INT);
            $pdost->execute();
        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }

    public function contadorFotos($id, $num_fotos)
    {
        try {
            $sql = "UPDATE albumes SET num_fotos = :num_fotos WHERE id = :id";
            $conexion = $this->db->connect();
            $pdost = $conexion->prepare($sql);
            $pdost->bindParam(':num_fotos', $num_fotos, PDO::PARAM_INT);
            $pdost->bindParam(':id', $id, PDO::PARAM_INT);
            $pdost->execute();
        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }

    public function subirArchivo($ficheros, $carpeta){
    $num = count($ficheros['tmp_name']);
    
    // Error de archivos
    $FileUploadErrors = array(
        0 => 'No hay error, fichero subido con éxito.',
        1 => 'El fichero subido excede la directiva upload_max_filesize de php.ini.',
        2 => 'El fichero subido excede la directiva MAX_FILE_SIZE especificada en el formulario HTML.',
        3 => 'El fichero fue sólo parcialmente subido.',
        4 => 'No se subió ningún fichero.',
        6 => 'Falta la carpeta temporal.',
        7 => 'No se pudo escribir el fichero en el disco.',
        8 => 'Una extensión de PHP detuvo la subida de ficheros.',
    );

    $error = null;

    for ($i = 0; $i <= $num - 1 && is_null($error); $i++) {
        if ($ficheros['error'][$i] != UPLOAD_ERR_OK) {
            $error = $FileUploadErrors[$ficheros['error'][$i]];
        } else {
            $tamMaximo = 4194304;
            if ($ficheros['size'][$i] > $tamMaximo) {
                $error = "Archivo excede tamaño máximo de 4MB";
            }
            $info = new SplFileInfo($ficheros['name'][$i]);
            $tipos_permitidos = ['JPG', 'JPEG', 'GIF', 'PNG'];
            if (!in_array(strtoupper($info->getExtension()), $tipos_permitidos)) {
                $error = "Archivo no permitido. Seleccione una imagen.";
            }
        }
    }

    // Si no hay errores, sube los archivos
    if (is_null($error)) {
        for ($i = 0; $i <= $num - 1; $i++) {
            if (is_uploaded_file($ficheros['tmp_name'][$i])) {
                move_uploaded_file($ficheros['tmp_name'][$i], "images/" . $carpeta . "/" . $ficheros['name'][$i]);
            }
        }
        $_SESSION['mensaje'] = "Los archivos se han subido correctamente.";
    } else {
        $_SESSION['error'] = $error;
    }
}

}
