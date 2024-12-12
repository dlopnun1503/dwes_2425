<?php

/*
    archivo:class.libros.php
    titulo: define la clase libros sin encapsulamiento
*/

class Class_libro
{
    public $id;
    public $titulo;
    public $precio;
    public $stock;
    public $fecha_edicion;
    public $isbn;
    public $autor_id;
    public $editorial_id;
    public $generos_id;

    public function __construct(
        $id = null,
        $titulo = null,
        $precio = null,
        $stock = null,
        $fecha_edicion = null,
        $isbn = null,
        $autor_id = null,
        $editorial_id = null,
        $generos_id = null
    ) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->precio = $precio;
        $this->stock = $stock;
        $this->fecha_edicion = $fecha_edicion;
        $this->isbn = $isbn;
        $this->autor_id = $autor_id;
        $this->editorial_id = $editorial_id;
        $this->generos_id = $generos_id;
    }
}
