<?php

$idCliente = $_POST["idCliente"];

require_once('../config.inc.php');

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$sql = "DELETE FROM cliente WHERE idCliente='" . $idCliente . "'";
if (mysqli_query($conn, $sql)) {
  $conn->close();
  header("location:TablaCliente.php");
} else {
  echo "Error al eliminar cliente: " . mysqli_error($conn);
}

mysqli_close($conn);

?>
