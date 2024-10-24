<?php  
  
     
     /*
          class.libro.php
          definicion de clase libro con encapsulamiento
     */

     class Class_libro{

        private $id;
        private $titulo;
        private $precio;
        private $paginas;
        private $autor;
        private $tematica;


        public function __construct
        (
            $id = null,
            $titulo = null,
            $precio = 0,
            $paginas = 0,
            $autor = null,
            $tematicas = []
        )
        {
            $this->id = $id;
            $this->titulo = $titulo;
            $this->precio = $precio;
            $this->paginas = $paginas;
            $this->autor = $autor;
            $this->tematica = $tematicas;
        }


        // Getters
    public function getId() {
        return $this->id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getPaginas() {
        return $this->paginas;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function getTematica() {
        return $this->tematica;
    }


    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function setPaginas($paginas) {
        $this->paginas = $paginas;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
    }

    public function setTematica($tematicas) {
        $this->tematica = $tematicas;
    }
    
}
