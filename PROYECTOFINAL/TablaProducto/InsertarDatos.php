<?php

$nombre = $_POST["nombre"];
$cantidad = $_POST["cantidad"];
$categoria = $_POST["categoria"];
$stock = $_POST["stock"];
$metodopago = $_POST["metodopago"];
$fecha = $_POST["fecha"];

require_once('../config.inc.php');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO producto (nombre, cantidad, categoria, stock, idVenta, idCompra)
VALUES ('".$nombre."', '".$cantidad."', '".$categoria."', '".$stock."' , '".$metodopago."' , '".$fecha."')";

if ($conn->query($sql) === TRUE)
{
  $conn->close();
  header("location:TablaProducto.php");

} else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>