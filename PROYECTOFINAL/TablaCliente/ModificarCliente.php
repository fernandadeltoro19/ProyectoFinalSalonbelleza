<?php
$idCliente = $_POST["idCliente"];
$nombre = $_POST["nombre"];
$apellidopaterno = $_POST["apellidopaterno"];
$apellidomaterno = $_POST["apellidomaterno"];
$telefono = $_POST["telefono"];

require_once('../config.inc.php');

// Crear la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE cliente SET nombre='" . $nombre . "', apellidopaterno='" . $apellidopaterno . "', apellidomaterno='" . $apellidomaterno . "', telefono='" . $telefono . "' WHERE idCliente='" . $idCliente . "'";

if ($conn->query($sql) === TRUE) {
    $conn->close();
    header("location:TablaCliente.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
