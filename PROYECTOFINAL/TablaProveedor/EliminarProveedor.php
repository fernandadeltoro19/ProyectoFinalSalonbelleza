<?php

$idProveedor = $_POST["idProveedor"];

require_once('../config.inc.php');

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// sql to delete a record
$sql = "DELETE FROM proveedor WHERE idProveedor='" . $idProveedor . "'";
if (mysqli_query($conn, $sql))
{
  $conn->close();
  header("location:TablaProveedor.php");
} else 
{
  echo "Error al eliminar Proveedor: " . mysqli_error($conn);
}


mysqli_close($conn);

?>