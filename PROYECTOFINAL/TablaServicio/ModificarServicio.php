<?php
$idServicio = $_POST["idServicio"];
$nombre = $_POST["nombre"];
$precio = $_POST["precio"];
$duracion = $_POST["duracion"];
$descripcion = $_POST["descripcion"];

require_once('../config.inc.php');

// Crear la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE servicio SET nombre='" . $nombre . "', precio='" . $precio . "', duracion='" . $duracion . "', descripcion='" . $descripcion . "' WHERE idServicio='" . $idServicio . "'";

if ($conn->query($sql) === TRUE) {
    $conn->close();
    header("location:TablaServicio.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>