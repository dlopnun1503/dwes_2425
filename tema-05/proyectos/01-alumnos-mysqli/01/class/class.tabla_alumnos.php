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
        ";

        // ejecuto comando sql
        $result = $this->mysqli->query($sql);

        // obtengo un objeto de la clase mysqli_result
        // devuelvo dicho objeto
        return $result;

        
    }

    
    /*
        método: create()
        descripcion: permite añadir un objeto de la clase artículo a la tabla
        parámetros:

            - $libro - objeto de la clase libro

    */
    public function create(Class_libro $libro)
    {
        $this->tabla[] = $libro;
    }

    /*
        método: read()
        descripcion: permite obtener el objeto de la clase libro a partir de un índice 
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

            - $libro - objeto de la clase libro, con los detalles actualizados de dicho artículo
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
}
