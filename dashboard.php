<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="dashboard-container">
        <h1>Bienvenido, <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
        <a href="logout.php" class="logout-button">Cerrar Sesión</a>
    </div>
</body>
</html>
