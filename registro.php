<?php
include('db.php');

$mensaje = ""; // Variable para mostrar mensajes

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    // Validar si el usuario o el email ya existen
    $check = "SELECT * FROM usuarios WHERE username='$username' OR email='$email'";
    $result = $conn->query($check);

    if ($result->num_rows > 0) {
        $mensaje = "<p class='error'>El usuario o el correo ya están registrados.</p>";
    } else {
        $query = "INSERT INTO usuarios (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($query)) {
            $mensaje = "<p class='success'>Registro completado correctamente.</p>";
        } else {
            $mensaje = "<p class='error'>Error al registrar usuario: " . $conn->error . "</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Registrar Usuario</h2>
        <?= $mensaje ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Usuario" required>
            <input type="email" name="email" placeholder="Correo Electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Registrar</button>
        </form>
        <p><a href="index.php">Inicar Sesion</a></p>
    </div>
</body>
</html>

