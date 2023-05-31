<?php

$idServicio = $_POST["idServicio"];

require_once('../config.inc.php');

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// sql to delete a record
$sql = "DELETE FROM servicio WHERE idServicio='" . $idServicio . "'";
if (mysqli_query($conn, $sql))
{
  $conn->close();
  header("location:TablaServicio.php");
} else 
{
  echo "Error al eliminar Servicio: " . mysqli_error($conn);
}


mysqli_close($conn);

?>