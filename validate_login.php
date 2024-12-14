<?php
session_start();
require_once '../config/db.php'; // Archivo para conectar a la base de datos

// Recibir datos del formulario
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($username) || empty($password)) {
    $_SESSION['error'] = 'Por favor ingresa todos los campos.';
    header('Location: ../views/login.php');
    exit;
}

// Consultar el usuario en la base de datos
$sql = "SELECT * FROM usuarios WHERE username = ? AND password = MD5(?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    $_SESSION['user'] = [
        'id' => $user['id'],
        'nombre' => $user['nombre'],
        'rol' => $user['rol']
    ];
    // Redirigir según el rol
    switch ($user['rol']) {
        case 'administrador':
            header('Location: ../views/admin_dashboard.php');
            break;
        case 'docente':
            header('Location: ../views/docente_dashboard.php');
            break;
        case 'coordinador':
            header('Location: ../views/coordinador_dashboard.php');
            break;
    }
    exit;
} else {
    $_SESSION['error'] = 'Credenciales incorrectas.';
    header('Location: ../views/login.php');
    exit;
}
?>
