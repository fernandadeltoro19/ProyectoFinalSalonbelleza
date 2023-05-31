<?php

$cantidad = $_POST["cantidad"];
$fecha = $_POST["fecha"];
$metodopago = $_POST["metodopago"];
$numerocompra = $_POST["numerocompra"];
$encargada = $_POST["encargada"];
$proveedor = $_POST["proveedor"];

require_once('../config.inc.php');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO compra (cantidad, fecha, metodopago, numerocompra, idEncargada, idProveedor)
VALUES ('".$cantidad."', '".$fecha."', '".$metodopago."', '".$numerocompra."' , '".$encargada."' , '".$proveedor."')";

if ($conn->query($sql) === TRUE)
{
  $conn->close();
  header("location:TablaCompra.php");

} else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>