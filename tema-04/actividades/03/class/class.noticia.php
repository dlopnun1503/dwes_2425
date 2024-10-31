<?php


    class Class_noticia{
        public $id;
        public $titulo;
        public $extracto;
        public $cuerpo;
        public $autor;
        public $fechaEdicion;
        public $fotografia;
        public $epigrafe;

        function __construct()
        {
            $this->id = null; 
            $this->titulo = null;
            $this->extracto = null;
            $this->cuerpo = [];
            $this->autor = null;
            $this->fechaEdicion = null;
            $this->fotografia = null;
            $this->epigrafe = null;
        }

        public function getId() {
            return $this->id;
        }
    
        public function getTitulo() {
            return $this->titulo;
        }
    
        public function getExtracto() {
            return $this->extracto;
        }
    
        public function getCuerpo() {
            return $this->cuerpo;
        }
    
        public function getAutor() {
            return $this->autor;
        }
    
        public function getFechaEdicion() {
            return $this->fechaEdicion;
        }
    
        public function getFotografia() {
            return $this->fotografia;
        }
    
        public function getEpigrafe() {
            return $this->epigrafe;
        }
    
    
        public function setId($id) {
            $this->id = $id;
        }
    
        public function setTitulo($titulo) {
            $this->titulo = $titulo;
        }
    
        public function setExtracto($extracto) {
            $this->extracto = $extracto;
        }
    
        public function setCuerpo($cuerpo) {
            $this->cuerpo = $cuerpo;
        }
    
        public function setAutor($autor) {
            $this->autor = $autor;
        }
    
        public function setFechaEdicion($fechaEdicion) {
            $this->fechaEdicion = $fechaEdicion;
        }
    
        public function setFotografia($fotografia) {
            $this->fotografia = $fotografia;
        }
    
        public function setEpigrafe($epigrafe) {
            $this->epigrafe = $epigrafe;
        }
    
        
        public function inParrafo($parrafo) {
            $this->cuerpo .= "<br>" . $parrafo;
        }
    
        
        public function showTexto() {
            return $this->id . $this->titulo. $this->extracto. $this->cuerpo . $this->autor . $this->fechaEdicion . $this->fotografia . $this->epigrafe;
        }
    }