<!-- actions/process_login.php -->
<?php
session_start();  // Inicia la sesión

// Datos de ejemplo (en un proyecto real, estos datos vendrían de la base de datos)
$valid_user = 'admin';  // Nombre de usuario válido
$valid_password = '12345';  // Contraseña válida

if ($_SERVER['REQUEST_METHOD'] == 'POST') {  // Asegura que se haya enviado el formulario
    $username = $_POST['username'];  // Recibe el nombre de usuario
    $password = $_POST['password'];  // Recibe la contraseña

    // Verifica si las credenciales son correctas
    if ($username == $valid_user && $password == $valid_password) {
        // Si las credenciales son correctas, inicia una sesión
        $_SESSION['username'] = $username;
        header('Location: ../views/dashboard.php');  // Redirige al dashboard
        exit();
    } else {
        echo "<p>Usuario o contraseña incorrectos. Intenta nuevamente.</p>";
    }
}
?>
