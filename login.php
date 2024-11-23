<?php
session_start();

// Comprobar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];  // Solo necesitamos el nombre

    // Guardamos el nombre en la sesión
    $_SESSION['user_name'] = $nombre;

    // Redirigimos a la página principal
    header("Location: homepage.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h2>Iniciar sesión</h2>
        <form action="login.php" method="POST">
            <label for="nombre">Nombre de usuario:</label>
            <input type="text" name="nombre" id="nombre" required>
            
            <button type="submit">Iniciar sesión</button>
        </form>
    </div>
</body>
</html>
