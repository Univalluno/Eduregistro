<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduRegistro - Login</title>
    <link rel="stylesheet" href="../assets/css/login.css"> <!-- Aquí es donde haces el cambio -->
</head>

<?php
// // session_start();
// if (isset($_SESSION['username'])) {
//     header('Location: dashboard.php');
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduRegistro - Inicio</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Bienvenido a <span class="highlight">EduRegistro</span></h1>
            <p class="subheader">La plataforma que transforma la gestión académica.</p>
        </header>

        <main class="main-content">
            <section class="cta-section">
                <h2>Accede a tu cuenta</h2>
                <p>Comienza a gestionar tus clases y reportes de manera eficiente.</p>
                <a href="views/login.php" class="btn-login">Iniciar sesión</a>
            </section>
        </main>

        <footer class="footer">
            <p>&copy; 2024 Universidad del Valle | Sede Norte</p>
        </footer>
    </div>
</body>
</html>
