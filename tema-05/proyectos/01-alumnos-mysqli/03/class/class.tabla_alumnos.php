<?php

/*
    clase: class.tabla_alumnos.php
    descripcion: define la clase que va a contener el array de objetos de la clase alumnos.
*/

class Class_tabla_alumnos extends Class_conexion
{


    /*
        método: getAlumnos()
        descripcion: devuelve un objeto de la clase mysqli_result con los 
        detalles de los alumnos
    */

    public function getAlumnos()
    {
        try {

            // sentencia sql
            $sql = "
            select 
                alumnos.id,
                alumnos.nombre, 
                alumnos.apellidos,
                alumnos.email,
                alumnos.telefono,
                alumnos.nacionalidad,
                alumnos.dni,
                timestampdiff(YEAR, alumnos.fechaNac, now()) as edad,
                cursos.nombreCorto as curso
            FROM 
                alumnos 
            INNER JOIN
                cursos
            ON alumnos.id_curso = cursos.id
            ORDER BY alumnos.id
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
        descripcion: permite añadir un objeto de la clase alumno a la tabla
        
        parámetros:

            - $alumno - objeto de la clase alumno

    */
    public function create(Class_alumno $alumno)
    {
        try {

            // Crear la sentencia preparada
            $sql = "
        INSERT INTO 
            alumnos( 
                    nombre,
                    apellidos,
                    email,
                    telefono,
                    nacionalidad,
                    dni, 
                    fechaNac,
                    id_curso
                   )
        VALUES    (?, ?, ?, ?, ?, ?, ?, ?)                            
        ";

            // ejecuto la sentenecia preprada
            $stmt = $this->db->prepare($sql);

            // vinculación de parámetros
            $stmt->bind_param(
                'sssisssi',
                $nombre,
                $apellidos,
                $email,
                $telefono,
                $nacionalidad,
                $dni,
                $fechaNac,
                $id_curso
            );

            // asignar valores
            $nombre = $alumno->nombre;
            $apellidos = $alumno->apellidos;
            $email = $alumno->email;
            $telefono = $alumno->telefono;
            $nacionalidad = $alumno->nacionalidad;
            $dni = $alumno->dni;
            $fechaNac = $alumno->fechaNac;
            $id_curso = $alumno->id_curso;

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
        descripcion: permite obtener el objeto de la clase alumno a partir del id del alumno 

        parámetros:

            - $id - id del alumno
    */
    public function read($id)
    {
        try {

            // Crear la sentencia sql
            $sql = "SELECT * FROM alumnos WHERE id = ? LIMIT 1";

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

            // Devolvemos un objeto de la clase alumno
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

            - $alumno - objeto de Class_alumno
            - $id - id del alumno
    */
    public function update(Class_alumno $alumno, $id) 
    {
        try {

            // Crear la sentencia preparada
            $sql = "
            UPDATE alumnos SET 
                    nombre = ?,
                    apellidos = ?,
                    email = ?,
                    telefono = ?,
                    nacionalidad = ?,
                    dni = ?, 
                    fechaNac = ?,
                    id_curso = ?
            WHERE 
                    id = ?
            LIMIT 1                            
            ";

            // ejecuto la sentenecia preprada
            $stmt = $this->db->prepare($sql);

            // vinculación de parámetros
            $stmt->bind_param(
                'sssisssii',
                $nombre,
                $apellidos,
                $email,
                $telefono,
                $nacionalidad,
                $dni,
                $fechaNac,
                $id_curso,
                $id
            );

            // asignar valores
            $nombre = $alumno->nombre;
            $apellidos = $alumno->apellidos;
            $email = $alumno->email;
            $telefono = $alumno->telefono;
            $nacionalidad = $alumno->nacionalidad;
            $dni = $alumno->dni;
            $fechaNac = $alumno->fechaNac;
            $id_curso = $alumno->id_curso;

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
        método: delete()
        descripcion: permite eliminar un libro de la tabla

        parámetros:

            - $indice - índice de la tabla en la que se encuentra el libro
    */
    public function delete($indice)
    {
        unset($this->tabla[$indice]);
    }

    /*
        getCursos()

        Método que me devuelve todos los cursos en un array assoc de cursos
    */

    public function getCursos()
    {
        $sql = "
            SELECT 
                    id, 
                    nombreCorto as curso
            FROM 
                    cursos
            ORDER BY
                    nombreCorto ASC
        ";

        $result = $this->db->query($sql);

        // devuelvo todos los valores de la  tabla cursos
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
