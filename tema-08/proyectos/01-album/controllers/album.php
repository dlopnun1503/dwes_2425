<?php

class Album extends Controller
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

        // Comprobar si hay usuario logueado
        if (!isset($_SESSION['user_id'])) {
            // Genero mensaje de error
            $_SESSION['mensaje_error'] = 'Acceso denegado.';
            // redireciona al login
            header('location:' . URL . 'auth/login');
            exit();
        }
        // Comprobar si el usuario tiene permisos
        else if (!in_array($_SESSION['role_id'], $GLOBALS['album']['main'])) {
            // Genero mensaje
            $_SESSION['mensaje_error'] = 'Acceso denegado. No tiene permisos suficientes.';
            // redireciona al login
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

        // compruebo si hay mensaje de error
        if (isset($_SESSION['mensaje_error'])) {

            // Creo la propiedad error en la vista
            $this->view->mensaje_error = $_SESSION['mensaje_error'];

            // Elimino la variable de sesión error
            unset($_SESSION['mensaje_error']);
        }


        // Creo la propiedad title de la vista
        $this->view->title = "Gestión de Albumes";

        // Creo la propiedad albumes para usar en la vista
        $this->view->albumes = $this->model->get();

        $this->view->render('album/main/index');
    }

    /*
        Método nuevo()

        Muestra el formulario que permite añadir nuevo album
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
        else if (!in_array($_SESSION['role_id'], $GLOBALS['album']['nuevo'])) {
            // Genero mensaje
            $_SESSION['mensaje_error'] = 'Acceso denegado. No tiene permisos suficientes.';
            // redireciona al login
            header('location:' . URL . 'album');
            exit();
        }

        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

        // Crear un objeto vacío de la clase album
        $this->view->album = new classAlbum();

        // Comrpuebo si hay errores en la validación
        if (isset($_SESSION['error'])) {

            // Creo la propiedad error en la vista
            $this->view->error = $_SESSION['error'];

            // Creo la propiedad album en la vista
            $this->view->album = $_SESSION['album'];

            // Creo la propiedad mensaje de error
            $this->view->mensaje_error = 'Error en el formulario';

            // Elimino la variable de sesión error
            unset($_SESSION['error']);

            // Elimino la variable de sesión album
            unset($_SESSION['album']);
        }

        // Creo la propiead título
        $this->view->title = "Añadir - Gestión de albumes";

        $this->view->categorias = $this->model->getCategorias();

        // Cargo la vista asociada a este método
        $this->view->render('album/nuevo/index');
    }

    /*
        Método create()

        Permite añadir nuevo album al formulario
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
    else if (!in_array($_SESSION['role_id'], $GLOBALS['album']['nuevo'])) {
        // Genero mensaje
        $_SESSION['mensaje_error'] = 'Acceso denegado. No tiene permisos suficientes.';
        // redireciona al login
        header('location:' . URL . 'album');
        exit();
    }

    // Validación CSRF
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die('Petición no válida');
    }

    // Recogemos los detalles del formulario
    $titulo = filter_var($_POST['titulo'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
    $descripcion = filter_var($_POST['descripcion'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
    $autor = filter_var($_POST['autor'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
    $fecha = filter_var($_POST['fecha'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
    $lugar =  filter_var($_POST['lugar'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
    $categoria_id =  filter_var($_POST['categoria_id'] ??= '', FILTER_SANITIZE_NUMBER_INT);
    $etiquetas =  filter_var($_POST['etiquetas'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
    $num_fotos = filter_var($_POST['num_fotos'] ??= '', FILTER_SANITIZE_NUMBER_INT);
    $num_visitas = filter_var($_POST['num_visitas'] ??= '', FILTER_SANITIZE_NUMBER_INT);
    $carpeta =  filter_var($_POST['carpeta'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);

    // Creamos un objeto de la clase album
    $album = new classAlbum(
        null,
        $titulo,
        $descripcion,
        $autor,
        $fecha,
        $lugar,
        $categoria_id,
        $etiquetas,
        $num_fotos,
        $num_visitas,
        $carpeta
    );

    // Validación de los datos

    // Creo un array para almacenar los errores
    $error = [];

    // Validación del título
    if (empty($titulo)) {
        $error['titulo'] = 'El título es obligatorio';
    } else if (strlen($titulo) > 100) {
        $error['titulo'] = 'El título no puede tener más de 100 caracteres';
    }

    // Validación de la descripción
    if (empty($descripcion)) {
        $error['descripcion'] = 'El descripcion es obligatorio';
    }

    // Validación de la autor
    if (empty($autor)) {
        $error['autor'] = 'La autor es obligatoria';
    }

    // Validación de la fecha
    if (empty($fecha)) {
        $error['fecha'] = 'El fecha es obligatorio';
    } else {
        $fecha = DateTime::createFromFormat('Y-m-d', $fecha);
        if (!$fecha) {
            $error['fecha'] = 'El formato del fecha no es correcto';
        }
    }

    // Validación del lugar
    if (empty($lugar)) {
        $error['lugar'] = 'El lugar es obligatorio';
    }

    // Validación de la categoría
    if (empty($categoria_id)) {
        $error['categoria_id'] = 'La categoría es obligatoria';
    }

    // Validación de carpeta
    if (empty($carpeta)) {
        $error['carpeta'] = 'La carpeta es obligatoria';
    } else if (strpos($carpeta, ' ') !== false) {
        $error['carpeta'] = 'La carpeta no puede contener espacios';
    }

    // Si hay errores
    if (!empty($error)) {
        $_SESSION['album'] = $album;
        $_SESSION['error'] = $error;
        header('location:' . URL . 'album/nuevo');
        exit();
    }

    // Añadir registro a la tabla solo una vez
    $this->model->create($album);



    // Crear carpeta en images
    $carpeta = $album->carpeta;
    $rutaCarpeta = "images/$carpeta";
    if (!file_exists($rutaCarpeta)) {
        mkdir($rutaCarpeta, 0777, true);
    }

    // Mensaje de éxito y redirección
    $_SESSION['mensaje'] = "Álbum creado correctamente";
    header('location:' . URL . 'album');
    exit();
}


    /*
        Método editar()

        Muestra el formulario que permite editar los detalles de un album

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
        else if (!in_array($_SESSION['role_id'], $GLOBALS['album']['editar'])) {
            // Genero mensaje
            $_SESSION['mensaje_error'] = 'Acceso denegado. No tiene permisos suficientes.';
            // redireciona al login
            header('location:' . URL . 'album');
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

            // Creo la propiedad album en la vista
            $this->view->album = $_SESSION['album'];

            // Creo la propiedad mensaje de error
            $this->view->mensaje_error = 'Error en el formulario';

            // Elimino la variable de sesión error
            unset($_SESSION['error']);

            // Elimino la variable de sesión album
            unset($_SESSION['album']);
        }

        // title
        $this->view->title = "Formulario Editar - Gestión de albumes";

        // obtener objeto de la clase album con el id pasado
        // Necesito crear el método read en el modelo
        $this->view->album = $this->model->read($this->view->id);


        // Obtener categorías
        $this->view->categorias = $this->model->getCategorias();

        // cargo la vista
        $this->view->render('album/editar/index');
    }

    /*
        Método update()

        Actualiza los detalles de un album
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
        else if (!in_array($_SESSION['role_id'], $GLOBALS['album']['editar'])) {
            // Genero mensaje
            $_SESSION['mensaje_error'] = 'Acceso denegado. No tiene permisos suficientes.';
            // redireciona al login
            header('location:' . URL . 'album');
            exit();
        }

        // Obtengo el id del album
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
        $descripcion = filter_var($_POST['descripcion'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $autor = filter_var($_POST['autor'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $fecha = filter_var($_POST['fecha'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $lugar =  filter_var($_POST['lugar'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $categoria_id =  filter_var($_POST['categoria_id'] ??= '', FILTER_SANITIZE_NUMBER_INT);
        $etiquetas =  filter_var($_POST['etiquetas'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $num_fotos = filter_var($_POST['num_fotos'] ??= '', FILTER_SANITIZE_NUMBER_INT);
        $num_visitas = filter_var($_POST['num_visitas'] ??= '', FILTER_SANITIZE_NUMBER_INT);
        $carpeta =  filter_var($_POST['carpeta'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);

        // Creo un objeto de la clase album
        $album_form = new classAlbum(
            null,
            $titulo,
            $descripcion,
            $autor,
            $fecha,
            $lugar,
            $categoria_id,
            $etiquetas,
            $num_fotos,
            $num_visitas,
            $carpeta
        );

        // Validación de los datos

        // Creo un array para almacenar los errores
        $error = [];

        // Validación del título
        // Reglas: obligatorio y menor de 100 caracteres
        if (empty($titulo)) {
            $error['titulo'] = 'El título es obligatorio';
        } else if (strlen($titulo) > 100) {
            $error['titulo'] = 'El título no puede tener más de 100 caracteres';
        }

        // Validación del descripcion
        // Reglas: obligatorio
        if (empty($descripcion)) {
            $error['descripcion'] = 'El descripcion es obligatorio';
        }

        // Validación de la autor
        // Reglas: obligatorio
        if (empty($autor)) {
            $error['autor'] = 'La autor es obligatoria';
        }

        // Validación del fecha
        // Reglas: obligatorio, formato fecha
        if (empty($fecha)) {
            $error['fecha'] = 'El fecha es obligatorio';
        } else {
            $fecha = DateTime::createFromFormat('Y-m-d', $fecha);
            if (!$fecha) {
                $error['fecha'] = 'El formato del fecha no es correcto';
            }
        }

        // Validación del lugar
        // Reglas: obligatorio
        if (empty($lugar)) {
            $error['lugar'] = 'El lugar es obligatorio';
        }

        // Validación del categoria
        // Reglas: obligatorio
        if (empty($categoria_id)) {
            $error['categoria_id'] = 'La categoria es obligatoria';
        }

        // Validación de carpeta
        // Reglas: obligatorio sin espacios
        if (empty($carpeta)) {
            $error['carpeta'] = 'La carpeta es obligatoria';
        } else if (strpos($carpeta, ' ') !== false) {
            $error['carpeta'] = 'La carpeta no puede contener espacios';
        }

        // Si hay errores
        if (!empty($error)) {

            // Creo la variable de sesión album
            $_SESSION['album'] = $album_form;

            // Creo la variable de sesión error
            $_SESSION['error'] = $error;

            // Redirecciono al formulario de nuevo album
            header('location:' . URL . 'album/editar/' . $id . '/' . $csrf_token);

            // Salgo de la función
            exit();
        }

        // Actualizo base  de datos
        // Necesito crear el método update en el modelo
        $this->model->update($album_form, $id);

        // Genero mensaje de éxito
        $_SESSION['mensaje'] = 'album actualizado con éxito';

        // Cargo el controlador principal de album
        header('location:' . URL . 'album');

        exit();
    }

    /*
        Método eliminar()

        Borra un album de la base de datos
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
        else if (!in_array($_SESSION['role_id'], $GLOBALS['album']['eliminar'])) {
            // Genero mensaje
            $_SESSION['mensaje_error'] = 'Acceso denegado. No tiene permisos suficientes.';
            // redireciona al login
            header('location:' . URL . 'album');
            exit();
        }

        // Obtengo el id del album
        $id = htmlspecialchars($param[0]);

        //Obtengo el token CSRF
        $csrf_token = $param[1];

        // Validación CSRF
        if (!hash_equals($_SESSION['csrf_token'], $csrf_token)) {
            require_once 'controllers/error.php';
            $controller = new Errores("Petición no válida");
            exit();
        }

        // Validar el id del album
        if (!$this->model->validateIdAlbum($id)) {
            // Genero mensaje de error
            $_SESSION['error'] = 'El id del album no es correcto';

            // redireciona al main de album
            header('location:' . URL . 'album');
            exit();
        }

        // Elimino album de la base de datos
        // Necesito crear el método delete en el modelo
        $this->model->delete($id);

        // Genero mensaje de éxito
        $_SESSION['mensaje'] = 'album eliminado con éxito';

        // Cargo el controlador principal de album
        header('location:' . URL . 'album');
    }

    /*
        Método mostrar()

        Muestra los detalles de un album
    */
    public function mostrar($param = [])
    {
        session_start();

        // Verificar logueo, rol, etc. (ya lo tienes)

        $id = htmlspecialchars($param[0]);
        $csrf_token = $param[1];

        // Validar CSRF, etc.

        // Validar id album
        if (!$this->model->validateIdAlbum($id)) {
            $_SESSION['error'] = 'El id del album no es correcto';
            header('location:' . URL . 'album');
            exit();
        }

        // Título
        $this->view->title = "Mostrar - Gestión de albumes";

        // Obtengo los detalles del álbum
        $album = $this->model->read($id);
        $this->view->album = $album;

        // Aumento visitas (opcional)
         $this->model->incrementarVisitas($id);

        // Recorrer carpeta "images/[carpeta]" para obtener las imágenes
        $ruta = "images/" . $album->carpeta;
        $listaArchivos = [];

        if (is_dir($ruta)) {
            // Escaneo la carpeta
            $archivos = scandir($ruta);
            // Filtramos los archivos "." y ".." y solo devolvemos los que tengan extensión de imagen
            foreach ($archivos as $archivo) {
                if ($archivo !== '.' && $archivo !== '..') {
                    // Comprueba que el archivo sea jpg, png, gif, etc.
                    $ext = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
                    if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])) {
                        $listaArchivos[] = $archivo;
                    }
                }
            }
        }

        // Paso la lista de archivos a la vista
        $this->view->images = $listaArchivos;



        // Renderizar vista
        $this->view->render('album/mostrar/index');
    }

    /*
        Método filtrar()

        Busca un album en la base de datos
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
        else if (!in_array($_SESSION['role_id'], $GLOBALS['album']['filtrar'])) {
            // Genero mensaje
            $_SESSION['mensaje_error'] = 'Acceso denegado. No tiene permisos suficientes.';
            // redireciona al login
            header('location:' . URL . 'album');
            exit();
        }

        # Obtengo la expresión de búsqueda
        $expresion = htmlspecialchars($_GET['expresion']);

        // Obtengo el token CSRF
        $csrf_token = htmlspecialchars($_GET['csrf_token']);

        // Cargo el título
        $this->view->title = "Filtrar por: {$expresion} - Gestión de albumes";

        // Creo la propiedad albumes para usar en la vista
        $this->view->albumes = $this->model->filter($expresion);

        // Cargo la vista
        $this->view->render('album/main/index');
    }

    /*
        Método ordenar()

        Ordena los albumes de la base de datos
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
        else if (!in_array($_SESSION['role_id'], $GLOBALS['album']['ordenar'])) {
            // Genero mensaje
            $_SESSION['mensaje_error'] = 'Acceso denegado. No tiene permisos suficientes.';
            // redireciona al login
            header('location:' . URL . 'album');
            exit();
        }

        // Obtengo el id del album
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
            1 => 'id',
            2 => 'titulo',
            3 => 'descripcion',
            4 => 'autor',
            5 => 'fecha',
            6 => 'lugar',
            7 => 'categoria',
            8 => 'etiquetas',
            9 => 'num_fotos',
            10 => 'num_visitas',
            11 => 'carpeta'
        ];

        // Obtengo el id del campo por el que se ordenarán los albumes
        $id = $param[0];


        // Cargo el título
        $this->view->title = "Ordenar por {$criterios[$id]} - Gestión de albumes";

        # Obtengo los albumes ordenados por el campo id
        $this->view->albumes = $this->model->order($id);

        // Cargo la vista
        $this->view->render('album/main/index');
    }

    public function add($param = [])
    {

        # iniciar o continuar  sesión
        session_start();

        # compruebo usuario autentificado
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['notify'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['role_id'], $GLOBALS['album']['add']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'album');
        } else {

            # Comprobar si vuelvo de  un registro no validado
            if (isset($_SESSION['error'])) {

                # Mensaje de error
                $this->view->error = $_SESSION['error'];

                # Recupero array errores  específicos
                $this->view->errores = $_SESSION['errores'];

                # Elimino las variables de sesión
                unset($_SESSION['error']);
                unset($_SESSION['errores']);
            }

            //Obtnego objeto de la clase album
            $album = $this->model->getAlbum($param[0]);

            $this->model->subirArchivo($_FILES['archivos'], $album->carpeta);

            $numFotos = count(glob("images/" . $album->carpeta . "/*"));

            $this->model->contadorFotos($album->id, $numFotos);

            header('location:' . URL . 'album');
        }
    }

    public function delete($param = [])
    {

        # inicar sesión
        session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario debe autentificarse";

            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['role_id'], $GLOBALS['album']['delete']))) {
            $_SESSION['mensaje'] = "Operación sin privilegios";
            header('location:' . URL . 'album');
        } else {

            # obtenemos id del  album
            $id = $param[0];

            //Para borrar la carpeta del album
            //Obtenemos el nombre de la carpeta del álbum
            $album = $this->model->getAlbum($id);
            $carpeta = $album->carpeta;
            $rutaCarpeta = "images/$carpeta";

            # eliminar carpeta si existe
            if (is_dir($rutaCarpeta)) {
                $this->deleteDirectory($rutaCarpeta);
            }

            # eliminar album
            $this->model->delete($id);

            # generar mensaje
            $_SESSION['mensaje'] = 'album eliminado correctamente';

            # redirecciono al main de albumes
            header('location:' . URL . 'album');
        }
    }

    //Función para eliminar la carpeta recursivamente
    private function deleteDirectory($dir)
    {
        if (!file_exists($dir)) return true;
        if (!is_dir($dir)) return unlink($dir);
        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') continue;
            if (!$this->deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) return false;
        }
        return rmdir($dir);
    }
}
