<?php
$idVenta = $_POST["idVenta"];
$fecha = $_POST["fecha"];
$cantidad = $_POST["cantidad"];
$metodopago = $_POST["metodopago"];
$numeroventa = $_POST["numeroventa"];

require_once('../config.inc.php');

// Crear la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE venta SET fecha='" . $fecha . "', cantidad='" . $cantidad . "', metodopago='" . $metodopago . "', numeroventa='" . $numeroventa . "' WHERE idVenta='" . $idVenta . "'";

if ($conn->query($sql) === TRUE) {
    $conn->close();
    header("location:TablaVenta.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>