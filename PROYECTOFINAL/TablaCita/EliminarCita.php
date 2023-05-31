<?php

$idCita = $_POST["idCita"];

require_once('../config.inc.php');

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// sql to delete a record
$sql = "DELETE FROM cita WHERE idCita='" . $idCita . "'";
if (mysqli_query($conn, $sql))
{
  $conn->close();
  header("location:TablaCita.php");
} else 
{
  echo "Error al eliminar Cita: " . mysqli_error($conn);
}


mysqli_close($conn);

?>