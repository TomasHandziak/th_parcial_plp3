<?php
session_start();
include 'th_php/th_conexion.php';

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
    <title>Blog Interactivo</title>
    <link rel="stylesheet" href="th_styles/th_index.css">
</head>
<body>
    <header class="th_header">
        <img src="th_imagenes/th_logoUCP.png" alt="Logo" class="th_logo">
        <h1 class="th_header-title">PARCIAL</h1>
        <nav class="th_navigation">
            <ul class="th_nav-list">
                <li class="th_nav-item"><a href="#inicio" class="th_nav-link">Inicio</a></li>
                <li class="th_nav-item"><a href="#comentariosNo" class="th_nav-link">Comentarios no registrados</a></li>
                <li class="th_nav-item"><a href="#sobre-nosotros" class="th_nav-link">Sobre Nosotros</a></li>
                <li class="th_nav-item"><a href="th_login.php" class="th_nav-link">Iniciar sesión</a></li>
            </ul>
        </nav>
    </header>

    <section id="inicio">
        <h2>Bienvenidos al Blog del Parcial</h2>
        <h3>Docente: Mgter. Ing. Agustín Encina</h3>
        <h3>Alumno: Tomas Handziak</h3>
        <p>En este blog puedes comentar sin iniciar sesión, pero los comentarios no serán guardados. Al iniciar sesión, sí serán guardados.</p>
    </section>
    
    <div id="th_lista-comentarios">
        <h3>Comentarios de Usuarios Registrados</h3>
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

    <section id="comentariosNo">
        <h2>Comentarios no Registrados</h2>
    
        <article>
            <h3>Comentarios para usuarios no registrados</h3>
            <p>Los comentarios que sean registrados aquí no serán guardados; al actualizar la página, serán eliminados. Debes iniciar sesión para registrar comentarios y guardarlos.</p>
            
            <div class="th_comentarios">
                <h4>Comentarios</h4>
                <div class="th_lista-comentarios" id="comentarios-1"></div>
                
                <form onsubmit="th_agregarComentario(event, 'comentarios-1')">
                    <input type="text" id="nombre-1" placeholder="Tu nombre" required>
                    <textarea id="comentario-1" placeholder="Escribe tu comentario" required></textarea>
                    <button type="submit">Comentar</button>
                </form>
            </div>
        </article>
    </section>
    
    <section id="sobre-nosotros">
        <h2>Sobre Nosotros</h2>
        <p>Estudiante: Tomas Handziak. <br> Este blog consta con un sistema de usuarios para que puedan comentar y almacenar esos comentarios en la base de datos identificando a los usuarios por su id. También se implementa la función utilizando JavaScript, la cual permite a los usuarios comentar, pero esto no se queda guardado en la base de datos.</p>
    </section>

    <footer>
        <p>&copy; 2024 Blog Interactivo. Todos los derechos reservados para Tomas Handziak.</p>
    </footer>

    <script src="th_js/th_index.js"></script>
</body>
</html>
