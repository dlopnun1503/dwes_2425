<?php

/*
    clase: class.tabla_libros.php
    descripcion: define la clase que va a contener el array de objetos de la clase libros.
*/

class Class_tabla_libros
{

    public $tabla;

    public function __construct()
    {
        $this->tabla = [];
    }


    public function getMaterias()
    {
        $materias = [
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
            'Otros'
        ];

        return $materias;
    }
    public function getEtiquetas()
    {
        $etiquetas = [
            'Antropología',
            'Sociología',
            'Psicología',
            'Economía',
            'Ciencia Política',
            'Derecho',
            'Educación',
            'Geografía',
            'Historia',
            'Ingeniería Civil',
            'Ingeniería Eléctrica',
            'Ingeniería Mecánica',
            'Ingeniería de Sistemas y Computación',
            'Robótica',
            'Inteligencia Artificial',
            'Telecomunicaciones',
            'Filosofía',
            'Teología',
            'Literatura',
            'Lingüística',
            'Historia del Arte',
            'Música',
            'Cine y Medios Audiovisuales',
            'Idiomas y Filología'
        ];

        asort($etiquetas);

        return $etiquetas;
    }

    /*
        método: getDatos()
        descripcion: devuelve un array de objetos
    */

    public function getDatos()
    {

        # libro 1
        $libro = new Class_libro(
            1,
            "Cien Años de Soledad",
            "Gabriel García Márquez",
            "Editorial Sudamericana",
            "1967-05-30",
            0,
            [0, 18],
            29.99
        );

        # Añado el objeto a la tabla
        $this->tabla[] = $libro;

        # libro 2
        $libro = new Class_libro(
            2,
            "Don Quijote de la Mancha",
            "Miguel de Cervantes",
            "Francisco de Robles",
            "1605-01-16",
            0,
            [0, 8, 18],
            45.50
        );

        # Añadir artículo a la tabla
        $this->tabla[] = $libro;

        # libro 3
        $libro = new Class_libro(
            3, 
            "Sapiens: De animales a dioses", 
            "Yuval Noah Harari", 
            "Debate", 
            "2011-06-04", 
            10, 
            [0, 1, 20], 
            35.00 
        );

        # Añadir artículo a la tabla
        $this->tabla[] = $libro;

        # libro 4
        $libro = new Class_libro(
            4, 
            "El origen de las especies", 
            "Charles Darwin", 
            "John Murray", 
            "1859-11-24", 
            3, 
            [8], 
            40.00 
        );

        # Añadir artículo a la tabla
        $this->tabla[] = $libro;
    }

    /*
        método: mostrar_nombre_etiquetas()
        descripción: devuelve un array con el nombre de las etiquetas
        parámetros:
            - indice_etiquetas
    */

    public function mostrar_nombre_etiquetas($indice_etiquetas = [])
    {
        # creo array de nombre de etiquetas vacío
        $nombre_etiquetas = [];

        # cargo el array de etiquetas de los libros
        $etiquetas_libros = $this->getEtiquetas();

        foreach ($indice_etiquetas as $indice) {
            $nombre_etiquetas[] = $etiquetas_libros[$indice];
        }

        # Ordeno
        asort($nombre_etiquetas);
        return $nombre_etiquetas;
    }

    /*
        método: create()
        descripcion: permite añadir un objeto de la clase libro a la tabla
        parámetros:

            - $libro - objeto de la clase libros

    */
    public function create(Class_libro $libro)
    {
        $this->tabla[] = $libro;
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
}
