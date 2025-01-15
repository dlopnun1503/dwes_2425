<?php
session_start();

$session_data = [
    'session_id' => $_SESSION['session_id'],
    'session_name' => $_SESSION['session_name'],
    'start_time' => $_SESSION['start_time'],
    'end_time' => date('Y-m-d H:i:s'),
    'total_visits' => $_SESSION['total_visits']
];

$session_data['duration'] = strtotime($session_data['end_time']) - strtotime($session_data['start_time']);

// Destruir la sesión
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Close Session</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Sesion cerrada</h1>
        <p><strong>SID de la sesión:</strong> <?= $session_data['session_id'] ?></p>
        <p><strong>Nombre de la sesión:</strong> <?= $session_data['session_name'] ?></p>
        <p><strong>Contador total de visitas:</strong> <?= $session_data['total_visits'] ?></p>
        <p><strong>Fecha y hora de inicio:</strong> <?= $session_data['start_time'] ?></p>
        <p><strong>Fecha y hora de fin:</strong> <?= $session_data['end_time'] ?></p>
        <p><strong>Duración de la sesión:</strong> <?= gmdate('H:i:s', $session_data['duration']) ?></p>
    </div>
</body>
</html>
