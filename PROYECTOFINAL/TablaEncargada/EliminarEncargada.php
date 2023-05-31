<?php

$idEncargada = $_POST["idEncargada"];

require_once('../config.inc.php');

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// sql to delete a record
$sql = "DELETE FROM encargada WHERE idEncargada='" . $idEncargada . "'";
if (mysqli_query($conn, $sql))
{
  $conn->close();
  header("location:TablaEncargada.php");
} else 
{
  echo "Error al eliminar Encargada: " . mysqli_error($conn);
}


mysqli_close($conn);

?>