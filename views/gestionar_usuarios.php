<?php
session_start();

// Verificar si el usuario tiene el rol de 'administrador'
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'administrador') {
    header('Location: dashboard.php'); // Redirige si no es administrador
    exit();
}

// Incluye el archivo config.php correctamente
require_once '../config/config.php'; // Ruta ajustada para la configuración

// Obtener todos los usuarios desde la base de datos
try {
    $query = "SELECT * FROM usuarios"; // Consulta SQL
    $stmt = $conexion->prepare($query); // Prepara la consulta
    $stmt->execute(); // Ejecuta la consulta
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtén los resultados como un arreglo asociativo
} catch (PDOException $e) {
    die("Error al obtener usuarios: " . $e->getMessage()); // Manejo de errores
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Usuarios</title>
    <link rel="stylesheet" href="../assets/css/styles.css"> <!-- Ruta al archivo CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            text-align: center;
        }
        header a {
            color: white;
            text-decoration: none;
            margin-left: 10px;
        }
        main {
            margin: 20px;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #4CAF50;
            color: white;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
        a {
            color: #4CAF50;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .add-user {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }
        .add-user:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <!-- Encabezado de la página -->
    <header>
        <h1>Gestión de Usuarios</h1>
        <p>Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?> (Administrador)</p>
        <a href="logout.php">Cerrar sesión</a>
    </header>

    <!-- Contenido principal -->
    <main>
        <h2>Lista de Usuarios</h2>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
            <?php
            // Mostrar los usuarios en una tabla
            if (!empty($usuarios)) {
                foreach ($usuarios as $user) {
                    echo "<tr>
                            <td>" . htmlspecialchars($user['username']) . "</td>
                            <td>" . htmlspecialchars($user['rol']) . "</td>
                            <td>
                                <a href='editar_usuario.php?id=" . htmlspecialchars($user['id']) . "'>Editar</a> |
                                <a href='eliminar_usuario.php?id=" . htmlspecialchars($user['id']) . "'>Eliminar</a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No hay usuarios registrados.</td></tr>";
            }
            ?>
        </table>
        <a href="crear_usuario.php" class="add-user">Agregar nuevo usuario</a>
    </main>
</body>
</html>
