<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "piaa";
// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Verificar si se ha enviado un formulario con método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    
    // Preparar la consulta SQL para insertar un nuevo producto
    $sql = "INSERT INTO productos (nombre, cantidad) VALUES ('$nombre', '$cantidad')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        // Redireccionar a agregar.html con mensaje de éxito
        header("Location: agregar.html?mensaje=Producto%20agregado%20correctamente");
        exit;
    } else {
        // Redireccionar a agregar.html con mensaje de error
        header("Location: agregar.html?mensaje=Error%20al%20agregar%20el%20producto:%20" . $conn->error);
        exit;
    }
}

// Cerrar la conexión
$conn->close();
?>


