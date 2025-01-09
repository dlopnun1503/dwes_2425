<?php

class Libro extends Controller
{

    function __construct()
    {

        parent::__construct();
    }

    /*
        Método principal

        Se  carga siempre que la url contenga sólo el primer parámetro

        url: /libro
    */
    public function render()
    {

        // Creo la propiedad title de la vista
        $this->view->title = "Gestión de Libros";

        // Creo la propiedad libros para usar en la vista
        $this->view->libros = $this->model->get();

        $this->view->render('libro/main/index');
    }

    /*
        Método nuevo()

        Muestra el formulario que permite añadir nuevo libro

        url asociada: /libro/nuevo
    */
    public function nuevo()
    {

        // Creo la propiead título
        $this->view->title = "Añadir - Gestión de Libros";

        // Creo la propiedad generos en la vista
        $this->view->generos = $this->model->get_generos();

        // Creo la propiedad autores en la vista
        //  Cargo autores
        $this->view->autores = $this->model->get_autores();

        // Creo la propiedad editoriales en la vista
        // Cargo editoriales
        $this->view->editoriales = $this->model->get_editoriales();

        // Cargo la vista asociada a este método
        $this->view->render('libro/nuevo/index');
    }

    /*
        Método create()

        Permite añadir nuevo libro al formulario

        url asociada: /libro/create
        POST: detalles del libro
    */
    public function create()
    {

        // Recogemos los detalles del formulario
        $titulo = $_POST['titulo'];
        $autor_id = $_POST['autor_id'];
        $editorial_id = $_POST['editorial_id'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $fecha_edicion = $_POST['fecha_edicion'];
        $isbn = $_POST['isbn'];
        $generos_id = $_POST['generos_id'];

        // Creamos un objeto de la clase libro
        $libro = new classLibro(
            null,
            $titulo,
            $precio,
            $stock,
            $fecha_edicion,
            $isbn,
            $autor_id,
            $editorial_id,
            $generos_id
        );

        // Añadimos libro a la tabla
        $this->model->create($libro);

        // redireciona al main de libro
        header('location:' . URL . 'libro');
    }

    /*
        Método editar()

        Muestra el formulario que permite editar los detalles de un libro

        url asociada: /libro/editar/id

        @param int $id: id del libro a editar

    */
    function editar($param = [])
    {

        # obtengo el id del libro que voy a editar
        // libro/edit/4
        // -- libro es el nombre del controlador
        // -- edit es el nombre del método
        // -- $param es un array porque puedo pasar varios parámetros a un método

        $id = $param[0];

        # asigno id a una propiedad de la vista
        $this->view->id = $id;

        # title
        $this->view->title = "Formulario Editar - Gestión de Libros";

        # obtener objeto de la clase libro con el id pasado
        // Necesito crear el método read en el modelo
        $this->view->libro = $this->model->read($id);

        # obtener los generos
        $this->view->generos = $this->model->get_generos();

        // Creo la propiedad autores en la vista
        //  Cargo autores
        $this->view->autores = $this->model->get_autores();

        // Creo la propiedad editoriales en la vista
        // Cargo editoriales
        $this->view->editoriales = $this->model->get_editoriales();

        # cargo la vista
        $this->view->render('libro/editar/index');
    }

    /*
        Método update()

        Actualiza los detalles de un libro

        url asociada: /libro/update/id

        POST: detalles del libro

        @param int $id: id del libro a editar
    */
    public function update($param = [])
    {

        # Cargo id del libro
        $id = $param[0];

        // Recogemos los detalles del formulario
        $titulo = $_POST['titulo'];
        $autor_id = $_POST['autor_id'];
        $editorial_id = $_POST['editorial_id'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $fecha_edicion = $_POST['fecha_edicion'];
        $isbn = $_POST['isbn'];
        $generos_id = $_POST['generos_id'];

        # Con los detalles formulario creo objeto libro
        $libro = new classLibro(
            null,
            $titulo,
            $precio,
            $stock,
            $fecha_edicion,
            $isbn,
            $autor_id,
            $editorial_id,
            $generos_id
        );

        # Actualizo base  de datos
        // Necesito crear el método update en el modelo
        $this->model->update($libro, $id);

        # Cargo el controlador principal de libro
        header('location:' . URL . 'libro');
    }

    /*
        Método eliminar()

        Borra un libro de la base de datos

        url asociada: /libro/eliminar/id

        @param
            :int $id: id del libro a eliminar
    */
    public function eliminar($param = [])
    {

        # Cargo id del libro
        $id = $param[0];

        # Elimino libro de la base de datos
        // Necesito crear el método delete en el modelo
        $this->model->delete($id);

        # Cargo el controlador principal de libro
        header('location:' . URL . 'libro');
    }

    /*
        Método mostrar()

        Muestra los detalles de un libro

        url asociada: /libro/mostrar/id

        @param
            :int $id: id del libro a mostrar
    */
    public function mostrar($param = [])
    {

        # Cargo id del libro
        $id = $param[0];

        # Cargo el título
        $this->view->title = "Mostrar - Gestión de Libros";

        # Obtengo los detalles del libro mediante el método read del modelo
        $this->view->libro = $this->model->read($id);

        # obtener los generos
        $this->view->generos = $this->model->get_generos();

        // Creo la propiedad autores en la vista
        //  Cargo autores
        $this->view->autores = $this->model->get_autores();

        // Creo la propiedad editoriales en la vista
        // Cargo editoriales
        $this->view->editoriales = $this->model->get_editoriales();

        # Cargo la vista
        $this->view->render('libro/mostrar/index');
    }

    /*
        Método filtrar()

        Busca un libro en la base de datos

        url asociada: /libro/filtrar/expresion

        GET: 
            - expresion de búsqueda

        DEVUELVE:
            - PDOStatement con los libros que coinciden con la expresión de búsqueda
    */
    public function filtrar()
    {

        # Obtengo la expresión de búsqueda
        $expresion = $_GET['expresion'];

        # Cargo el título
        $this->view->title = "Filtrar por: {$expresion} - Gestión de Libros";



        # Obtengo los libros que coinciden con la expresión de búsqueda
        $this->view->libros = $this->model->filter($expresion);

        # Cargo la vista
        $this->view->render('libro/main/index');
    }

    /*
        Método ordenar()

        Ordena los libros de la base de datos

        url asociada: /libro/ordenar/id

        @param
            :int $id: id del campo por el que se ordenarán los libros
    */
    public function ordenar($param = [])
    {

        # Criterios de ordenación
        $criterios = [
            1 => 'ID',
            2 => 'Título',
            3 => 'Autor',
            4 => 'Editorial',
            5 => 'Géneros',
            6 => 'Stock',
            7 => 'Precio'
        ];

        # Obtengo el id del campo por el que se ordenarán los libros
        $id = $param[0];


        # Cargo el título
        $this->view->title = "Ordenar por {$criterios[$id]} - Gestión de Libros";

        # Obtengo los libros ordenados por el campo id
        $this->view->libros = $this->model->order($id);

        # Cargo la vista
        $this->view->render('libro/main/index');
    }
}
