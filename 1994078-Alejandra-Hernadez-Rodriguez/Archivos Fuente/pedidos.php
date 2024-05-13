<?php
// Conexión a la base de datos
$servername = $servername = "localhost";
$username = "root";
$password = "";
$dbname = "piaa";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];

// Preparar la consulta SQL para insertar los datos en la tabla de pedidos
$sql = "INSERT INTO pedidos (producto, cantidad) VALUES ('$producto', $cantidad)";

if ($conn->query($sql) === TRUE) {

	 header("Location: pedidos.html?mensaje=Producto%20agregado%20correctamente");
        exit;
} else {
   
	header("Location: pedidos.html?mensaje=Error%20al%20agregar%20el%20producto:%20" . $conn->error);
        exit;
}

$conn->close();
?>
