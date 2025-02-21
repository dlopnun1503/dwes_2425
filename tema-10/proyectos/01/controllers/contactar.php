<?php

class Contactar extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Muestra el formulario de contacto
     */

    public function render()
    {
        // Creo el token csrf
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

        // Creo las variables para los campos del formulario
        $this->view->name = '';
        $this->view->email = '';
        $this->view->subject = '';
        $this->view->message = '';

        // Renderizo la vista
        $this->view->render('contactar/index');
    }


    /**
     * Valida los datos del formulario de contacto
     */
    public function validar(){

        // Compruebo si el token csrf es válido
        $this->checkTokenCsrf($_POST['csrf_token']);

        // Recupero los datos del formulario
        $name = filter_var($_POST['name'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $subject =  filter_var($_POST['subject'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
        $message =  filter_var($_POST['message'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);

        $error = [];

        // Validación de los campos
        // Compruebo que el campo name no esté vacío
        if (empty($name)) {
            $error['name'] = 'El campo name es obligatorio';
        }

        // Compruebo que el campo email no esté vacío 
        if (empty($email)) {
            $error['email'] = 'El campo email es obligatorio';
        }
        // Compruebo que el campo email sea un email válido
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = 'El campo email no es un email válido';
        }

        // Compruebo que el campo subject no esté vacío
        if (empty($subject)) {
            $error['subject'] = 'El campo subject es obligatorio';
        }

        // Compruebo que el campo message no esté vacío
        if (empty($message)) {
            $error['message'] = 'El campo message es obligatorio';
        }

        // Si hay errores, los muestro
        if (!empty($error)) {

            // Creo el token csrf
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

            $this->view->name = $name;
            $this->view->email = $email;
            $this->view->subject = $subject;
            $this->view->message = $message;

            
            $this->view->error = $error;


            $this->view->render('contactar/index');
            exit();
        }

    }


    public function checkTokenCsrf($csrf_token)
    {

        // Validación CSRF
        if (!hash_equals($_SESSION['csrf_token'], $csrf_token)) {
            require_once 'controllers/error.php';
            $controller = new Errores('Petición no válida');
            exit();
        }
    }
}
