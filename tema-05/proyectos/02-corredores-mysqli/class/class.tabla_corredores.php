<?php

/*
    clase: class.tabla_corredores.php
    descripcion: define la clase que va a contener el array de objetos de la clase corredores.
*/

class Class_tabla_corredores extends Class_conexion
{


    /*
        método: getcorredores()
        descripcion: devuelve un objeto de la clase mysqli_result con los 
        detalles de los corredores
    */

    public function getCorredores()
    {
        try {

            // sentencia sql
            $sql = "
            select 
                corredores.id,
                corredores.nombre, 
                corredores.apellidos,
                corredores.ciudad,
                corredores.email,
                corredores.edad,
                categorias.nombre as categoria,
                clubs.nombre as club
            FROM 
                corredores 
            INNER JOIN
                categorias
            ON corredores.id_categoria = categorias.id
            INNER JOIN
                clubs
            ON corredores.id_club = clubs.id
            ORDER BY corredores.id
        ";

            // ejecuto comando sql
            $result = $this->db->query($sql);

            // obtengo un objeto de la clase mysqli_result
            return $result;
        } catch (mysqli_sql_exception $e) {

            // error de  base dedatos
            include 'views/partials/errorDB.php';

            // libero result
            $result->close();

            // cierro conexión
            $this->db->close();

            // cancelo ejecución programa
            exit();
        }
    }


    /*
        método: create()
        descripcion: permite añadir un objeto de la clase corredor a la tabla
        
        parámetros:

            - $corredor - objeto de la clase corredor

    */
    public function create(Class_corredor $corredor)
    {
        try {

            // Crear la sentencia preparada
            $sql = "
        INSERT INTO 
            corredores( 
                    nombre,
                    apellidos,
                    ciudad,
                    fechaNacimiento,
                    sexo,
                    email,
                    dni,
                    edad,
                    id_categoria, 
                    id_club
                   )
        VALUES    (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)                            
        ";

            // ejecuto la sentenecia preprada
            $stmt = $this->db->prepare($sql);

            // vinculación de parámetros
            $stmt->bind_param(
                'sssssssiii',
                $nombre,
                $apellidos,
                $ciudad,
                $fechaNacimiento,
                $sexo,
                $email,
                $dni,
                $edad,
                $id_categoria,
                $id_club
            );

            // asignar valores
            $nombre = $corredor->nombre;
            $apellidos = $corredor->apellidos;
            $ciudad = $corredor->ciudad;
            $fechaNacimiento = $corredor->fechaNacimiento;
            $sexo = $corredor->sexo;
            $email = $corredor->email;
            $dni = $corredor->dni;
            $edad = $corredor->edad;
            $id_categoria = $corredor->id_categoria;
            $id_club = $corredor->id_club;

            // ejecutamos
            $stmt->execute();
        } catch (mysqli_sql_exception $e) {

            // error de  base dedatos
            include 'views/partials/errorDB.php';

            // libero sentencia preprada
            $stmt->close();

            // cierro conexión
            $this->db->close();

            // cancelo ejecución programa
            exit();
        }
    }

    /*
        método: read()
        descripcion: permite obtener el objeto de la clase corredor a partir del id del corredor 

        parámetros:

            - $id - id del corredor
    */
    public function read($id)
    {
        try {

            // Crear la sentencia sql
            $sql = "SELECT * FROM corredores WHERE id = ? LIMIT 1";

            // Creo la sentencia preprada objeto clase mysqli_stmt
            $stmt = $this->db->prepare($sql);

            // vinculación de parámetros
            $stmt->bind_param(
                'i',
                $id
            );

            // ejecutamos
            $stmt->execute();

            // Devolvemos objeto de la clase  mysqli_result
            $result = $stmt->get_result();

            // Devolvemos un objeto de la clase corredor
            return $result->fetch_object();
        } catch (mysqli_sql_exception $e) {

            // error de  base dedatos
            include 'views/partials/errorDB.php';

            // libero sentencia preprada
            $stmt->close();

            // libero result
            $result->close();

            // cierro conexión
            $this->db->close();

            // cancelo ejecución programa
            exit();
        }
    }

    /*
        método: update()
        descripcion: permite actualizar los detalles de un libro en la tabla

        parámetros:

            - $corredor - objeto de Class_corredor
            - $id - id del corredor
    */
    public function update(Class_corredor $corredor, $id)
    {
        try {

            // Crear la sentencia preparada
            $sql = "
            UPDATE corredores SET 
                    nombre = ?,
                    apellidos = ?,
                    ciudad = ?,
                    fechaNacimiento = ?,
                    sexo = ?,
                    email = ?,
                    dni = ?,
                    edad = ?,
                    id_categoria = ?,
                    id_club = ?
            WHERE 
                    id = ?
            LIMIT 1                            
            ";

            // ejecuto la sentenecia preprada
            $stmt = $this->db->prepare($sql);

            // vinculación de parámetros
            $stmt->bind_param(
                'sssssssiiii',
                $nombre,
                $apellidos,
                $ciudad,
                $fechaNacimiento,
                $sexo,
                $email,
                $dni,
                $edad,
                $id_categoria,
                $id_club,
                $id
            );

            // asignar valores
            $nombre = $corredor->nombre;
            $apellidos = $corredor->apellidos;
            $ciudad = $corredor->ciudad;
            $fechaNacimiento = $corredor->fechaNacimiento;
            $sexo = $corredor->sexo;
            $email = $corredor->email;
            $dni = $corredor->dni;
            $edad = $corredor->edad;
            $id_categoria = $corredor->id_categoria;
            $id_club = $corredor->id_club;
            

            // ejecutamos
            $stmt->execute();
        } catch (mysqli_sql_exception $e) {

            // error de  base dedatos
            include 'views/partials/errorDB.php';

            // libero result
            $stmt->close();

            // cierro conexión
            $this->db->close();

            // cancelo ejecución programa
            exit();
        }
    }


    /*
        getCategorias()

        Método que me devuelve todas las categorias en un array assoc de categorias
    */

    public function getCategorias()
    {
        $sql = "
            SELECT 
                    id, 
                    nombrecorto as categoria
            FROM 
                    categorias
            ORDER BY
                    nombrecorto ASC
        ";

        $result = $this->db->query($sql);

        // devuelvo todos los valores de la  tabla categorias
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /*
        getClubs()

        Método que me devuelve todos los clubs en un array assoc de clubs
    */

    public function getClubs()
    {
        $sql = "
            SELECT 
                    id, 
                    nombreCorto as club
            FROM 
                    clubs
            ORDER BY
                    nombreCorto ASC
        ";

        $result = $this->db->query($sql);

        // devuelvo todos los valores de la  tabla categorias
        return $result->fetch_all(MYSQLI_ASSOC);
    }




    /*
        método: order()
        descripcion: devuelve un objeto de la clase mysqli_result con los 
        detalles de los corredores  ordenados por un criterio.

        Parámetros:

            - criterio: posición de la columna en la tabla corredores
                        por la que quiero ordenar
    */

    public function order(int $criterio)
    {
        try {

            // sentencia sql
            $sql = "
            select 
                corredores.id,
                corredores.nombre, 
                corredores.apellidos,
                corredores.ciudad,
                corredores.email,
                corredores.edad,
                categorias.nombre as categoria,
                clubs.nombre as club
            FROM 
                corredores 
            INNER JOIN
                categorias
            ON corredores.id_categoria = categorias.id
            INNER JOIN
                clubs
            ON corredores.id_club = clubs.id
            ORDER BY ?
        ";

            // ejecuto prepare
            $stmt = $this->db->prepare($sql);

            // vincular parámetros
            $stmt->bind_param(
                'i',
                $criterio
            );

            // ejecutamos
            $stmt->execute();

            // Devolvemos objeto de la clase  mysqli_result
            $result = $stmt->get_result();

            // Devolvemos mysqli_result
            return $result;
        } catch (mysqli_sql_exception $e) {

            // error de  base dedatos
            include 'views/partials/errorDB.php';

            // libero stmt
            $stmt->close();

            // libero result
            $result->close();

            // cierro conexión
            $this->db->close();

            // cancelo ejecución programa
            exit();
        }
    }

    /*
        método: filter()
        descripcion: devuelve un objeto de la clase mysqli_result con los 
        detalles de los corredores filtrados por un criterio.

        Parámetros:

            - criterio: posición de la columna en la tabla corredores
                        por la que quiero ordenar
    */

    public function filter($expresion)
    {
        try {

            // sentencia sql
            $sql = "
            select 
                corredores.id,
                corredores.nombre, 
                corredores.apellidos,
                corredores.ciudad,
                corredores.email,
                corredores.edad,
                categorias.nombre as categoria,
                clubs.nombre as club
            FROM 
                corredores 
            INNER JOIN
                categorias
            ON corredores.id_categoria = categorias.id
            INNER JOIN
                clubs
            ON corredores.id_club = clubs.id
            WHERE 
            CONCAT_WS(' ',
                        corredores.id, 
                        corredores.nombre,
                        corredores.apellidos, 
                        corredores.ciudad, 
                        corredores.email, 
                        corredores.edad, 
                        categorias.nombre,
                        clubs.nombre) 
            LIKE ?

            ORDER BY corredores.id
        ";

            // ejecuto prepare
            $stmt = $this->db->prepare($sql);

            // arreglamos expresión para operador like
            $expresion = '%'.$expresion.'%';

            // vincular parámetros
            $stmt->bind_param(
                's',
                $expresion
            );

            // ejecutamos
            $stmt->execute();

            // Devolvemos objeto de la clase  mysqli_result
            $result = $stmt->get_result();

            // Devolvemos mysqli_result
            return $result;
            
        } catch (mysqli_sql_exception $e) {

            // error de  base dedatos
            include 'views/partials/errorDB.php';

            // libero stmt
            $stmt->close();

            // libero result
            $result->close();

            // cierro conexión
            $this->db->close();

            // cancelo ejecución programa
            exit();
        }
    }

    /*
        método: delete()
        descripcion: elimina un objeto de la clase mysqli_result 

        Parámetros:

            - id: posición de la columna en la tabla c
    */

    public function delete(int $id)
    {
        try {

            // sentencia sql
            $sql = "DELETE FROM registros WHERE id_corredor = ? LIMIT 1";

            // ejecuto prepare
            $stmt = $this->db->prepare($sql);


            // vincular parámetros
            $stmt->bind_param(
                'i',
                $id
            );

            // ejecutamos
            $stmt->execute();

                    
            $sql2 = "DELETE FROM corredores WHERE id = ? LIMIT 1";

            // ejecuto prepare
            $stmt = $this->db->prepare($sql2);


            // vincular parámetros
            $stmt->bind_param(
                'i',
                $id
            );

            // ejecutamos
            $stmt->execute();
            
            

            // Devolvemos objeto de la clase  mysqli_result
            $result = $stmt->get_result();

            // Devolvemos mysqli_result
            return $result;
            
        } catch (mysqli_sql_exception $e) {

            // error de  base dedatos
            include 'views/partials/errorDB.php';

            // libero stmt
            $stmt->close();

            // libero result
            $result->close();

            // cierro conexión
            $this->db->close();

            // cancelo ejecución programa
            exit();
        }
    }


}
