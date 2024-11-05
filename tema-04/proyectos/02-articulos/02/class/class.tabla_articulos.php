<?php  
   
     
     /**
      * class.tabla_articulos.php 
      * define la clase que va a contener el array de la clase articlos
      */


      class Class_tabla_articulos{
        
        private $tabla;

        public function __construct(){
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
         */
        public function setTabla($tabla): self
        {
                $this->tabla = $tabla;

                return $this;
        }


        public function getMarca(){
            $marcas = [
                'Xiaomi',
                'Acer',
                'Nokia',
                'Lenovo',
                'Apple',
                'Aoc',
                'IBM',
                'HP',
                'Racer'
            ];

            asort($marcas);
            return $marcas;
        }


        public function getCategorias(){
            $categorias = [
                'Portatiles',
                'PCs sobremesa',
                'Componentes',
                'Pantallas',
                'Impresoras',
                'Tablets',
                'Móviles',
                'Fotografía',
                'Imagen',
                'Almacenimiento'
            ];

            asort($categorias);
            return $categorias;
        }
        
        /**
         * Devuelve un array de objetos
         */
        public function getDatos(){

            #Articulo1
            $articulo = new Class_articulo
            (
                1, 
                'Portátil HP MD12345',
                'MD12345',
                7,
                [0, 8],
                12, 
                560.56
            );
            $this->tabla[]= $articulo;

            #Articulo2
            $articulo = new Class_articulo
            (
                2, 
                'Movil Xiaomi 34',
                34,
                0,
                [6],
                15, 
                500.99
            );
            $this->tabla[]= $articulo;

            #Articulo3
            $articulo = new Class_articulo
            (
                3, 
                'Iphone 16',
                16,
                4,
                [6, 7, 8],
                28, 
                1200.00
            );
            $this->tabla[]= $articulo;
        }


        /**
         * mostrar_nombre_categorias()
         * devuelve un array con el nombre de las categotias
         * parametros:
         *            - indice_categorias
         */

         public function mostrar_nombre_categorias($indice_categorias = []){
            $nombre_categorias = [];

            $categorias_articulos  = $this->getCategorias();

            foreach($indice_categorias as $indice_categoria){
                $nombre_categorias[] = $categorias_articulos[$indice_categoria];
            }

            #Ordeno 
            asort($nombre_categorias);
            return $nombre_categorias;
         }
      }