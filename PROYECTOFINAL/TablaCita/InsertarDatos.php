<?php

$fecha = $_POST["fecha"];
$nombre = $_POST["nombre"];
$motivo = $_POST["motivo"];
$telefono = $_POST["telefono"];

require_once('../config.inc.php');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO cita (fecha, nombre, motivo, telefono)
VALUES ('".$fecha."', '".$nombre."', '".$motivo."', '".$telefono."')";

if ($conn->query($sql) === TRUE)
{
  $conn->close();
  header("location:TablaCita.php");

} else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>