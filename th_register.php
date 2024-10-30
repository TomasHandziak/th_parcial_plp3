<?php
session_start();


if (isset($_SESSION['usuario_nombre'])) {
    header("Location: th_index_login.php"); 
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="th_styles/th_auth.css">
</head>
<body>
    <div class="th_container">
        <img src="th_imagenes/th_logoUCP.png" alt="Logo" class="th_logo"> <!-- Añadido el logo -->
        <h2>Registro de Usuario</h2>
        <form action="th_php/th_register.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="correo" required>

            <label for="contraseña">Contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" required>

            <button  type="submit">Registrarse</button>
        </form>
        <p>
            <a href="th_index.php">Volver al inicio</a>
            <a href="th_login.php">Iniciar Sesión</a>
        </p>
    </div>
</body>
</html>
