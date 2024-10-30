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
    <title>Login de Usuario</title>
    <link rel="stylesheet" href="th_styles/th_auth.css">
</head>
<body>
    <div class="th_container">
        <img src="th_imagenes/th_logoUCP.png" alt="Logo" class="th_logo">
        <h2>Login de Usuario</h2>
        <form action="th_php/th_loginn.php" method="POST">
            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="correo" required>

            <label for="contraseña">Contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" required>

            <button class="th_button" type="submit">Iniciar Sesión</button>
        </form>
        <p>
            <a href="th_index.php">Volver al inicio</a>
            <a href="th_register.php">Regístrate</a>
        </p>
    </div>
</body>
</html>
