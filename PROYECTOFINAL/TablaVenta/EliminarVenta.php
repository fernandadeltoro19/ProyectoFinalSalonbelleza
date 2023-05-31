<?php
$idVenta = $_POST["idVenta"];

require_once('../config.inc.php');

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$sql = "DELETE FROM venta WHERE idVenta='" . $idVenta . "'";

if (mysqli_query($conn, $sql))
{
  $conn->close();
  header("location:TablaVenta.php");
} else {
  echo "Error al eliminar Venta: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
