<?php
session_start();

echo 'SID: ' . session_id();
echo '<br>';
echo 'NAME: ' . session_name();
echo '<br>';

echo 'Nombre: ' . $_SESSION['nombre'];
echo '<br>';            
echo 'Email: ' . $_SESSION['email'];
echo '<br>';
echo 'Perfil: ' . $_SESSION['perfil'];


include 'index.php';
?>