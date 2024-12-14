<?php
try {
    // Conexión a la base de datos (ajusta los parámetros según tu configuración)
    $conn = new PDO('mysql:host=localhost;dbname=tu_base_de_datos', 'tu_usuario', 'tu_contraseña');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Datos del estudiante
    $username = 'nombre_estudiante';
    $password = md5('admin'); // Generar hash MD5
    $rol = 'estudiante';

    // Consulta SQL para insertar
    $sql = "INSERT INTO usuarios (username, password, rol) VALUES (:username, :password, :rol)";
    $stmt = $conn->prepare($sql);

    // Vincular parámetros
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':rol', $rol);

    // Ejecutar consulta
    $stmt->execute();
    echo "Usuario con rol 'estudiante' agregado exitosamente.";
} catch (PDOException $e) {
    echo "Error al insertar usuario: " . $e->getMessage();
}
?>
