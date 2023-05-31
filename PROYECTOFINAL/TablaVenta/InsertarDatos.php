<?php
$fecha = $_POST["fecha"];
$cantidad = $_POST["cantidad"];
$metodopago = $_POST["metodopago"];
$numeroventa = $_POST["numeroventa"];

require_once('../config.inc.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO venta (fecha, cantidad, metodopago, numeroventa)
VALUES ('".$fecha."', '".$cantidad."', '".$metodopago."', '".$numeroventa."')";

if ($conn->query($sql) === TRUE)
{
  $conn->close();
  header("location:TablaVenta.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
