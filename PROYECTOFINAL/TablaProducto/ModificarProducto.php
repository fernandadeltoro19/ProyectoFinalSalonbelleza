<?php
$idProducto = $_POST["idProducto"];
$nombre = $_POST["nombre"];
$cantidad = $_POST["cantidad"];
$categoria = $_POST["categoria"];
$stock = $_POST["stock"];

require_once('../config.inc.php');

// Crear la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE producto SET nombre='" . $nombre . "', cantidad='" . $cantidad . "', categoria='" . $categoria . "', stock='" . $stock . "' WHERE idProducto='" . $idProducto . "'";

if ($conn->query($sql) === TRUE) {
    $conn->close();
    header("location:TablaProducto.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>