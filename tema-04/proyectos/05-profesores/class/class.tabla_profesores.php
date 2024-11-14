<?php

/*
    clase: class.tabla_profesores.php
    descripcion: define la clase que va a contener el array de objetos de la clase profesor.
*/

class Class_tabla_profesores
{

    public $tabla;

    public function __construct()
    {
        $this->tabla = [];
    }


    public function getEspecialidad()
    {
        $especialidades = [
            'Literatura Española',
            'Ciencias Sociales',
            'Matemáticas',
            'Ciencias de la Salud',
            'Ingeniería',
            'Tecnología',
            'Humanidades',
            'Artes',
            'Informática',
            'Religión',
            'Inglés'
        ];

        asort($especialidades);
        return $especialidades;
    }

    public function getAsignaturas()
    {
        $asignaturas = [
            'Sistemas informáticos',
            'Bases de datos',
            'Programación',
            'Lenguajes de marcas y sistemas de gestión de información',
            'Entornos de desarrollo',
            'Desarrollo web en entorno cliente (JavaScript, HTML, CSS)',
            'Desarrollo web en entorno servidor (PHP, Node.js, u otros)',
            'Despliegue de aplicaciones web',
            'Diseño de interfaces web',
            'Empresa e iniciativa emprendedora',
            'Formación y orientación laboral (FOL)',
            'Proyecto de desarrollo de aplicaciones web (normalmente al final del ciclo)',
            'Inglés técnico'
        ];

        asort($asignaturas);

        return $asignaturas;
    }

    /*
        método: getDatos()
        descripcion: devuelve un array de objetos
    */

    public function getDatos()
    {

        # profesor 1
        $profesor = new Class_profesor(
            1,
            'Juan Carlos',
            'Moreno',
            '4440524757',
            '1980-10-05',
            'Ubrique',
            8,
            [1, 6]
        );

        # Añado el objeto a la tabla
        $this->tabla[] = $profesor;

        # profesor 2
        $profesor = new Class_profesor(
            2,
            'Juan',
            'Gallego',
            '4440524888',
            '1983-05-30',
            'Ubrique',
            8,
            [5, 11]
        );

        # Añadir artículo a la tabla
        $this->tabla[] = $profesor;

        # profesor 3
        $profesor = new Class_profesor(
            3, 
            'Cristina',
            'Álvarez',
            '4440524644',
            '1992-02-12',
            'Ubrique',
            1,
            [9, 10]
        );

        # Añadir artículo a la tabla
        $this->tabla[] = $profesor;

        # profesor 4
        $profesor = new Class_profesor(
            4, 
            'Juan',
            'Gago',
            '444052466',
            '1977-09-30',
            'Ubrique',
            8,
            [0, 7]
        );

        # Añadir artículo a la tabla
        $this->tabla[] = $profesor;
    }

    /*
        método: mostrar_nombre_asignaturas()
        descripción: devuelve un array con el nombre de las asignaturas
        parámetros:
            - indice_asignaturas
    */

    public function mostrar_nombre_asignaturas($indice_asignaturas = [])
    {
        # creo array de nombre de asignaturas vacío
        $nombre_asignaturas = [];

        # cargo el array de asignaturas de los profesores
        $asignaturas_profesores = $this->getAsignaturas();

        foreach ($indice_asignaturas as $indice) {
            $nombre_asignaturas[] = $asignaturas_profesores[$indice];
        }

        # Ordeno
        asort($nombre_asignaturas);
        return $nombre_asignaturas;
    }

    /*
        método: create()
        descripcion: permite añadir un objeto de la clase profesor a la tabla
        parámetros:

            - $profesor - objeto de la clase profesor

    */
    public function create(Class_profesor $profesor)
    {
        $this->tabla[] = $profesor;
    }

    /*
        método: read()
        descripcion: permite obtener el objeto de la clase profesor correspondiente a un índice 
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
        descripcion: permite actualizar los detalles de un profesor en la tabla

        parámetros:

            - $profesor - objeto de la clase profesor, con los detalles actualizados de dicho profesor
            - $indice - índice de la tabla
    */
    public function update(Class_profesor $profesor, $indice)
    {
        $this->tabla[$indice] = $profesor;
    }


    /*
        método: delete()
        descripcion: permite eliminar un profesor de la tabla

        parámetros:

            - $indice - índice de la tabla en la que se encuentra el profesor
    */
    public function delete($indice)
    {
        unset($this->tabla[$indice]);
    }
}
