<?php
session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['rol'])) {
    header("Location: login.php");
    exit();
}

$rol = $_SESSION['rol'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        header {
            background-color: #007BFF;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 0;
        }

        header p {
            margin: 0;
            font-size: 0.9rem;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 1rem;
        }

        nav ul li {
            display: inline;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            padding: 0.5rem 1rem;
            background-color: #0056b3;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: #003f7f;
        }

        main {
            padding: 2rem;
        }

        .panel {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .panel h2 {
            margin-top: 0;
            color: #007BFF;
        }

        .panel ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .panel ul li {
            margin: 0.5rem 0;
        }

        .panel ul li a {
            text-decoration: none;
            color: #007BFF;
            transition: color 0.3s;
        }

        .panel ul li a:hover {
            color: #0056b3;
        }

        footer {
            text-align: center;
            padding: 1rem;
            background-color: #f1f1f1;
            border-top: 1px solid #ddd;
        }

        footer p {
            margin: 0;
            font-size: 0.9rem;
            color: #666;
        }
    </style>
</head>
<body>
    <header>
        <h1>Bienvenido, <?php echo $_SESSION['username']; ?>!</h1>
        <p>Rol: <?php echo $_SESSION['rol']; ?></p>
        <nav>
            <ul>
                <li><a href="logout.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <?php if ($rol === 'administrador'): ?>
            <div class="panel">
                <h2>Panel de Administración</h2>
                <ul>
                    <li><a href="gestionar_usuarios.php">Gestionar Usuarios</a></li>
                    <li><a href="reporte_sistema.php">Reporte del Sistema</a></li>
                </ul>
            </div>
        <?php elseif ($rol === 'docente'): ?>
            <div class="panel">
                <h2>Panel del Profesor</h2>
                <ul>
                    <li><a href="clases.php">Gestionar Clases</a></li>
                    <li><a href="evaluaciones.php">Ver Evaluaciones</a></li>
                </ul>
            </div>
        <?php elseif ($rol === 'estudiante'): ?>
            <div class="panel">
                <h2>Panel del Estudiante</h2>
                <ul>
                    <li><a href="mis_clases.php">Mis Clases</a></li>
                    <li><a href="actividades.php">Actividades</a></li>
                </ul>
            </div>
        <?php else: ?>
            <p>Rol no reconocido.</p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 EduRegistro. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
