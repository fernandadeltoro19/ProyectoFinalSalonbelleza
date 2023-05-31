<?php

$idCita = $_POST["idCita"];
$fecha = $_POST["fecha"];
$nombre = $_POST["nombre"];
$motivo = $_POST["motivo"];
$telefono = $_POST["telefono"];

require_once('../config.inc.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE cita SET fecha='" . $fecha . "', nombre='" . $nombre . "', motivo='" . $motivo . "', telefono='" . $telefono . "' WHERE idCita='" . $idCita . "'";

if ($conn->query($sql) === TRUE) {
    $conn->close();
    header("location: ModificarCita.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
