<?php
$idCita = $_POST["idCita"];
$fecha = $_POST["fecha"];
$nombre = $_POST["nombre"];
$motivo = $_POST["motivo"];
$telefono = $_POST["telefono"];

require_once('../config.inc.php');

// Crear la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE cita SET fecha='" . $fecha . "', nombre='" . $nombre . "', motivo='" . $motivo . "', telefono='" . $telefono . "' WHERE idCita='" . $idCita . "'";

if ($conn->query($sql) === TRUE) {
    $conn->close();
    header("location:TablaCita.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>