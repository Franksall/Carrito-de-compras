<?php
// actualizar_datos.php

// Incluye el archivo de configuración y conexión a la base de datos
include 'global/config.php';
include 'global/conexion.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    // Redirige a la página de inicio de sesión si el usuario no está autenticado
    header("Location: login.php");
    exit;
}

// Obtiene el nombre de usuario de la sesión
$usuario = $_SESSION['usuario'];

// Verifica si se enviaron datos desde el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtiene los datos del formulario
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];

    // Realiza una consulta para actualizar los datos del usuario en la base de datos
    $query = "UPDATE usuarios SET telefono = ?, email = ?, direccion = ? WHERE username = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$telefono, $email, $direccion, $usuario]);

    // Redirige de nuevo a la página de datos_usuario.php después de la actualización
    header("Location: datos_usuario.php");
    exit;
} else {
    // Si no se enviaron datos, redirige a la página de datos_usuario.php
    header("Location: datos_usuario.php");
    exit;
}
?>
