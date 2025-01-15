<?php include('start.php');  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>About Page</title>
</head>
<body>
    <?php include('menu.php');  ?>
    <div class="container">
        <h1>About Page</h1>
        <p><strong>SID de la sesión:</strong> <?= $_SESSION['session_id'] ?></p>
        <p><strong>Nombre de la sesión:</strong> <?= $_SESSION['session_name'] ?></p>
        <p><strong>Fecha y hora de inicio:</strong> <?= $_SESSION['start_time'] ?></p>
        <p><strong>Visitas a esta página durante la sesión:</strong> <?= $_SESSION['page_visits']['about'] ?></p>
    </div>
</body>
</html>