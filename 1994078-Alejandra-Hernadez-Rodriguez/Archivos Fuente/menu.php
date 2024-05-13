<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Inventario</title>
    <link rel="stylesheet" href="menu.css">
</head>
<body>
    <div class="container">
        <div class="menu-container">
            <h1>Gestión de Inventario</h1>
            
            <nav>
                <ul>
                    <li><a href="menu.php">Inicio</a></li> <!-- Cambiar el archivo a menu.php -->
                    <li><a href="stock.html">Inventario</a></li>
                    <li><a href="pedidos.html">Pedidos</a></li>
                    <li><a href="agregar.html">Agregar Nuevos Productos</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="content-container">
        <!-- Contenido dinámico de la página -->
        <h2>Funkos Disponibles</h2>
        <div class="funko-container"> 
            <?php
            // Conectar a la base de datos (reemplaza con tus propios datos de conexión)
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "pia";

            // Crear conexión
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verificar la conexión
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Preparar y ejecutar consulta SQL para obtener productos
            $sql = "SELECT * FROM productos";
            $result = $conn->query($sql);

            // Mostrar productos en la página HTML
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="funko">';
                    echo '<h3>' . $row["nombre"] . '</h3>';
                    echo '<p>Cantidad en stock: ' . $row["cantidad"] . '</p>';
                    // Aquí puedes mostrar la imagen si la guardaste en la base de datos
                    echo '</div>';
                }
            } else {
                echo "No se encontraron productos.";
            }

            // Cerrar la conexión
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
