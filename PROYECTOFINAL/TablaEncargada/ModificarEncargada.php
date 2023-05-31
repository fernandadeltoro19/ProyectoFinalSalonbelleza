<?php
$idEncargada = $_POST["idEncargada$idEncargada"];
$nombre = $_POST["nombre"];
$apellidopaterno = $_POST["apellidopaterno"];
$apellidomaterno = $_POST["apellidomaterno"];
$edad = $_POST["edad"];

require_once('../config.inc.php');

// Crear la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE encargada SET nombre='" . $nombre . "', apellidopaterno='" . $apellidopaterno . "', apellidomaterno='" . $apellidomaterno . "', edad='" . $edad . "' WHERE idEncargada$idEncargada='" . $idEncargada . "'";

if ($conn->query($sql) === TRUE) {
    $conn->close();
    header("location:TablaEncargada.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();