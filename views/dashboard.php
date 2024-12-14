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
            background-color: #f5f5f5;
            color: #333;
        }

        header {
            background-color: #900;
            color: #fff;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1, header p {
            margin: 0;
        }

        main {
            padding: 2rem;
        }

        nav {
            margin-bottom: 2rem;
        }

        nav ul {
            list-style: none;
            padding: 0;
        }

        nav li {
            margin: 0.5rem 0;
        }

        nav a {
            text-decoration: none;
            color: #900;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .logout {
            color: white;
            text-decoration: none;
            background: #700;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .logout:hover {
            background: #500;
        }
    </style>
</head>
<body>
    <header>
        <div>
            <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
            <p>Rol: <?php echo htmlspecialchars($_SESSION['rol']); ?></p>
        </div>
        <a href="logout.php" class="logout">Cerrar Sesión</a>
    </header>

    <main>
        <nav>
            <?php if ($rol === 'administrador'): ?>
                <h2>Panel de Administración</h2>
                <ul>
                <a href="../views/gestionar_usuarios.php">Gestionar Usuarios</a>

                    <li><a href="reporte_sistema.php">Reporte del Sistema</a></li>
                </ul>
            <?php elseif ($rol === 'docente'): ?>
                <h2>Panel del Docente</h2>
                <ul>
                    <li><a href="clases.php">Gestionar Clases</a></li>
                    <li><a href="evaluaciones.php">Ver Evaluaciones</a></li>
                </ul>
            <?php elseif ($rol === 'estudiante'): ?>
                <h2>Panel del Estudiante</h2>
                <ul>
                    <li><a href="mis_clases.php">Mis Clases</a></li>
                    <li><a href="actividades.php">Actividades</a></li>
                </ul>
            <?php else: ?>
                <p>Rol no reconocido. Por favor, contacte al administrador.</p>
            <?php endif; ?>
        </nav>
    </main>
</body>
</html>
