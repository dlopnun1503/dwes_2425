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

        // inicio o continuo la sesión
        session_start();

        // Compruebo si hay mensaje de éxito
        if (isset($_SESSION['mensaje'])) {

            // Creo la propiedad mensaje en la vista
            $this->view->mensaje = $_SESSION['mensaje'];

            // Elimino la variable de sesión mensaje
            unset($_SESSION['mensaje']);
        }

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

        // inicio o continuo la sesión
        session_start();

        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

        // Crear un objeto vacío de la clase libro
        $this->view->libro = new classLibro();

        // Comrpuebo si hay errores en la validación
        if (isset($_SESSION['error'])) {

            // Creo la propiedad error en la vista
            $this->view->error = $_SESSION['error'];

            // Creo la propiedad libro en la vista
            $this->view->libro = $_SESSION['libro'];

            // Creo la propiedad mensaje de error
            $this->view->mensaje_error = 'Error en el formulario';

            // Elimino la variable de sesión error
            unset($_SESSION['error']);

            // Elimino la variable de sesión libro
            unset($_SESSION['libro']);
        }

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

        // inicio o continuo la sesión
        session_start();

        // Validación CSRF
        if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
            die('Petición no válida');
        }

        // Recogemos los detalles del formulario
        $titulo = filter_var($_POST['titulo'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $autor = filter_var($_POST['autor'] ??= '', FILTER_SANITIZE_NUMBER_INT);
        $editorial = filter_var($_POST['editorial'] ??= '', FILTER_SANITIZE_NUMBER_INT);
        $precio = filter_var($_POST['precio'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $unidades =  filter_var($_POST['unidades'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $fecha_edicion =  filter_var($_POST['fecha_edicion'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $isbn =  filter_var($_POST['isbn'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $generos_id = $_POST['generos_id'] ?? [];

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
            $generos_id
        );

        // Validación de los datos

        // Creo un array para almacenar los errores
        $error = [];

        // Validación del título
        // Reglas: obligatorio
        if (empty($titulo)) {
            $error['titulo'] = 'El título es obligatorio';
        } 

        // Validación del autor
        // Reglas: obligatorio, clave foránea
        if (empty($autor)) {
            $error['autor'] = 'El autor es obligatorio';
        }else if (!filter_var($autor, FILTER_VALIDATE_INT)) {
            $error['autor'] = 'El formato del autor no es correcto';
        } else if (!$this->model->validateForeignKeyAutor($autor)) {
            $error['autor'] = 'El autor no existe';
        }

        // Validación de la editorial
        // Reglas: obligatorio, clave foránea
        if (empty($editorial)) {
            $error['editorial'] = 'La editorial es obligatoria';
        } else if (!filter_var($editorial, FILTER_VALIDATE_INT)) {
            $error['editorial'] = 'El formato de la editorial no es correcto';
        } else if (!$this->model->validateForeignKeyEditorial($editorial)) {
            $error['editorial'] = 'La editorial no existe';
        }

        // Validación del precio
        // Reglas: obligatorio, formato numérico
        if (empty($precio)) {
            $error['precio'] = 'El precio es obligatorio';
        } else if (!filter_var($precio, FILTER_VALIDATE_FLOAT)) {
            $error['precio'] = 'El formato del precio no es correcto';
        }

        // Validación de las unidades
        // Reglas: No obligatorio

        // Validación de la fecha de edición
        // Reglas: obligatorio, formato fecha
        if (empty($fecha_edicion)) {
            $error['fecha_edicion'] = 'La fecha de edición es obligatoria';
        } else {
            $fecha = DateTime::createFromFormat('Y-m-d', $fecha_edicion);
            if (!$fecha) {
                $error['fecha_edicion'] = 'El formato de la fecha de edición no es correcto';
            }
        }

        // Validación del ISBN
        // Reglas: obligatorio, formato ISBN, clave secundaria

        // Expresión regular para validar el ISBN
        // 13 números 
        $options = [
            'options' => [
                'regexp' => '/^[0-9]{13}$/'
            ]
        ];
        if (empty($isbn)) {
            $error['isbn'] = 'El ISBN es obligatorio';
        } else if (!filter_var($isbn, FILTER_VALIDATE_INT, $options)) {
            $error['isbn'] = 'El formato del ISBN no es correcto';
        } else if (!$this->model->validateUniqueISBN($isbn)) {
            $error['isbn'] = 'El ISBN ya existe';
        }

        // Validación de los géneros
        // Reglas: obligatorio, clave foránea siendo generos_id un array
        if (empty($generos_id)) {
            $error['generos_id'] = 'Tienes que seleccionar al menos un género';
        } 

        // Si hay errores
        if (!empty($error)) {

            // Creo la variable de sesión libro
            $_SESSION['libro'] = $libro;

            // Creo la variable de sesión error
            $_SESSION['error'] = $error;

            // Redirecciono al formulario de nuevo libro
            header('location:' . URL . 'libro/nuevo');

            // Salgo de la función
            exit();
        }


        // Añadimos libro a la tabla
        $this->model->create($libro);

        // redireciona al main de libro
        header('location:' . URL . 'libro');
        exit();
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
