<?php
$host = "localhost";
$user = "root";
$pass = ""; // Cambia según tu configuración
$dbname = "sistema_login";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Error al conectar: " . $conn->connect_error);
}
?>

