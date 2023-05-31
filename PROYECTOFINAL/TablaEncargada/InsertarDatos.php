<?php

$nombre = $_POST["nombre"];
$apellidopaterno = $_POST["apellidopaterno"];
$apellidomaterno = $_POST["apellidomaterno"];
$edad = $_POST["edad"];

require_once('../config.inc.php');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO encargada (nombre, apellidopaterno, apellidomaterno, edad)
VALUES ('".$nombre."', '".$apellidopaterno."', '".$apellidomaterno."', '".$edad."')";

if ($conn->query($sql) === TRUE)
{
  $conn->close();
  header("location:TablaEncargada.php");

} else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>