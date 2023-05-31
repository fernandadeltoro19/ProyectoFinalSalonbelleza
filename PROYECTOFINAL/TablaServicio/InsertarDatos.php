<?php

$nombre = $_POST["nombre"];
$precio = $_POST["precio"];
$duracion = $_POST["duracion"];
$descripcion = $_POST["descripcion"];
$metodopago = $_POST["metodopago"];
$nombrecliente = $_POST["nombrecliente"];

require_once('../config.inc.php');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO servicio (nombre, precio, duracion, descripcion, idVenta, idCliente)
VALUES ('".$nombre."', '".$precio."', '".$duracion."', '".$descripcion."' ,'".$metodopago."' ,'".$nombrecliente."')";

if ($conn->query($sql) === TRUE)
{
  $conn->close();
  header("location:TablaServicio.php");

} else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>