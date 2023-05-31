<?php

$nombre = $_POST["nombre"];
$apellidopaterno = $_POST["apellidopaterno"];
$apellidomaterno = $_POST["apellidomaterno"];
$telefono = $_POST["telefono"];

require_once('../config.inc.php');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO proveedor (nombre, apellidopaterno, apellidomaterno, telefono)
VALUES ('".$nombre."', '".$apellidopaterno."', '".$apellidomaterno."', '".$telefono."')";

if ($conn->query($sql) === TRUE)
{
  $conn->close();
  header("location:TablaProveedor.php");

} else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>