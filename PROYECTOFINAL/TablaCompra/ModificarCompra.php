<?php
$idCompra = $_POST["idCompra"];
$cantidad = $_POST["cantidad"];
$fecha = $_POST["fecha"];
$metodopago = $_POST["metodopago"];
$numerocompra = $_POST["numerocompra"];

require_once('../config.inc.php');

// Crear la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE compra SET cantidad='" . $cantidad . "', fecha='" . $fecha . "', metodopago='" . $metodopago . "', numerocompra='" . $numerocompra . "' WHERE idCompra='" . $idCompra . "'";

if ($conn->query($sql) === TRUE) {
    $conn->close();
    header("location:TablaCompra.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>