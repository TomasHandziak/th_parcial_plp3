<?php
$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$base_de_datos = "th_parcial_plp3";

$conexion = mysqli_connect($servidor, $usuario, $contraseña, $base_de_datos);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
