<?php
session_start();

// Verifica si la sesión ya ha sido iniciada.
if (!isset($_SESSION['session_id'])) {
    // Iniciar la sesión con valores predeterminados.
    $_SESSION['session_id'] = session_id();
    $_SESSION['session_name'] = 'Usuario_X'; // Ajustar según la lógica del sistema
    $_SESSION['start_time'] = date('Y-m-d H:i:s');
    $_SESSION['page_visits'] = [];
    $_SESSION['total_visits'] = 0;
}

// Registrar la visita actual
$page = basename($_SERVER['PHP_SELF'], '.php');
if (!isset($_SESSION['page_visits'][$page])) {
    $_SESSION['page_visits'][$page] = 0;
}
$_SESSION['page_visits'][$page]++;
$_SESSION['total_visits']++;
?>
