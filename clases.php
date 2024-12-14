<?php
session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['rol']) || $_SESSION['rol'] !== 'docente') {
    header("Location: login.php");
    exit();
}
?>
