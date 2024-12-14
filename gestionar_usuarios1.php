<?php
session_start();

// Verificar si el usuario tiene el rol de 'admin'
if ($_SESSION['rol'] !== 'admin') {
    header('Location: dashboard.php');
    exit();
}

require_once 'conexion.php'; // Asegúrate de incluir tu archivo de conexión a la base de datos

// Obtener todos los usuarios desde la base de datos
$query = "SELECT * FROM usuarios";
$result = $conexion->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Usuarios</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <header>
        <h1>Gestión de Usuarios</h1>
        <p>Bienvenido, <?php echo $_SESSION['username']; ?> (Administrador)</p>
        <a href="logout.php">Cerrar sesión</a>
    </header>

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
            while ($user = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$user['username']}</td>
                        <td>{$user['rol']}</td>
                        <td>
                            <a href='editar_usuario.php?id={$user['id']}'>Editar</a> | 
                            <a href='eliminar_usuario.php?id={$user['id']}'>Eliminar</a>
                        </td>
                    </tr>";
            }
            ?>
        </table>
        <br>
        <a href="crear_usuario.php">Agregar nuevo usuario</a>
    </main>
</body>
</html>
