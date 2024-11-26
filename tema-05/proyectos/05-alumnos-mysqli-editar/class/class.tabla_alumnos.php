<?php

/*
    clase: class.tabla_alumnos.php
    descripcion: define la clase que va a contener el array de objetos de la clase alumnos.
*/

class Class_tabla_alumnos extends Class_conexion
{

    /*
        método: getAlumnos()
        descripcion: devuelve un array de objetos
    */

    public function getAlumnos()
    {
        try {
            $sql = "
             SELECT
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
        ";

            // Ejecuto comando sql
            $result = $this->db->query($sql);

            // Obtengo un objeto de la clase mysqli_result
            // devuelvo dicho objeto
            return $result;
        } catch (mysqli_sql_exception $e) {

            include 'views/partials/errorDB.php';

            // libero result
            $result->close();

            $this->db->close();

            exit();
        }
    }


    /*
        método: create()
        descripcion: permite añadir un objeto de la clase alumno a la tabla
        parámetros:

            - $alumno - objeto de la clase alumnos

    */
    public function create(Class_alumno $alumno)
    {

        try{
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
             VALUES       (
                            ?, ?, ?, ?, ?, ?, ?, ?)
      ";

        // Ejecuto la sentencia preparada
        $stmt = $this->db->prepare($sql);

        //Vinculacion de parametros
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

        // Asignar valores
        $nombre = $alumno->nombre;
        $apellidos = $alumno->apellidos;
        $email = $alumno->email;
        $telefono = $alumno->telefono;
        $nacionalidad = $alumno->nacionalidad;
        $dni = $alumno->dni;
        $fechaNac = $alumno->fechaNac;
        $id_curso = $alumno->id_curso;

        // Ejecutamos
        $stmt->execute();

        }catch(mysqli_sql_exception $e) {

            include 'views/partials/errorDB.php';

            // libero result
            $result->close();

            $this->db->close();

            exit();
        }
    }

    /*
        método: read()
        descripcion: permite obtener el objeto de la clase libro correspondiente a un índice 
        de la tabla

        parámetros:

            - $indice - índice de la tabla
    */
    public function read($indice)
    {
        return $this->tabla[$indice];
    }

    /*
        método: update()
        descripcion: permite actualizar los detalles de un libro en la tabla

        parámetros:

            - $libro - objeto de la clase libro, con los detalles actualizados de dicho libro
            - $indice - índice de la tabla
    */
    public function update(Class_libro $libro, $indice)
    {
        $this->tabla[$indice] = $libro;
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


    /**
     * getCursos()
     * 
     * Metodo que me devuelve todos los cursos en un array asociativo
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

        // Devuelvo todos los valores de la tabla cursos
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
