<?php
session_start();
include 'th_conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['usuario_id'])) {
    $usuario_id = $_SESSION['usuario_id'];
    $nombre = $_SESSION['usuario_nombre'];
    $comentario = $_POST['comentario'];

    $sql = "INSERT INTO comentarios (usuario_id, nombre, comentario) VALUES ('$usuario_id', '$nombre', '$comentario')";

    if (mysqli_query($conexion, $sql)) {
        header("Location: ../th_index_login.php");
        exit();
    } else {
        echo "Error al guardar el comentario: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);
} else {
    echo "No estás autorizado para comentar.";
}
?>
