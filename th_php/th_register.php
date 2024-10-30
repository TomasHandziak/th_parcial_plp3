<?php
include 'th_conexion.php';


    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre, correo, contraseña) VALUES ('$nombre', '$correo', '$contraseña')";

    if (mysqli_query($conexion, $sql)) {
        echo '
            <script>
        window.location = "../th_login.php";
        </script>
        ';
    } else {
        echo "Error: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);

?>
