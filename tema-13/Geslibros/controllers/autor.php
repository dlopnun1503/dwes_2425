<?php

require_once 'class/autor.class.php';


class Autor extends Controller
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
            header('location:' . URL . 'autor');
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

        url: /autor
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

        else if (!in_array($_SESSION['role_id'], $GLOBALS['autor']['main'])) {

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
        $this->view->title = "Gestión de Autores";

        // Creo la propiedad autores para usar en la vista
        $this->view->autores = $this->model->get();

        $this->view->render('autor/main/index');
    }

    /*
        Método nuevo()

        Muestra el formulario que permite añadir nuevo autor

        url asociada: /autor/nuevo
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
        else if (!in_array($_SESSION['role_id'], $GLOBALS['autor']['nuevo'])) {
            // Genero mensaje
            $_SESSION['mensaje_error'] = 'Acceso denegado. No tiene permisos suficientes.';
            // redireciona al login
            header('location:' . URL . 'autor');
            exit();
        }

        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

        // Crear un objeto vacío de la clase autor
        $this->view->autor = new classAutor();

        // Comrpuebo si hay errores en la validación
        if (isset($_SESSION['error'])) {

            // Creo la propiedad error en la vista
            $this->view->error = $_SESSION['error'];

            // Creo la propiedad autor en la vista
            $this->view->autor = $_SESSION['autor'];

            // Creo la propiedad mensaje de error
            $this->view->mensaje_error = 'Error en el formulario';

            // Elimino la variable de sesión error
            unset($_SESSION['error']);

            // Elimino la variable de sesión autor
            unset($_SESSION['autor']);
        }

        // Creo la propiead título
        $this->view->title = "Añadir - Gestión de autores";

        // Cargo la vista asociada a este método
        $this->view->render('autor/nuevo/index');
    }

    /*
        Método create()

        Permite añadir nuevo autor al formulario
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
        else if (!in_array($_SESSION['role_id'], $GLOBALS['autor']['nuevo'])) {
            // Genero mensaje
            $_SESSION['mensaje_error'] = 'Acceso denegado. No tiene permisos suficientes.';
            // redireciona al login
            header('location:' . URL . 'autor');
            exit();
        }

        // Validación CSRF
        if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
            die('Petición no válida');
        }

        // Recogemos los detalles del formulario
        $nombre = filter_var($_POST['nombre'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $nacionalidad = filter_var($_POST['nacionalidad'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'] ??= '', FILTER_SANITIZE_EMAIL);
        $fecha_nac = filter_var($_POST['fecha_nac'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $fecha_def = filter_var($_POST['fecha_def'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $premios = filter_var($_POST['premios'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);

        // Creamos un objeto de la clase autor
        $autor = new classAutor(
            null,
            $nombre,
            $nacionalidad,
            $email,
            $fecha_nac,
            $fecha_def,
            $premios
        );


        // Validación de los datos

        // Creo un array para almacenar los errores
        $error = [];

        // Validación del nombre
        // Reglas: obligatorio
        if (empty($nombre)) {
            $error['nombre'] = 'El nombre es obligatorio';
        }

        // Validación de la nacionalidad
        // Reglas: obligatorio
        if (empty($nacionalidad)) {
            $error['nacionalidad'] = 'La nacionalidad es obligatoria';
        }

        // Validación del email
        // Reglas: obligatorio, formato email
        if (empty($email)) {
            $error['email'] = 'El email es obligatorio';
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = 'El formato del email no es correcto';
        }

        // Validación de la fecha de nacimiento
        // Reglas: obligatorio, formato fecha
        if (empty($fecha_nac)) {
            $error['fecha_nac'] = 'La fecha de nacimiento es obligatoria';
        } else {
            $fecha = DateTime::createFromFormat('Y-m-d', $fecha_nac);
            if (!$fecha) {
                $error['fecha_nac'] = 'El formato de la fecha de nacimiento no es correcto';
            }
        }

        // Validación de la fecha de defunción
        // Reglas: No obligatorio, formato fecha
        if (!empty($fecha_def)) {
            $fecha = DateTime::createFromFormat('Y-m-d', $fecha_def);
            if (!$fecha) {
                $error['fecha_def'] = 'El formato de la fecha de defunción no es correcto';
            }
        }

        // Validación de los premios
        // Reglas: No obligatorio


        // Si hay errores
        if (!empty($error)) {

            // Creo la variable de sesión autor
            $_SESSION['autor'] = $autor;

            // Creo la variable de sesión error
            $_SESSION['error'] = $error;

            // Redirecciono al formulario de nuevo autor
            header('location:' . URL . 'autor/nuevo');

            // Salgo de la función
            exit();
        }


        // Añadimos autor a la tabla
        $this->model->create($autor);

        // redireciona al main de autor
        header('location:' . URL . 'autor');
        exit();
    }

    /*
        Método editar()

        Muestra el formulario que permite editar los detalles de un autor

        url asociada: /autor/editar/id/csrf_token

        @param
            - int $id: id del autor a editar
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
        else if (!in_array($_SESSION['role_id'], $GLOBALS['autor']['editar'])) {
            // Genero mensaje
            $_SESSION['mensaje_error'] = 'Acceso denegado. No tiene permisos suficientes.';
            // redireciona al login
            header('location:' . URL . 'autor');
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

            // Creo la propiedad autor en la vista
            $this->view->autor = $_SESSION['autor'];

            // Creo la propiedad mensaje de error
            $this->view->mensaje_error = 'Error en el formulario';

            // Elimino la variable de sesión error
            unset($_SESSION['error']);

            // Elimino la variable de sesión autor
            unset($_SESSION['autor']);
        }

        // title
        $this->view->title = "Formulario Editar - Gestión de autores";

        // obtener objeto de la clase autor con el id pasado
        // Necesito crear el método read en el modelo
        $this->view->autor = $this->model->read($this->view->id);

        // cargo la vista
        $this->view->render('autor/editar/index');
    }

    /*
        Método update()

        Actualiza los detalles de un autor
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
        else if (!in_array($_SESSION['role_id'], $GLOBALS['autor']['editar'])) {
            // Genero mensaje
            $_SESSION['mensaje_error'] = 'Acceso denegado. No tiene permisos suficientes.';
            // redireciona al login
            header('location:' . URL . 'autor');
            exit();
        }

        // Obtengo el id del autor
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
        $nombre = filter_var($_POST['nombre'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $nacionalidad = filter_var($_POST['nacionalidad'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'] ??= '', FILTER_SANITIZE_EMAIL);
        $fecha_nac = filter_var($_POST['fecha_nac'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $fecha_def = filter_var($_POST['fecha_def'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $premios = filter_var($_POST['premios'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);

        // Creamos un objeto de la clase autor
        $autor = new classAutor(
            null,
            $nombre,
            $nacionalidad,
            $email,
            $fecha_nac,
            $fecha_def,
            $premios
        );

        // Obtengo el autor de la base de datos
        $autor = $this->model->read($id);

        // Validación de los datos
        // Valido en caso de que haya sufrido modificaciones el campo correspondiente
        $error = [];

        // Validación del nombre
        // Reglas: obligatorio
        if (empty($nombre)) {
            $error['nombre'] = 'El nombre es obligatorio';
        }

        // Validación de la nacionalidad
        // Reglas: obligatorio
        if (empty($nacionalidad)) {
            $error['nacionalidad'] = 'La nacionalidad es obligatoria';
        }

        // Validación del email
        // Reglas: obligatorio, formato email
        if (empty($email)) {
            $error['email'] = 'El email es obligatorio';
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = 'El formato del email no es correcto';
        }

        // Validación de la fecha de nacimiento
        // Reglas: obligatorio, formato fecha
        if (empty($fecha_nac)) {
            $error['fecha_nac'] = 'La fecha de nacimiento es obligatoria';
        } else {
            $fecha = DateTime::createFromFormat('Y-m-d', $fecha_nac);
            if (!$fecha) {
                $error['fecha_nac'] = 'El formato de la fecha de nacimiento no es correcto';
            }
        }

        // Validación de la fecha de defunción
        // Reglas: No obligatorio, formato fecha
        if (!empty($fecha_def)) {
            $fecha = DateTime::createFromFormat('Y-m-d', $fecha_def);
            if (!$fecha) {
                $error['fecha_def'] = 'El formato de la fecha de defunción no es correcto';
            }
        }

        // Validación de los premios
        // Reglas: No obligatorio


        // Si hay errores
        if (!empty($error)) {

            // Creo la variable de sesión autor
            $_SESSION['autor'] = $autor_form;

            // Creo la variable de sesión error
            $_SESSION['error'] = $error;

            // Redirecciono al formulario de nuevo autor
            header('location:' . URL . 'autor/editar/' . $id . '/' . $csrf_token);

            // Salgo de la función
            exit();
        }

        // Actualizo base  de datos
        // Necesito crear el método update en el modelo
        $this->model->update($autor_form, $id);

        // Genero mensaje de éxito
        $_SESSION['mensaje'] = 'Autor actualizado con éxito';

        // Cargo el controlador principal de autor
        header('location:' . URL . 'autor');

        exit();
    }

    /*
        Método eliminar()

        Borra un autor de la base de datos
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
        else if (!in_array($_SESSION['role_id'], $GLOBALS['autor']['eliminar'])) {
            // Genero mensaje
            $_SESSION['mensaje_error'] = 'Acceso denegado. No tiene permisos suficientes.';
            // redireciona al login
            header('location:' . URL . 'autor');
            exit();
        }

        // Obtengo el id del autor
        $id = htmlspecialchars($param[0]);

        //Obtengo el token CSRF
        $csrf_token = $param[1];

        // Validación CSRF
        if (!hash_equals($_SESSION['csrf_token'], $csrf_token)) {
            require_once 'controllers/error.php';
            $controller = new Errores("Petición no válida");
            exit();
        }

        // Validar el id del autor
        if (!$this->model->validateIdAutor($id)) {
            // Genero mensaje de error
            $_SESSION['error'] = 'El id del autor no es correcto';

            // redireciona al main de autor
            header('location:' . URL . 'autor');
            exit();
        }

        // Elimino autor de la base de datos
        // Necesito crear el método delete en el modelo
        $this->model->delete($id);

        // Genero mensaje de éxito
        $_SESSION['mensaje'] = 'Autor eliminado con éxito';

        // Cargo el controlador principal de autor
        header('location:' . URL . 'autor');
    }

    /*
        Método mostrar()

        Muestra los detalles de un autor
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
        else if (!in_array($_SESSION['role_id'], $GLOBALS['autor']['mostrar'])) {
            // Genero mensaje
            $_SESSION['mensaje_error'] = 'Acceso denegado. No tiene permisos suficientes.';
            // redireciona al login
            header('location:' . URL . 'autor');
            exit();
        }

        // Obtengo el id del autor
        $id = htmlspecialchars($param[0]);

        //Obtengo el token CSRF
        $csrf_token = $param[1];

        // Validación CSRF
        if (!hash_equals($_SESSION['csrf_token'], $csrf_token)) {
            require_once 'controllers/error.php';
            $controller = new Errores("Petición no válida");
            exit();
        }

        // Validar el id del autor
        if (!$this->model->validateIdAutor($id)) {
            // Genero mensaje de error
            $_SESSION['error'] = 'El id del autor no es correcto';

            // redireciona al main de autor
            header('location:' . URL . 'autor');
            exit();
        }


        // Cargo el título
        $this->view->title = "Mostrar - Gestión de autores";

        // Obtengo los detalles del autor mediante el método read del modelo
        $autor = $this->model->read($id);

        $this->view->autor = $autor;

        // Cargo la vista
        $this->view->render('autor/mostrar/index');
    }

    /*
        Método filtrar()

        Busca un autor en la base de datos
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
        else if (!in_array($_SESSION['role_id'], $GLOBALS['autor']['filtrar'])) {
            // Genero mensaje
            $_SESSION['mensaje_error'] = 'Acceso denegado. No tiene permisos suficientes.';
            // redireciona al login
            header('location:' . URL . 'autor');
            exit();
        }

        # Obtengo la expresión de búsqueda
        $expresion = htmlspecialchars($_GET['expresion']);

        // Obtengo el token CSRF
        $csrf_token = htmlspecialchars($_GET['csrf_token']);

        // Cargo el título
        $this->view->title = "Filtrar por: {$expresion} - Gestión de autores";

        // Creo la propiedad autores para usar en la vista
        $this->view->autores = $this->model->filter($expresion);

        // Cargo la vista
        $this->view->render('autor/main/index');
    }

    /*
        Método ordenar()

        Ordena los autores de la base de datos
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
        else if (!in_array($_SESSION['role_id'], $GLOBALS['autor']['ordenar'])) {
            // Genero mensaje
            $_SESSION['mensaje_error'] = 'Acceso denegado. No tiene permisos suficientes.';
            // redireciona al login
            header('location:' . URL . 'autor');
            exit();
        }

        // Obtengo el id del autor
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
            2 => 'Nombre',
            3 => 'Nacionalidad',
            4 => 'Email',
            5 => 'Fecha Nacimiento',
            6 => 'Fecha Defunción',
            7 => 'Premios'
        ];

        // Obtengo el id del campo por el que se ordenarán los autores
        $id = $param[0];


        // Cargo el título
        $this->view->title = "Ordenar por {$criterios[$id]} - Gestión de autores";

        # Obtengo los autores ordenados por el campo id
        $this->view->autores = $this->model->order($id);

        // Cargo la vista
        $this->view->render('autor/main/index');
    }

    /*
        Método exportar()

        Permite exportar los autores a un archivo CSV

        url asociada: /autor/exportar/csv

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
        $this->checkPermissions($GLOBALS['autor']['exportar']);

        // Obtener formato
        // en nuestro caso no haría falta puesto que solo tenemos disponible csv
        $formato = $param[0];

        // Obtener autores
        $autores = $this->model->get_csv();

        // Crear archivo CSV
        $file = 'autores.csv';

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
        foreach ($autores as $autor) {
            fputcsv($fichero, $autor, ';');
        }
        // Cerramos el fichero
        fclose($fichero);

        // Cerramos el buffer de salida y enviamos al cliente el archivo csv
        ob_end_flush();
        exit;
    }

    /*
        Método importar()

        Permite importar los autores desde un archivo CSV

        url asociada: /autor/importar/csv

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
        $this->checkPermissions($GLOBALS['autor']['importar']);

        // Comrpuebo si hay errores en la validación
        if (isset($_SESSION['mensaje_error'])) {

            // Creo la propiedad mensaje de error
            $this->view->mensaje_error = $_SESSION['mensaje_error'];

            // Elimino la variable de sesión error
            unset($_SESSION['mensaje_error']);
        }

        // Generar propiedad title
        $this->view->title = "Importar Autores desde fichero CSV";

        // Cargar la vista
        $this->view->render('autor/importar/index');
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
        $this->checkPermissions($GLOBALS['autor']['importar']);

        // Comprobar si se ha subido un archivo
        if (!isset($_FILES['file'])) {
            $_SESSION['mensaje_error'] = 'No se ha subido ningún archivo';
            header('location:' . URL . 'autor/importar/csv/' . $_POST['csrf_token']);
            exit();
        }

        // Comprobar si el archivo se ha subido correctamente
        if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
            $_SESSION['mensaje_error'] = 'Error al subir el archivo';
            header('location:' . URL . 'autor/importar/csv/' . $_POST['csrf_token']);
            exit();
        }

        // Verificar la extensión del archivo
        $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        if ($extension !== 'csv') {
            $_SESSION['mensaje_error'] = "El archivo debe tener extensión .csv";
            header('location:' . URL . 'autor/importar/csv/' . $_POST['csrf_token']);
            exit;
        }



        // Comprobar si el archivo es válido
        $file = $_FILES['file']['tmp_name'];

        // Abrir el archivo
        $fichero = fopen($file, 'r');

        // Leer el archivo
        $autores = [];

        while (($linea = fgetcsv($fichero, 0, ';')) !== FALSE) {
            $autores[] = $linea;

            // Validar ID
            if (empty($id) || !filter_var($id, FILTER_VALIDATE_INT)) {
                $_SESSION['mensaje_error'] = 'El ID del autor no es válido';
                header('location:' . URL . 'autor/importar/csv/' . $_POST['csrf_token']);
                exit();
            }

            // Validar nombre
            if (empty($nombre)) {
                $_SESSION['mensaje_error'] = 'El nombre no puede ser nulo';
                header('location:' . URL . 'autor/importar/csv/' . $_POST['csrf_token']);
                exit();
            }

            // Validar email
            $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['mensaje_error'] = 'El email no es válido';
                header('location:' . URL . 'autor/importar/csv/' . $_POST['csrf_token']);
                exit();
            }

            // Validar existencia del autor por ID
            if (!$this->model->validateUniqueAuthorById($id)) {
                $_SESSION['mensaje_error'] = 'El autor con ID ' . $id . ' ya existe';
                header('location:' . URL . 'autor/importar/csv/' . $_POST['csrf_token']);
                exit();
            }



            // Cerrar el archivo
            fclose($fichero);

            // Importar los autores
            $count = $this->model->import($autores);

            // Genero mensaje de éxito
            $_SESSION['mensaje'] = $count . ' Autores importados con éxito';

            // redireciona al main de autor
            header('location:' . URL . 'autor');
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
        $this->checkPermissions($GLOBALS['autor']['pdf']);


        $autores = $this->model->get();

        // Creo objeto pdf_autores
        $pdf = new Pdf_autores('P', 'mm', 'A4');

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
        // Escribimos los datos de los autores
        foreach ($autores as $autor) {
            $pdf->Cell(5, 8, iconv('UTF-8', 'ISO-8859-1', $autor->id), 1, 0, 'C', $fondo);
            $pdf->Cell(40, 8, iconv('UTF-8', 'ISO-8859-1', $autor->nombre), 1, 0, 'L', $fondo);
            $pdf->Cell(30, 8, iconv('UTF-8', 'ISO-8859-1', $autor->nacionalidad), 1, 0, 'L', $fondo);
            $pdf->Cell(60, 8, iconv('UTF-8', 'ISO-8859-1', $autor->email), 1, 0, 'L', $fondo);
            $pdf->Cell(50, 8, iconv('UTF-8', 'ISO-8859-1', $autor->premios), 1, 1, 'R', $fondo);
            $fondo = !$fondo;
        }


        // Cerramos pdf
        $pdf->Output('I', 'listado_autores.pdf', true);
    }
}
