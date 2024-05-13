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
        .styled-table td {
            padding: 20px 15px;
            text-align: center;
        }
        .styled-table th {
            background-color: #f8f8f8;
            border-bottom: 1px solid #dddddd;
        }
        .styled-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .styled-table tbody tr:hover {
            background-color: #ddd;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>

<h2>Funkos en stock</h2>


<?php
// Establecer conexión con la base de datos
$conexion = new mysqli('localhost', 'root', '', 'piaa');

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Consulta SQL para obtener los productos
$sql = "SELECT nombre, cantidad FROM productos";
$resultado = $conexion->query($sql);

// Mostrar la tabla HTML con los productos y botones de acción
echo '<table class="styled-table">';
echo '<thead>';
echo '<tr>';
echo '<th>Nombre</th>';
echo '<th>Cantidad</th>';
echo '<th>Acciones</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $fila['nombre'] . '</td>';
        echo '<td>' . $fila['cantidad'] . '</td>';
        echo '<td>';
        echo '<button onclick="editarProducto(\'' . $fila['nombre'] . '\')">Editar</button>';
        echo '<button onclick="eliminarProducto(\'' . $fila['nombre'] . '\')">Eliminar</button>';
        echo '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="3">No se encontraron productos.</td></tr>';
}

echo '</tbody>';
echo '</table>';

// Cerrar la conexión
$conexion->close();
?>
