<?php

$idEstilista = $_POST["idEstilista"];

require_once('../config.inc.php');

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// sql to delete a record
$sql = "DELETE FROM estilista WHERE idEstilista='" . $idEstilista . "'";
if (mysqli_query($conn, $sql))
{
  $conn->close();
  header("location:TablaEstilista.php");
} else 
{
  echo "Error al eliminar Estilista: " . mysqli_error($conn);
}


mysqli_close($conn);

?>