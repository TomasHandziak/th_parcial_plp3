<?php
session_start();
include 'th_php/th_conexion.php';
if (!isset($_SESSION['usuario_nombre'])) {
    header("Location: th_index.php"); 
    exit(); 
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: th_index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a la Página Principal</title>
    <link rel="stylesheet" href="th_styles/th_auth.css">
</head>
<body>
    <div class="th_container">
        <img src="th_imagenes/th_logoUCP.png" alt="Logo" class="th_logo"> 
        
        <?php if (isset($_SESSION['usuario_nombre'])): ?>
            <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?>!</h2>
            <form method="POST">
                <button type="submit" name="logout" class="th_logout-button">Cerrar Sesión</button>
            </form>
        <?php else: ?>
            <p>Por favor, <a href="th_login.php">inicia sesión</a> para continuar.</p>
        <?php endif; ?>

        <section id="comentarios">
            <h3>Deja tu comentario</h3>
            <?php if (isset($_SESSION['usuario_nombre'])): ?>
                
                <form action="th_php/th_comentar.php" method="POST">
                    <textarea name="comentario" placeholder="Escribe tu comentario" required></textarea>
                    <button type="submit">Comentar</button>
                </form>
            <?php else: ?>
                <p>Debes <a href="th_login.php">iniciar sesión</a> para comentar.</p>
            <?php endif; ?>

            <div id="lista-comentarios">
                <h4>Comentarios</h4>
                <?php
                $sql = "SELECT nombre, comentario FROM comentarios ORDER BY id DESC";
                $resultado = mysqli_query($conexion, $sql);

                if (mysqli_num_rows($resultado) > 0) {
                    while ($comentario = mysqli_fetch_assoc($resultado)) {
                        echo "<p><strong>" . htmlspecialchars($comentario['nombre']) . ":</strong> " . htmlspecialchars($comentario['comentario']) . "</p>";
                    }
                } else {
                    echo "<p>Aún no hay comentarios.</p>";
                }

                mysqli_close($conexion);
                ?>
            </div>
        </section>
    </div>
</body>
</html>
