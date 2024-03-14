<?php
// Conexión a la base de datos
include('conexion.php');


// Recibir datos del formulario
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$role = $_POST['role'];

// Insertar datos en la base de datos
$sql = "INSERT INTO usuarios (username, password, role) VALUES ('$username', '$password', '$role')";

if ($conn->query($sql) === TRUE) {
    header('location: login.html');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

