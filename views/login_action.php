<?php
include_once ('../config/config.php'); // Conexión a la base de datos

$username = $_POST['username']; // Usuario ingresado
$password = $_POST['password']; // Contraseña ingresada

// Generar el hash MD5 de la contraseña ingresada
$password_hashed = md5($password);

try {
    // Consulta para buscar al usuario con la contraseña hasheada
    $query = "SELECT * FROM usuarios WHERE username = :username AND password = :password";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password); // Comparar contra el hash en la DB
    $stmt->execute();

    // Verificar si se encontró el usuario
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        session_start();
        $_SESSION['username'] = $user['username'];
        $_SESSION['rol'] = $user['rol']; // Guardar el rol en la sesión
        header("Location: dashboard.php"); // Redirigir al dashboard
        // exit();
    } else {
        // Usuario o contraseña incorrectos
        header("Location: login.php?error=Credenciales inválidas");
        // exit();
    }
} catch (PDOException $e) {
    echo "Error en la consulta: " . $e->getMessage();
}