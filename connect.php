<?php

$host = 'localhost';
$port = 3307;  // Si estás usando XAMPP, el puerto puede ser 3307
$dbname = 'libreria';
$username = 'root';
$password = '0908';  // Cambia esto si tienes una contraseña diferente

try {
    // Conexión a la base de datos con el puerto 3307
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

?>