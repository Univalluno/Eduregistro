<?php
// Configuración de la base de datos
$host = 'localhost';       // Servidor de la base de datos
$dbname = 'eduregistro';   // Nombre de la base de datos
$username = 'root';        // Usuario de la base de datos
$password = '';            // Contraseña del usuario

try {
    // Crear la conexión PDO
    $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Configurar el modo de error de PDO
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Mensaje opcional para depuración
    // echo "Conexión exitosa.";
} catch (PDOException $e) {
    // Manejo del error de conexión
    die("Error al conectar con la base de datos: " . $e->getMessage());
}