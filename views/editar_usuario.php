<?php
session_start();

// Verificar si el usuario tiene el rol de 'admin'
if ($_SESSION['rol'] !== 'administrador') {
    header('Location: dashboard.php');
    exit();
}
require_once '../config/config.php';
// require_once 'config.php';

// Obtener el id del usuario a editar
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener los datos del usuario desde la base de datos
    $query = "SELECT * FROM usuarios WHERE id = $id";
    $result = $conexion->query($query);
    // $user = $result->fetch_assoc();
    // Antes:
$row = $stmt->fetch_assoc();

// Después:
$row = $stmt->fetch(PDO::FETCH_ASSOC);


    if (!$user) {
        echo "Usuario no encontrado";
        exit();
    }
} else {
    echo "ID no proporcionado";
    exit();
}

// Procesar formulario de edición
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $rol = $_POST['rol'];

    // Actualizar el usuario en la base de datos
    $query = "UPDATE usuarios SET username = '$username', rol = '$rol' WHERE id = $id";
    $conexion->query($query);

    // Redirigir a la página de gestión de usuarios
    header('Location: gestionar_usuarios.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<body>
    <header>
        <h1>Editar Usuario</h1>
        <p>Bienvenido, <?php echo $_SESSION['username']; ?> (Administrador)</p>
        <a href="logout.php">Cerrar sesión</a>
    </header>

    <main>
        <h2>Editar el usuario: <?php echo $user['username']; ?></h2>
        <form method="POST">
            <label for="username">Nombre de usuario:</label>
            <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required>
            
            <label for="rol">Rol:</label>
            <select id="rol" name="rol" required>
                <option value="admin" <?php echo ($user['rol'] === 'admin') ? 'selected' : ''; ?>>Administrador</option>
                <option value="profesor" <?php echo ($user['rol'] === 'profesor') ? 'selected' : ''; ?>>Profesor</option>
                <option value="estudiante" <?php echo ($user['rol'] === 'estudiante') ? 'selected' : ''; ?>>Estudiante</option>
            </select>
            
            <button type="submit">Guardar cambios</button>
        </form>
    </main>
</body>
</html>
