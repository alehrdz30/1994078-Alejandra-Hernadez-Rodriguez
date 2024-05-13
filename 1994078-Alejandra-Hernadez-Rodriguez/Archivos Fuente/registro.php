<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = ""; // Contraseña de MySQL, dejar en blanco si no está configurada
$dbname = "piaa";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

// Obtener los datos del formulario
$usuario = $_POST['txtusuario'];
$password = $_POST['txtpassword'];

// Preparar la consulta SQL para insertar datos en la tabla 'login'
$sql = "INSERT INTO login (usuario, password) VALUES ('$usuario', '$password')";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    // Usuario registrado correctamente
    // Redirigir a la página 'registrar.html' con una alerta de confirmación
    echo '<script>alert("Usuario registrado correctamente"); window.location = "registrar.html";</script>';
} else {
    // Error al registrar el usuario
    echo "Error al registrar el usuario: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
