<?php
session_start();

// Verificar si el usuario tiene el rol de 'admin'
if ($_SESSION['rol'] !== 'admin') {
    header('Location: dashboard.php');
    exit();
}

require_once 'conexion.php';

// Obtener el id del usuario a eliminar
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar el usuario
    $query = "DELETE FROM usuarios WHERE id = $id";
    $conexion->query($query);

    // Redirigir a la página de gestión de usuarios
    header('Location: gestionar_usuarios.php');
    exit();
} else {
    echo "ID no proporcionado";
    exit();
}
?>
