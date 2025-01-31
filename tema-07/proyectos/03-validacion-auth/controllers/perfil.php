<?php


class Perfil extends Controller
{

    function __construct()
    {
        parent::__construct();
    }


    /*
        Método principal

        Se  carga siempre que la url contenga sólo el primer parámetro

        url: /alumno
    */
    public function render()
    {
        // inicio o continuo la sesión
        session_start();

        // genero token csrf
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

        // Comprobar si hay un usuario logueado
        if (!isset($_SESSION['user_id'])) {
            // Genero mensaje de error
            $_SESSION['mensaje_error'] = 'Acceso denegado';
            header('location:' . URL . 'auth/login');
            exit();
        }

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


        // Obtenemos los detalles completos del usuario
        $this->view->perfil = $this->model->getUserId($_SESSION['user_id']);

        // Creo la propiedad title de la vista
        $this->view->title = "Mi perfil " . $_SESSION['user_name'];

        $this->view->render('perfil/main/index');
    }


    /**
     * metodo para actualizar los datos del usuario. 
     * Muestra en la vista el formulario con los datos del usuario en modo edicion
     * 
     * url: /perfil/editar
     * 
     * @param $id : id del usuario
     */

    public function editar()
    {

        // inicio o continuo sesion 
        session_start();

        // comprobar si hay usuario logueado
        if (!isset($_SESSION['user_id'])) {
            // genero mensaje de error
            $_SESSION['mensaje_error'] = 'Acceso denegado';

            header('location:' . URL . 'auth/login');
            exit();
        }

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


        // obtenemos el id del usuario 
        $id = $_SESSION['user_id'];

        // obtenemos detalles completos del usuario
        $this->view->perfil = $this->model->getUserId($id);

        // capa no validacion del formulario
        if (isset($_SESSION['error'])) {
            $this->view->error = $_SESSION['error'];

            unset($_SESSION['error']);

            $this->view->perfil = $_SESSION['perfil'];

            unset($_SESSION['perfil']);

            $this->view->mensaje_error = 'Hay errores en el formulario';
        }

        $this->view->title = "Editar perfil " . $_SESSION['user_name'];

        $this->view->render('perfil/editar/index');
    }

    /**
     * Metodo para actualizar los datos del usuario
     * Actualiza los datos del usuario name y email
     * 
     * Incluye:
     * - validacion token csrf
     * - validacion de los datos del formulario
     * - prevencion de ataques csrf
     * 
     * url /perfil/update
     */

     public function update(){

        // inicio o continuo sesion 
        session_start();

        // Validación toekn CSRF
        if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
            // require_once 'controllers/error.php';
            // $controller = new Errores('Petición no válida');
            // exit();
            header('location:' . URL . 'errores');
            exit();
        }

        // comprobar si hay usuario logueado
        if (!isset($_SESSION['user_id'])) {
            // genero mensaje de error
            $_SESSION['mensaje_error'] = 'Acceso denegado';

            header('location:' . URL . 'auth/login');
            exit();
        }

        // saneamos los detalles del formulario
        $name = filter_var($_POST['name'] ??= null, FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'] ??= null, FILTER_SANITIZE_EMAIL);

        // obtengo los detalles del usuario
        $user = $this->model->getUserId($_SESSION['user_id']);

        // validacion de los datos del usuario 
        $error = [];

        // validacion name
        if($name != $user->name){
            if (empty($name)) {
                $error['name'] = 'El nombre es obligatorio';
            } else if (strlen($name) < 5) {
                $error['name'] = 'El nombre debe tener al menos 5 caracteres';
            } else if (strlen($name) > 20) {
                $error['name'] = 'El nombre debe tener como máximo 20 caracteres';
            } else if (!$this->model->validateUniqueName($name)) {
                $error['name'] = 'Nombre existente';
            }
        }

        // validacion email
        if($email != $user->email){
            if (empty($email)) {
                $error['email'] = 'El email es obligatorio';
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = 'El formato del email no es correcto';
            } else if (!$this->model->validateUniqueEmail($email)) {
                $error['email'] = 'El email ya existe';
            }
           
        }

        // Si hay errores
        if (!empty($error)) {

            // Creo la variable de sessión error con los errores
            $_SESSION['error'] = $error;

            // Creo la variable de sessión name con los datos del formulario
            $_SESSION['perfil'] = (object) [
                'name'=> $name,
                'email' => $email
            ];

            // redireciona al formulario de nuevo
            header('location:' . URL . 'perfil/editar');
            exit();
        }

        // actualizo los datos del usuario

        $this->model->update($name, $email, $_SESSION['user_id']);

        $_SESSION['user_name'] = $name;

        // genero mensaje de exito
        $_SESSION['mensaje'] = 'Perfil actualizado correctamente';

        header('location:' . URL . 'perfil');
        exit();

     }


    /**
     * Metodo para cambiar la contraseña del usuario
     * Muestra la vista del formulario para cambiar la contraseña
     * 
     * url: /perfil/pass
     */
    public function pass()
    {
        // inicio o continuo sesion 
        session_start();

        // genero token csrf
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

        // comprobar si hay usuario logueado
        if (!isset($_SESSION['user_id'])) {
            // genero mensaje de error
            $_SESSION['mensaje_error'] = 'Acceso denegado';

            header('location:' . URL . 'auth/login');
            exit();
        }

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

        // capa no validacion del formulario
        if (isset($_SESSION['error'])) {
            $this->view->error = $_SESSION['error'];

            unset($_SESSION['error']);

            $this->view->perfil = $_SESSION['perfil'];

            unset($_SESSION['perfil']);

            $this->view->mensaje_error = 'Hay errores en el formulario';
        }

        $this->view->title = "Cambiar contraseña " . $_SESSION['user_name'];

        $this->view->render('perfil/pass/index');
    }

    /**
     * Metodo para actualizar la contraseña del usuario
     * Actualiza la contraseña
     * url: /perfil/update_pass
     */
    public function update_pass()
    {
        // inicio o continuo sesion 
        session_start();

        // Validación token CSRF
        if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
            header('location:' . URL . 'errores');
            exit();
        }

        // comprobar si hay usuario logueado
        if (!isset($_SESSION['user_id'])) {
            // genero mensaje de error
            $_SESSION['mensaje_error'] = 'Acceso denegado';
            header('location:' . URL . 'auth/login');
            exit();
        }

        // saneamos los detalles del formulario
        $password = filter_var($_POST['password'] ??= null, FILTER_SANITIZE_SPECIAL_CHARS);
        $new_password = filter_var($_POST['new_password'] ??= null, FILTER_SANITIZE_SPECIAL_CHARS);
        $confirm_password = filter_var($_POST['confirm_password'] ??= null, FILTER_SANITIZE_SPECIAL_CHARS);

        // obtengo los detalles del usuario
        $user = $this->model->getUserId($_SESSION['user_id']);

        // validacion de los datos del usuario 
        $error = [];

        // validacion password
        if (empty($password)){
            $error['password'] = 'La contraseña es obligatoria';
        } elseif(!password_verify($password, $user->password)) {
            $error['password'] = 'La contraseña actual es incorrecta';
        }

        // validacion new_password
        if (empty($new_password)) {
            $error['new_password'] = 'La nueva contraseña es obligatoria';
        } else if (strlen($new_password) < 7) {
            $error['new_password'] = 'La nueva contraseña debe tener al menos 8 caracteres';
        } else if ($new_password !== $confirm_password) {
            $error['confirm_password'] = 'Las contraseñas no coinciden';
        }

        // Si hay errores
        if (!empty($error)) {
            // Creo la variable de sessión error con los errores
            $_SESSION['error'] = $error;

            // redireciona al formulario de nuevo
            header('location:' . URL . 'perfil/pass');
            exit();
        }

        // actualizo la contraseña del usuario
        $this->model->updatePassword($new_password, $_SESSION['user_id']);

        // genero mensaje de exito
        $_SESSION['mensaje'] = 'Contraseña actualizada correctamente';

        header('location:' . URL . 'perfil');
        exit();
    }
}
