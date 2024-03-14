<?php
session_start();

// Conexión a la base de datos
include('conexion.php');

// Recibir datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Verificar credenciales
$sql = "SELECT * FROM usuarios WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    if (password_verify($password, $row['password'])) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $row['role'];

        header('location: index.html');
    } else {
        echo "Contraseña incorrecta";
    }
} else {
    echo "Usuario no encontrado";
}

$conn->close();
?>
