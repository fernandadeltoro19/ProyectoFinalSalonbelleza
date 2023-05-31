<?php

$idRepresentante = $_POST["idRepresentante"];

require_once('../config.inc.php');

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// sql to delete a record
$sql = "DELETE FROM representante WHERE idRepresentante='" . $idRepresentante . "'";
if (mysqli_query($conn, $sql))
{
  $conn->close();
  header("location:TablaRepresentante.php");
} else 
{
  echo "Error al eliminar Representante: " . mysqli_error($conn);
}


mysqli_close($conn);

?>