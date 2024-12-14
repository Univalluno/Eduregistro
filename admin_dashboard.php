<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['rol'] !== 'administrador') {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
</head>
<body>
    <h1>Bienvenido, <?= htmlspecialchars($_SESSION['user']['nombre']); ?></h1>
    <p>Este es tu panel de administrador.</p>
</body>
</html>
