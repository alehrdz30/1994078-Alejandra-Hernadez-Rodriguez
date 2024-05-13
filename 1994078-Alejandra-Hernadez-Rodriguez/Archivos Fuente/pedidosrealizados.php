
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Productos</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 100px;
        }
        table, th, td {
            border: 2px solid black;
            padding: 8px;
            text-align: left;
        }
		.styled-table {
    width: 90%;
    border-collapse: collapse;
    background-color: #ffffff;
    border: 1px solid #dddddd;
}

.styled-table th,
.styled-table td 
{
    padding: 20px 15px;
    text-align: center;
}

.styled-table th 
{
    background-color: #f8f8f8;
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-child(even)
 {
    background-color: #f2f2f2;
}

.styled-table tbody tr:hover 
{
    background-color: #ddd;
}

h2{
	text-align:center;
}
    </style>
</head>
<body>

<h2>Lista de pedidos</h2>

<table class="styled-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Cantidad</th>
        </tr>
    </thead>
    <tbody>
	
	

    <?php
    // Establecer conexión con la base de datos
    $conexion = new mysqli('localhost', 'root', '', 'piaa');

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    // Consulta SQL para obtener los productos
    $sql = "SELECT producto,cantidad FROM pedidos";

    $resultado = $conexion->query($sql);

    // Verificar si se obtuvieron resultados
    if ($resultado->num_rows > 0) {
        // Iterar sobre los resultados y mostrar cada producto en una fila de la tabla
        while($fila = $resultado->fetch_assoc()) {
            echo "<td>" . $fila['producto'] . "</td>";
            echo "<td>" . $fila['cantidad'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "No se encontraron productos.";
    }

    // Cerrar la conexión
    $conexion->close();
    ?>

    </tbody>
</table>
</body>
</html>