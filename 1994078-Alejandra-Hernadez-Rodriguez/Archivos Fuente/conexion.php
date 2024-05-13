<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "piaa";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) 
{
    die("No hay conexión: " . mysqli_connect_error());
}

$nombre = $_POST["txtusuario"];
$pass = $_POST["txtpassword"];

$query = mysqli_query($conn, "SELECT * FROM login WHERE usuario = '" . $nombre . "' and password = '" . $pass . "'");
$nr = mysqli_num_rows($query);

if ($nr == 1)
{
    // Redirige a menu.html si los datos son válidos
    header("Location: menu.html");
    exit; // Asegúrate de que el script se detenga después de la redirección
}
else
{
    // Si no hay coincidencias en la base de datos, redirige de nuevo a login.html con una alerta
    echo "<script>alert('Error: Nombre de usuario o contraseña incorrectos');</script>";
    echo "<script>window.location= 'login.html';</script>";
}

?>
