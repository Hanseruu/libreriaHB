<?php
session_start();

// Verificar si el usuario está logueado (si el nombre está en la sesión)
if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit;
}

include('connect.php');

// Obtener la lista de libros y autores
$sql = "
    SELECT 
        t.titulo AS titulo, 
        GROUP_CONCAT(a.nombre SEPARATOR ', ') AS autores
    FROM 
        titulos t
    LEFT JOIN 
        titulo_autor ta ON t.id_titulo = ta.id_titulo
    LEFT JOIN 
        autores a ON ta.id_autor = a.id_autor
    GROUP BY 
        t.id_titulo, t.titulo;
";

$stmt = $pdo->query($sql);
$libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Librería</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        /* Para alinear el nombre y el icono de usuario en la parte superior derecha */
        .user-info {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-top: 10px;
        }
        .user-info i {
            font-size: 30px;
            margin-right: 8px;
        }
        .user-info span {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Librería</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="homepage.php">Libros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="autores.php">Autores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contacto.php">Contacto</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Muestra el nombre del usuario y su ícono en la parte superior derecha -->
        <div class="user-info">
            <i class="fas fa-user-circle"></i>
            <span><?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
        </div>

        <h2>Lista de Libros y Autores</h2>
        <?php if (count($libros) > 0): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Autores</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($libros as $libro): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($libro['titulo']); ?></td>
                            <td><?php echo htmlspecialchars($libro['autores']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No se encontraron libros.</p>
        <?php endif; ?>
    </div>
            
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
