<?php

/*
    Clase articulo
*/

class Alumno
{
        private $id;
        private $nombre;
        private $apellidos;
        private $email;
        private $fecha_nacimiento;
        private $curso;
        private $asignaturas;


        public function __construct(
                $id = null,
                $nombre = null,
                $apellidos = null,
                $email = null,
                $fecha_nacimiento = null,
                $curso = null,
                $asignaturas = []
        ) {
                $this->id = $id;
                $this->nombre = $nombre;
                $this->apellidos = $apellidos;
                $this->email = $email;
                $this->fecha_nacimiento = $fecha_nacimiento;
                $this->curso = $curso;
                $this->asignaturas = $asignaturas;
        }

        // getters and setters 
        public function getId()
        {
                return $this->id;
        }
        public function getNombre()
        {
                return $this->nombre;
        }
        public function getApellidos()
        {
                return $this->apellidos;
        }
        public function getEmail()
        {
                return $this->email;
        }
        public function getFechaNacimiento()
        {
                return $this->fecha_nacimiento;
        }
        public function getCurso()
        {
                return $this->curso;
        }
        public function getAsignaturas()
        {
                return $this->asignaturas;
        }
        public function setId($id)
        {
                $this->id = $id;
        }
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;
        }
        public function setApellidos($apellidos)
        {
                $this->apellidos = $apellidos;
        }
        public function setEmail($email)
        {
                $this->email = $email;
        }
        public function setFechaNacimiento($fecha_nacimiento)
        {
                $this->fecha_nacimiento = $fecha_nacimiento;
        }
        public function setCurso($curso)
        {
                $this->curso = $curso;
        }
        public function setAsignaturas($asignatura)
        {
                $this->asignatura = $asignatura;
        }
        public function getEdad()
        {
                $fechaNacimiento = DateTime::createFromFormat('d/m/Y', $this->fecha_nacimiento);
                $hoy = new DateTime();
                $edad = $hoy->diff($fechaNacimiento)->y;
                return $edad;


        }
}





?>