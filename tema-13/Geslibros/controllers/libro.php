<?php

class Libro extends Controller
{

    function __construct()
    {

        parent::__construct();
    }

    /*
        Método checkLogin()

        Permite checkear si el usuario está logueado, si no está logueado 
        redirecciona a la página de login

    */
    public function checkLogin()
    {

        // Comprobar si hay un usuario logueado
        if (!isset($_SESSION['user_id'])) {
            // Genero mensaje error
            $_SESSION['mensaje_error'] = 'Acceso denegado';
            header('location:' . URL . 'auth/login');
            exit();
        }
    }

    /*
        Método checkPermissions()

        Permite checkear si el usuario tiene permisos suficientes para acceder a una página

        @param
            - array $roles: roles permitidos
    */
    public function checkPermissions($priviliges)
    {

        // Comprobar si el usuario tiene permisos
        if (!in_array($_SESSION['role_id'], $priviliges)) {
            // Genero mensaje error
            $_SESSION['mensaje_error'] = 'Acceso denegado. No tiene permisos suficientes';
            header('location:' . URL . 'libro');
            exit();
        }
    }

    /*
        Método checkTokenCsrf()

        Permite checkear si el token CSRF es válido

        @param
            - string $csrf_token: token CSRF
    */
    public function checkTokenCsrf($csrf_token)
    {

        // Validación CSRF
        if (!hash_equals($_SESSION['csrf_token'], $csrf_token)) {
            require_once 'controllers/error.php';
            $controller = new Errores('Petición no válida');
            exit();
        }
    }

    /*
        Método principal

        Se  carga siempre que la url contenga sólo el primer parámetro

        url: /libro
    */
    public function render()
    {
        // inicio o continuo la sesión
        session_start();

        // Comprobar si hay un usuario logueado
        if (!isset($_SESSION['user_id'])) {
            // Genero mensaje de error
            $_SESSION['mensaje_error'] = 'Acceso denegado';
            header('location:' . URL . 'auth/login');
            exit();
        } // Comprobar si el usuario tiene permisos

        else if (!in_array($_SESSION['role_id'], $GLOBALS['libro']['main'])) {

            $_SESSION['mensaje_error'] = 'Acceso denegado. No tiene permisos suficientes';
            header('location:' . URL . 'auth/login');
            exit();
        }

        // Creo un token CSRF
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

        // Compruebo si hay mensaje de éxito
        if (isset($_SESSION['mensaje'])) {

            // Creo la propiedad mensaje en la vista
            $this->view->mensaje = $_SESSION['mensaje'];

            // Elimino la variable de sesión mensaje
            unset($_SESSION['mensaje']);
        }

        // Compruebo si hay mensaje de error
        if (isset($_SESSION['mensaje_error'])) {

            // Creo la propiedad mensaje en la vista
            $this->view->mensaje_error = $_SESSION['mensaje_error'];

            // Elimino la variable de sesión mensaje
            unset($_SESSION['mensaje_error']);
        }


        // Compruebo validación errónea de formulario
        if (isset($_SESSION['error'])) {

            // Creo la propiedad mensaje_error en la vista
            $this->view->mensaje_error = $_SESSION['error'];

            // Elimino la variable de sesión error
            unset($_SESSION['error']);
        }

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

        // inicio o continuo la sesión
        session_start();

        // Comprobar si hay usuario logueado
        if (!isset($_SESSION['user_id'])) {
            // Genero mensaje de error
            $_SESSION['mensaje_error'] = 'Acceso denegado.';
            // redireciona al login
            header('location:' . URL . 'auth/login');
            exit();
        }
        // Comprobar si el usuario tiene permisos
        else if (!in_array($_SESSION['role_id'], $GLOBALS['libro']['nuevo'])) {
            // Genero mensaje
            $_SESSION['mensaje_error'] = 'Acceso denegado. No tiene permisos suficientes.';
            // redireciona al login
            header('location:' . URL . 'libro');
            exit();
        }

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

        // Comprobar si hay usuario logueado
        if (!isset($_SESSION['user_id'])) {
            // Genero mensaje de error
            $_SESSION['mensaje_error'] = 'Acceso denegado.';
            // redireciona al login
            header('location:' . URL . 'auth/login');
            exit();
        }
        // Comprobar si el usuario tiene permisos
        else if (!in_array($_SESSION['role_id'], $GLOBALS['libro']['nuevo'])) {
            // Genero mensaje
            $_SESSION['mensaje_error'] = 'Acceso denegado. No tiene permisos suficientes.';
            // redireciona al login
            header('location:' . URL . 'libro');
            exit();
        }

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
        } else if (!filter_var($autor, FILTER_VALIDATE_INT)) {
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

        url asociada: /libro/editar/id/csrf_token

        @param
            - int $id: id del libro a editar
            - string $csrf_token: token CSRF

    */
    function editar($param = [])
    {

        // inicio o continuo la sesión
        session_start();

        // Comprobar si hay usuario logueado
        if (!isset($_SESSION['user_id'])) {
            // Genero mensaje de error
            $_SESSION['mensaje_error'] = 'Acceso denegado.';
            // redireciona al login
            header('location:' . URL . 'auth/login');
            exit();
        }
        // Comprobar si el usuario tiene permisos
        else if (!in_array($_SESSION['role_id'], $GLOBALS['libro']['editar'])) {
            // Genero mensaje
            $_SESSION['mensaje_error'] = 'Acceso denegado. No tiene permisos suficientes.';
            // redireciona al login
            header('location:' . URL . 'libro');
            exit();
        }


        $this->view->id = htmlspecialchars($param[0]);

        //Obtengo el token CSRF
        $this->view->csrf_token = $param[1];

        // Validación CSRF
        if (!hash_equals($_SESSION['csrf_token'], $this->view->csrf_token)) {
            require_once 'controllers/error.php';
            $controller = new Errores("Petición no válida");
            exit();
        }

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

        // title
        $this->view->title = "Formulario Editar - Gestión de libros";

        // obtener objeto de la clase libro con el id pasado
        // Necesito crear el método read en el modelo
        $this->view->libro = $this->model->read($this->view->id);

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


        // inicio o continuo la sesión
        session_start();

        // Comprobar si hay usuario logueado
        if (!isset($_SESSION['user_id'])) {
            // Genero mensaje de error
            $_SESSION['mensaje_error'] = 'Acceso denegado.';
            // redireciona al login
            header('location:' . URL . 'auth/login');
            exit();
        }
        // Comprobar si el usuario tiene permisos
        else if (!in_array($_SESSION['role_id'], $GLOBALS['libro']['editar'])) {
            // Genero mensaje
            $_SESSION['mensaje_error'] = 'Acceso denegado. No tiene permisos suficientes.';
            // redireciona al login
            header('location:' . URL . 'libro');
            exit();
        }

        // Obtengo el id del libro
        $id = htmlspecialchars($param[0]);

        //Obtengo el token CSRF
        $csrf_token = $param[1];

        // Validación CSRF
        if (!hash_equals($_SESSION['csrf_token'], $csrf_token)) {
            require_once 'controllers/error.php';
            $controller = new Errores("Petición no válida");
            exit();
        }

        // Recogemos los detalles del formulario
        $titulo = filter_var($_POST['titulo'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $autor_id = filter_var($_POST['autor_id'] ??= '', FILTER_SANITIZE_NUMBER_INT);
        $editorial_id = filter_var($_POST['editorial_id'] ??= '', FILTER_SANITIZE_NUMBER_INT);
        $precio = filter_var($_POST['precio'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $unidades =  filter_var($_POST['unidades'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $fecha_edicion =  filter_var($_POST['fecha_edicion'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $isbn =  filter_var($_POST['isbn'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $generos_id = $_POST['generos_id'] ?? [];

        // Creo un objeto de la clase libro
        $libro_form = new classLibro(
            null,
            $titulo,
            $autor_id,
            $editorial_id,
            $precio,
            $unidades,
            $fecha_edicion,
            $isbn,
            $generos_id
        );

        // Obtengo el libro de la base de datos
        $libro = $this->model->read($id);

        // Validación de los datos
        // Valido en caso de que haya sufrido modificaciones el campo correspondiente
        $error = [];

        // Validación del título
        // Reglas: obligatorio
        if (strcmp($titulo, $libro->titulo) !== 0) {
            if (empty($titulo)) {
                $error['titulo'] = 'El título es obligatorio';
            }
        }

        // Validación del autor
        // Reglas: obligatorio, clave foránea
        if (strcmp($autor_id, $libro->autor_id) !== 0) {
            if (empty($autor_id)) {
                $error['autor_id'] = 'El autor es obligatorio';
            } else if (!filter_var($autor_id, FILTER_VALIDATE_INT)) {
                $error['autor_id'] = 'El formato del autor no es correcto';
            } else if (!$this->model->validateForeignKeyAutor($autor_id)) {
                $error['autor_id'] = 'El autor no existe';
            }
        }

        // Validación de la editorial
        // Reglas: obligatorio, clave foránea
        if (strcmp($editorial_id, $libro->editorial_id) !== 0) {
            if (empty($editorial_id)) {
                $error['editorial_id'] = 'La editorial es obligatoria';
            } else if (!filter_var($editorial_id, FILTER_VALIDATE_INT)) {
                $error['editorial_id'] = 'El formato de la editorial no es correcto';
            } else if (!$this->model->validateForeignKeyEditorial($editorial_id)) {
                $error['editorial_id'] = 'La editorial no existe';
            }
        }

        // Validación del precio
        // Reglas: obligatorio, formato numérico
        if (strcmp($precio, $libro->precio) !== 0) {
            if (empty($precio)) {
                $error['precio'] = 'El precio es obligatorio';
            } else if (!filter_var($precio, FILTER_VALIDATE_FLOAT)) {
                $error['precio'] = 'El formato del precio no es correcto';
            }
        }

        // Validación de las unidades
        // Reglas: No obligatorio

        // Validación de la fecha de edición
        // Reglas: obligatorio, formato fecha
        if (strcmp($fecha_edicion, $libro->fecha_edicion) !== 0) {
            if (empty($fecha_edicion)) {
                $error['fecha_edicion'] = 'La fecha de edición es obligatoria';
            } else {
                $fecha = DateTime::createFromFormat('Y-m-d', $fecha_edicion);
                if (!$fecha) {
                    $error['fecha_edicion'] = 'El formato de la fecha de edición no es correcto';
                }
            }
        }

        // Validación del ISBN
        // Reglas: obligatorio, formato ISBN, clave secundaria
        if (strcmp($isbn, $libro->isbn) !== 0) {
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
        }

        // Validación de los géneros
        // Reglas: obligatorio, clave foránea siendo generos_id un array
        if ($generos_id !== $libro->generos_id) {
            if (empty($generos_id)) {
                $error['generos_id'] = 'Tienes que seleccionar al menos un género';
            }
        }

        // Si hay errores
        if (!empty($error)) {

            // Creo la variable de sesión libro
            $_SESSION['libro'] = $libro_form;

            // Creo la variable de sesión error
            $_SESSION['error'] = $error;

            // Redirecciono al formulario de nuevo libro
            header('location:' . URL . 'libro/editar/' . $id . '/' . $csrf_token);

            // Salgo de la función
            exit();
        }

        // Actualizo base  de datos
        // Necesito crear el método update en el modelo
        $this->model->update($libro_form, $id);

        // Genero mensaje de éxito
        $_SESSION['mensaje'] = 'Libro actualizado con éxito';

        // Cargo el controlador principal de libro
        header('location:' . URL . 'libro');

        exit();
    }

    /*
        Método eliminar()

        Borra un libro de la base de datos
    */
    public function eliminar($param = [])
    {

        // inicio o continuo la sesión
        session_start();

        // Comprobar si hay usuario logueado
        if (!isset($_SESSION['user_id'])) {
            // Genero mensaje de error
            $_SESSION['mensaje_error'] = 'Acceso denegado.';
            // redireciona al login
            header('location:' . URL . 'auth/login');
            exit();
        }
        // Comprobar si el usuario tiene permisos
        else if (!in_array($_SESSION['role_id'], $GLOBALS['libro']['eliminar'])) {
            // Genero mensaje
            $_SESSION['mensaje_error'] = 'Acceso denegado. No tiene permisos suficientes.';
            // redireciona al login
            header('location:' . URL . 'libro');
            exit();
        }

        // Obtengo el id del libro
        $id = htmlspecialchars($param[0]);

        //Obtengo el token CSRF
        $csrf_token = $param[1];

        // Validación CSRF
        if (!hash_equals($_SESSION['csrf_token'], $csrf_token)) {
            require_once 'controllers/error.php';
            $controller = new Errores("Petición no válida");
            exit();
        }

        // Validar el id del libro
        if (!$this->model->validateIdLibro($id)) {
            // Genero mensaje de error
            $_SESSION['error'] = 'El id del libro no es correcto';

            // redireciona al main de libro
            header('location:' . URL . 'libro');
            exit();
        }

        // Elimino libro de la base de datos
        // Necesito crear el método delete en el modelo
        $this->model->delete($id);

        // Genero mensaje de éxito
        $_SESSION['mensaje'] = 'Libro eliminado con éxito';

        // Cargo el controlador principal de libro
        header('location:' . URL . 'libro');
    }

    /*
        Método mostrar()

        Muestra los detalles de un libro
    */
    public function mostrar($param = [])
    {

        // inicio o continuo la sesión
        session_start();

        // Comprobar si hay usuario logueado
        if (!isset($_SESSION['user_id'])) {
            // Genero mensaje de error
            $_SESSION['mensaje_error'] = 'Acceso denegado.';
            // redireciona al login
            header('location:' . URL . 'auth/login');
            exit();
        }
        // Comprobar si el usuario tiene permisos
        else if (!in_array($_SESSION['role_id'], $GLOBALS['libro']['mostrar'])) {
            // Genero mensaje
            $_SESSION['mensaje_error'] = 'Acceso denegado. No tiene permisos suficientes.';
            // redireciona al login
            header('location:' . URL . 'libro');
            exit();
        }

        // Obtengo el id del libro
        $id = htmlspecialchars($param[0]);

        //Obtengo el token CSRF
        $csrf_token = $param[1];

        // Validación CSRF
        if (!hash_equals($_SESSION['csrf_token'], $csrf_token)) {
            require_once 'controllers/error.php';
            $controller = new Errores("Petición no válida");
            exit();
        }

        // Validar el id del libro
        if (!$this->model->validateIdLibro($id)) {
            // Genero mensaje de error
            $_SESSION['error'] = 'El id del libro no es correcto';

            // redireciona al main de libro
            header('location:' . URL . 'libro');
            exit();
        }


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

        // inicio o continuo la sesión
        session_start();

        // Comprobar si hay usuario logueado
        if (!isset($_SESSION['user_id'])) {
            // Genero mensaje de error
            $_SESSION['mensaje_error'] = 'Acceso denegado.';
            // redireciona al login
            header('location:' . URL . 'auth/login');
            exit();
        }
        // Comprobar si el usuario tiene permisos
        else if (!in_array($_SESSION['role_id'], $GLOBALS['libro']['filtrar'])) {
            // Genero mensaje
            $_SESSION['mensaje_error'] = 'Acceso denegado. No tiene permisos suficientes.';
            // redireciona al login
            header('location:' . URL . 'libro');
            exit();
        }

        # Obtengo la expresión de búsqueda
        $expresion = htmlspecialchars($_GET['expresion']);

        // Obtengo el token CSRF
        $csrf_token = htmlspecialchars($_GET['csrf_token']);

        // Cargo el título
        $this->view->title = "Filtrar por: {$expresion} - Gestión de libros";

        // Creo la propiedad libros para usar en la vista
        $this->view->libros = $this->model->filter($expresion);

        // Cargo la vista
        $this->view->render('libro/main/index');
    }

    /*
        Método ordenar()

        Ordena los libros de la base de datos
    */
    public function ordenar($param = [])
    {

        // inicio o continuo la sesión
        session_start();

        // Comprobar si hay usuario logueado
        if (!isset($_SESSION['user_id'])) {
            // Genero mensaje de error
            $_SESSION['mensaje_error'] = 'Acceso denegado.';
            // redireciona al login
            header('location:' . URL . 'auth/login');
            exit();
        }
        // Comprobar si el usuario tiene permisos
        else if (!in_array($_SESSION['role_id'], $GLOBALS['libro']['ordenar'])) {
            // Genero mensaje
            $_SESSION['mensaje_error'] = 'Acceso denegado. No tiene permisos suficientes.';
            // redireciona al login
            header('location:' . URL . 'libro');
            exit();
        }

        // Obtengo el id del libro
        $id = (int) htmlspecialchars($param[0]);


        //Obtengo el token CSRF
        $csrf_token = $param[1];

        // Validación CSRF
        if (!hash_equals($_SESSION['csrf_token'], $csrf_token)) {
            require_once 'controllers/error.php';
            $controller = new Errores("Petición no válida");
            exit();
        }

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

        # Obtengo los libros ordenados por el campo id
        $this->view->libros = $this->model->order($id);

        // Cargo la vista
        $this->view->render('libro/main/index');
    }

    /*
        Método exportar()

        Permite exportar los libros a un archivo CSV

        url asociada: /libro/exportar/csv

        @param
            :string $format: formato de exportación
    */
    public function exportar($param = [])
    {
        // inicio o continuo la sesión
        session_start();

        // Validar token
        $this->checkTokenCsrf($param[1]);

        // Comprobar si hay un usuario logueado
        $this->checkLogin();

        // Comprobar si el usuario tiene permisos
        $this->checkPermissions($GLOBALS['libro']['exportar']);

        // Obtener formato
        // en nuestro caso no haría falta puesto que solo tenemos disponible csv
        $formato = $param[0];

        // Obtener libros
        $libros = $this->model->get_csv();

        // Crear archivo CSV
        $file = 'libros.csv';

        // Limpiar buffer antes de enviar headers
        if (ob_get_length()) ob_clean();

        // Enviamos las cabeceras al navegador para empezar a descargar el archivo
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=' . $file);
        header('Pragma: no-cache');
        header('Expires: 0');

        // Abrimos el archivo csv, con permisos de escritura
        $fichero = fopen('php://output', 'w');

        // Escribir BOM UTF-8 para compatibilidad con Excel
        fprintf($fichero, chr(0xEF) . chr(0xBB) . chr(0xBF));

        // Escribimos los datos del fichero csv
        foreach ($libros as $libro) {
            fputcsv($fichero, $libro, ';');
        }
        // Cerramos el fichero
        fclose($fichero);

        // Cerramos el buffer de salida y enviamos al cliente el archivo csv
        ob_end_flush();
        exit;
    }

    /*
        Método importar()

        Permite importar los libros desde un archivo CSV

        url asociada: /libro/importar/csv

        @param
            :string $format: formato de importación
    */
    public function importar($param = [])
    {
        // inicio o continuo la sesión
        session_start();

        // Validar token
        $this->checkTokenCsrf($param[1]);

        // Comprobar si hay un usuario logueado
        $this->checkLogin();

        // Comprobar si el usuario tiene permisos
        $this->checkPermissions($GLOBALS['libro']['importar']);

        // Comrpuebo si hay errores en la validación
        if (isset($_SESSION['mensaje_error'])) {

            // Creo la propiedad mensaje de error
            $this->view->mensaje_error = $_SESSION['mensaje_error'];

            // Elimino la variable de sesión error
            unset($_SESSION['mensaje_error']);
        }

        // Generar propiedad title
        $this->view->title = "Importar Libros desde fichero CSV";

        // Cargar la vista
        $this->view->render('libro/importar/index');
    }

    public function validar($param = [])
    {
        // inicio o continuo la sesión
        session_start();

        // Validar token
        $this->checkTokenCsrf($_POST['csrf_token']);

        // Comprobar si hay un usuario logueado
        $this->checkLogin();

        // Comprobar si el usuario tiene permisos
        $this->checkPermissions($GLOBALS['libro']['importar']);

        // Comprobar si se ha subido un archivo
        if (!isset($_FILES['file'])) {
            $_SESSION['mensaje_error'] = 'No se ha subido ningún archivo';
            header('location:' . URL . 'libro/importar/csv/' . $_POST['csrf_token']);
            exit();
        }

        // Comprobar si el archivo se ha subido correctamente
        if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
            $_SESSION['mensaje_error'] = 'Error al subir el archivo';
            header('location:' . URL . 'libro/importar/csv/' . $_POST['csrf_token']);
            exit();
        }

        // Verificar la extensión del archivo
        $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        if ($extension !== 'csv') {
            $_SESSION['mensaje_error'] = "El archivo debe tener extensión .csv";
            header('location:' . URL . 'libro/importar/csv/' . $_POST['csrf_token']);
            exit;
        }



        // Comprobar si el archivo es válido
        $file = $_FILES['file']['tmp_name'];

        // Abrir el archivo
        $fichero = fopen($file, 'r');

        // Leer el archivo
        $libros = [];

        while (($linea = fgetcsv($fichero, 0, ';')) !== FALSE) {
            $libros[] = $linea;

            // Validar titulo
            if (empty($linea[0])) {
                $_SESSION['mensaje_error'] = 'Línea ' . $contador_linea . ': El título no puede ser nulo';
                header('location:' . URL . 'libro/importar/csv/' . $_POST['csrf_token']);
                exit();
            }

            // Validar isbn
            $options = [
                'options' => [
                    'regexp' => '/^\d{13}$/'
                ]
            ];

            if (empty($linea[4])) {
                $_SESSION['mensaje_error'] = 'Línea ' . $contador_linea . ': El isbn no puede ser nulo';
                header('location:' . URL . 'libro/importar/csv/' . $_POST['csrf_token']);
                exit();
            } elseif (!filter_var($linea[4], FILTER_VALIDATE_REGEXP, $options)) {
                $_SESSION['mensaje_error'] = 'Línea ' . $contador_linea . ': El ISBN debe tener exactamente 13 dígitos';
                header('location:' . URL . 'libro/importar/csv/' . $_POST['csrf_token']);
                exit();
            } elseif (!$this->model->validateUniqueISBN($linea[4])) {
                $_SESSION['mensaje_error'] = 'Línea ' . $contador_linea . ': El ISBN ya existe';
                header('location:' . URL . 'libro/importar/csv/' . $_POST['csrf_token']);
                exit();
            }

            // Validar autor_id
            // Obtener nombre del autor desde la línea
            $nombre_autor = $linea[5]; // Nombre del autor (no ID)

            // Obtener ID del autor desde la base de datos
            $autor_id = $this->model->getAutorIdByName($nombre_autor);

            // Verificar si el autor existe y obtener su ID
            if (!$autor_id) {
                $_SESSION['mensaje_error'] = 'Línea ' . $contador_linea . ': El autor "' . $nombre_autor . '" no existe';
                header('location:' . URL . 'libro/importar/csv/' . $_POST['csrf_token']);
                exit();
            }

            // Validar el ID del autor
            if (!$this->model->validateForeignKeyAutor($autor_id)) {
                $_SESSION['mensaje_error'] = 'Línea ' . $contador_linea . ': El id del autor no existe';
                header('location:' . URL . 'libro/importar/csv/' . $_POST['csrf_token']);
                exit();
            }


            // Obtener nombre de la editorial desde la línea
            $nombre_editorial = $linea[6]; // Nombre de la editorial (no ID)

            // Obtener ID de la editorial desde la base de datos
            $editorial_id = $this->model->getEditorialIdByName($nombre_editorial);

            // Verificar si la editorial existe y obtener su ID
            if (!$editorial_id) {
                $_SESSION['mensaje_error'] = 'Línea ' . $contador_linea . ': La editorial "' . $nombre_editorial . '" no existe';
                header('location:' . URL . 'libro/importar/csv/' . $_POST['csrf_token']);
                exit();
            }

            // Validar el ID de la editorial
            if (!$this->model->validateForeignKeyEditorial($editorial_id)) {
                $_SESSION['mensaje_error'] = 'Línea ' . $contador_linea . ': El id de la editorial no existe';
                header('location:' . URL . 'libro/importar/csv/' . $_POST['csrf_token']);
                exit();
            }


            // Obtener la lista de géneros desde la línea (suponiendo que están separados por comas)
            $generos = explode(',', $linea[7]); // Convierte la cadena en un array de géneros

            // Recorrer cada género
            foreach ($generos as $genero) {
                $genero = trim($genero); // Elimina espacios al principio y al final del género

                // Obtener ID del género desde la base de datos
                $genero_id = $this->model->getGeneroIdByName($genero);

                // Verificar si el género existe y obtener su ID
                if (!$genero_id) {
                    $_SESSION['mensaje_error'] = 'Línea ' . $contador_linea . ': El género "' . $genero . '" no existe';
                    header('location:' . URL . 'libro/importar/csv/' . $_POST['csrf_token']);
                    exit();
                }

                // Validar el ID del género
                if (!$this->model->validateForeignKeyGenero($genero_id)) {
                    $_SESSION['mensaje_error'] = 'Línea ' . $contador_linea . ': El id del género "' . $genero . '" no existe';
                    header('location:' . URL . 'libro/importar/csv/' . $_POST['csrf_token']);
                    exit();
                }
            }


            // Cerrar el archivo
            fclose($fichero);

            // Importar los libros
            $count = $this->model->import($libros);

            // Genero mensaje de éxito
            $_SESSION['mensaje'] = $count . ' Libros importados con éxito';

            // redireciona al main de libro
            header('location:' . URL . 'libro');
            exit();
        }
    }

    public function pdf($param = [])
    {
        // inicio o continuo la sesión
        session_start();

        // Validar token
        $this->checkTokenCsrf($param[0]);

        // Comprobar si hay un usuario logueado
        $this->checkLogin();

        // Comprobar si el usuario tiene permisos
        $this->checkPermissions($GLOBALS['libro']['pdf']);


        $libros = $this->model->get();

        // Creo objeto pdf_libros
        $pdf = new Pdf_libros('P', 'mm', 'A4');

        // Imprimir número página actual
        $pdf->AliasNbPages();

        // Añadimos una página
        $pdf->AddPage();

        // Añado el título
        $pdf->titulo();

        // Cabecera del listado
        $pdf->cabecera();

        // Cuerpo listado
        $pdf->SetFont('Courier', '', 8);
        // Fondo pautado para las líneas pares
        $pdf->SetFillColor(205, 205, 205);

        $fondo = false;
        // Escribimos los datos de los libros
        foreach ($libros as $libro) {
            $pdf->Cell(5, 8, iconv('UTF-8', 'ISO-8859-1', $libro->id), 1, 0, 'C', $fondo);
            $pdf->Cell(60, 8, iconv('UTF-8', 'ISO-8859-1//IGNORE', $libro->titulo), 1, 0, 'L', $fondo);
            $pdf->Cell(40, 8, iconv('UTF-8', 'ISO-8859-1', $libro->autor), 1, 0, 'L', $fondo);
            $pdf->Cell(50, 8, iconv('UTF-8', 'ISO-8859-1', $libro->editorial), 1, 0, 'L', $fondo);
            $pdf->Cell(15, 8, iconv('UTF-8', 'ISO-8859-1', $libro->stock), 1, 0, 'R', $fondo);
            $pdf->Cell(15, 8, iconv('UTF-8', 'ISO-8859-1', $libro->precio ), 1, 1, 'R', $fondo);
            $fondo = !$fondo;
        }


        // Cerramos pdf
        $pdf->Output('I', 'listado_libros.pdf', true);
    }
}
