<!-- views/dashboard.php -->
<?php
session_start();  // Inicia la sesión

// Verifica si el usuario está autenticado
if (!isset($_SESSION['username'])) {
    header('Location: login.php');  
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Bienvenido</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <div class="dashboard-container">
        <header> #
            <div class="logo-container">
                <img src="../assets/images/logo-univalle.png" alt="Logo Univalle" class="logo">
            </div>
            <div class="user-info">
                <p>Bienvenido, <strong><?php echo $_SESSION['username']; ?></strong></p>
                <a href="logout.php" class="btn-logout">Cerrar sesión</a>
            </div>
        </header>
        
        <main>
            <div class="dashboard-content">
                <div class="card">
                    <h3>Gestión de Clases</h3>
                    <p>Accede a las clases y actividades registradas.</p>
                    <a href="#" class="btn-action">Ir a clases</a>
                </div>
                <div class="card">
                    <h3>Reporte de Dificultades</h3>
                    <p>Revisa y reporta las dificultades que has experimentado en tus clases.</p>
                    <a href="#" class="btn-action">Ir al reporte</a>
                </div>
                <!-- Agrega más tarjetas según las funcionalidades -->
            </div>
        </main>
    </div>
</body>
</html>
