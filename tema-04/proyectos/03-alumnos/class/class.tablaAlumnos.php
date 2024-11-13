<?php
/* 

    class.tabla.Alumnos.php

    tabla de articulos

    Es un array donde cada elemento es un objeto de la clase Alumno
*/

class ArrayAlumno
{

    private $tabla; //Array que almacena los artículos
    /* Constructor */
    public function __construct()
    {
        $this->tabla = [];
    }


    /**
     * Get the value of tabla
     */
    public function getTabla()
    {
        return $this->tabla;
    }

    /**
     * Set the value of tabla
     *
     * @return  self
     */
    public function setTabla($tabla)
    {
        $this->tabla = $tabla;

        return $this;
    }

    static public function getCursos()
    {
        $cursos = [
            '1SMR',
            '2SMR',
            '1DAW',
            '2DAW',
            '1ADI',
            '2ADI'
        ];
        asort($cursos);
        return $cursos;
    }

    static public function getAsignaturas()
    {
        $asignaturas = [
            '1DAW Base de Datos',
            '1DAW Entornos de Desarrollo',
            '1DAW Formación y Orientación Laboral',
            '1DAW Lenguaje de Marcas y Sistemas de Gestión de Información',
            '1DAW Programación',
            '2DAW Desarrollo Web Entorno Cliente',
            '2DAW Desarrollo Web Entorno Servidor',
            '2DAW Despliegue de Aplicaciones Web'
        ];
        asort($asignaturas);
        return $asignaturas;
    }
    public function getAlumnos()
    {

        #Alumno 1
        $alumno = new Alumno(
            1,
            'Juan Manuel',
            'Saborido Baena',
            'juan@gmail.com',
            '06/03/2004',
            2,
            [3, 4, 5]
        );

        # Añadir artículo a la tabla
        $this->tabla[] = $alumno;

        #Alumno 2
        $alumno = new Alumno(
            2,
            'Pablo',
            'Garcia Mangana',
            'pablo@g.educaand.es',
            '01/05/2004',
            3,
            [3, 7, 6]
        );

        # Añadir artículo a la tabla
        $this->tabla[] = $alumno;

        #Alumno 3
        $alumno = new Alumno(
            3,
            'David',
            'Lopez Nuñez',
            'david@gmail.com',
            '15/03/2004',
            2,
            [6, 7, 4]
        );

        # Añadir artículo a la tabla
        $this->tabla[] = $alumno;

        #Alumno 4
        $alumno = new Alumno(
            4,
            'Victor',
            'Chacón Calle',
            'victor@gmail.com',
            '20/10/2003',
            4,
            [6, 7, 2]
        );

        # Añadir artículo a la tabla
        $this->tabla[] = $alumno;

        #Alumno 5
        $alumno = new Alumno(
            5,
            'Sebastian',
            'Bohorquez Torres',
            'sebas@gmail.com',
            '17/04/2005',
            3,
            [6, 7, 3]
        );

        #Añadir articulo a la tabla 
        $this->tabla[] = $alumno;

    }

    static public function mostrarAsignatura($asignaturas, $asignaturasAlumno)
    {
        $array = [];
        foreach ($asignaturasAlumno as $indice) {
            $array[] = $asignaturas[$indice];
        }
        asort($array);
        return $array;
    }


    public function create(Alumno $data)
    {
        $this->tabla[] = $data;
    }
    public function delete($indice)
    {
        unset($this->tabla[$indice]);
        array_values($this->tabla);

    }
    public function update(Alumno $data, $indice)
    {
        // toma un indice y modifica los valores en la tabla de ese indice
        $this->tabla[$indice] = $data;
    }

    public function buscarID($indice)
    {
        // retornamos los valores de ese indice en la tabla de la clase
        return $this->tabla[$indice];
    }




    







}
?>