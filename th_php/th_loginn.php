<?php
session_start();
include 'th_conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        $usuario = mysqli_fetch_assoc($resultado);
        if (password_verify($contraseña, $usuario['contraseña'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nombre'] = $usuario['nombre'];
            header("Location: ../th_index_login.php");
            exit();
        } else {
            echo '
                <script>
                alert("Usuario no existe");
                window.location = "../th_login.php";
                </script>
            ';      
            exit();   
        }
    } 

    mysqli_close($conexion);
}
?>
