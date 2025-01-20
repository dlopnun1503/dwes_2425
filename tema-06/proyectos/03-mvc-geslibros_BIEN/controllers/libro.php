<?php

class Libro extends Controller
{

    function __construct()
    {

        parent::__construct();
    }

    /*
        Método principal
    */
    public function render()
    {

        // Creo la propiedad title de la vista
        $this->view->title = "Gestión de libros";

        // Creo la propiedad libros para usar en la vista
        $stmt = $this->model->get();

        // Obtenemos un array
        $array_libros = $stmt->fetchAll(PDO::FETCH_OBJ);

        //Asigno el valor a una variable
        $this->view->libros = $array_libros;

        $this->view->render('libro/main/index');
    }

    /*
        Método nuevo()

        Muestra el formulario que permite añadir nuevo libro
    */
    public function nuevo()
    {

        // Creo la propiead título
        $this->view->title = "Añadir - Gestión de libros";

        // Creo la propiedad autores en la vista
        $this->view->autores = $this->model->get_autores();

        // Creo la propiedad editoriales en la vista
        $this->view->editoriales = $this->model->get_editoriales();

        // Creo la propiedad generos en la vista
        $this->view->generos = $this->model->get_generos();

        // Cargo la vista asociada a este método
        $this->view->render('libro/nuevo/index');
    }

    /*
        Método create()

        Permite añadir nuevo libro al formulario
    */
    public function create()
    {

        // Recogemos los detalles del formulario
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $editorial = $_POST['editorial'];
        $precio = $_POST['precio'];
        $unidades = $_POST['unidades'];
        $fecha_edicion = $_POST['fecha_edicion'];
        $isbn = $_POST['isbn'];
        $generos = $_POST['generos'];

        // Creamos un objeto de la clase libro
        $libro = new classLibro(
            null,
            $titulo,
            $autor,
            $editorial,
            $precio,
            $unidades,
            $fecha_edicion,
            $isbn,
            $generos
        );

        // Añadimos libro a la tabla
        $this->model->create($libro);

        // redireciona al main de libro
        header('location:' . URL . 'libro');
    }

    /*
        Método editar()

        Muestra el formulario que permite editar los detalles de un libro

    */
    function editar($param = [])
    {

        // obtengo el id del libro que voy a editar

        $id = $param[0];

        // asigno id a una propiedad de la vista
        $this->view->id = $id;

        // title
        $this->view->title = "Formulario Editar - Gestión de libros";

        // obtener objeto de la clase libro con el id pasado
        // Necesito crear el método read en el modelo
        $this->view->libro = $this->model->read($id);

        // Creo la propiedad autores en la vista
        $this->view->autores = $this->model->get_autores();

        // Creo la propiedad editoriales en la vista
        $this->view->editoriales = $this->model->get_editoriales();

        // Creo la propiedad generos en la vista
        $this->view->generos = $this->model->get_generos();

        // cargo la vista
        $this->view->render('libro/editar/index');
    }

    /*
        Método update()

        Actualiza los detalles de un libro
    */
    public function update($param = [])
    {

        // Cargo id del libro
        $id = $param[0];

        // Recogemos los detalles del formulario
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $editorial = $_POST['editorial'];
        $precio = $_POST['precio'];
        $unidades = $_POST['unidades'];
        $fecha_edicion = $_POST['fecha_edicion'];
        $isbn = $_POST['isbn'];
        $generos = $_POST['generos'];

        // Con los detalles formulario creo objeto libro

        $libro = new classLibro(
            null,
            $titulo,
            $autor,
            $editorial,
            $precio,
            $unidades,
            $fecha_edicion,
            $isbn,
            $generos
        );

        // Actualizo base  de datos
        // Necesito crear el método update en el modelo
        $this->model->update($libro, $id);

        // Cargo el controlador principal de libro
        header('location:' . URL . 'libro');
    }

    /*
        Método eliminar()

        Borra un libro de la base de datos
    */
    public function eliminar($param = [])
    {

        // Cargo id del libro
        $id = $param[0];

        // Elimino libro de la base de datos
        // Necesito crear el método delete en el modelo
        $this->model->delete($id);

        // Cargo el controlador principal de libro
        header('location:' . URL . 'libro');
    }

    /*
        Método mostrar()

        Muestra los detalles de un libro
    */
    public function mostrar($param = [])
    {

        // Cargo id del libro
        $id = $param[0];

        // Cargo el título
        $this->view->title = "Mostrar - Gestión de libros";

        // Obtengo los detalles del libro mediante el método read del modelo
        $libro = $this->model->read($id);

        $this->view->libro = $libro;

        // Cargo la vista
        $this->view->render('libro/mostrar/index');
    }

    /*
        Método filtrar()

        Busca un libro en la base de datos
    */
    public function filtrar()
    {

        // Obtengo la expresión de búsqueda
        $expresion = $_GET['expresion'];

        // Cargo el título
        $this->view->title = "Filtrar por: {$expresion} - Gestión de libros";
    
        // Creo la propiedad libros para usar en la vista
        $stmt = $this->model->filter($expresion);

        // Obtenemos un array
        $array_libros = $stmt->fetchAll(PDO::FETCH_OBJ);

        //Asigno el valor a una variable
        $this->view->libros = $array_libros;

        // Cargo la vista
        $this->view->render('libro/main/index');
    }

    /*
        Método ordenar()

        Ordena los libros de la base de datos
    */
    public function ordenar($param = [])
    {

        // Criterios de ordenación
        $criterios = [
            1 => 'Id',
            2 => 'Título',
            3 => 'Autor',
            4 => 'Editorial',
            6 => 'Stock',
            7 => 'Precio'
        ];

        // Obtengo el id del campo por el que se ordenarán los libros
        $id = $param[0];


        // Cargo el título
        $this->view->title = "Ordenar por {$criterios[$id]} - Gestión de libros";

        // Obtengo los libros ordenados por el campo id
        $stmt = $this->model->order($id);

        // Obtenemos un array
        $array_libros = $stmt->fetchAll(PDO::FETCH_OBJ);

        //Asigno el valor a una variable
        $this->view->libros = $array_libros;

        // Cargo la vista
        $this->view->render('libro/main/index');
    }
}
