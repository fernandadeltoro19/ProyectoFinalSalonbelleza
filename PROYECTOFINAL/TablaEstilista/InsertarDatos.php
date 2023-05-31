<?php

$nombre = $_POST["nombre"];
$apellidopaterno = $_POST["apellidopaterno"];
$apellidomaterno = $_POST["apellidomaterno"];
$edad = $_POST["edad"];
$encargada = $_POST["encargada"];
$cliente = $_POST["cliente"];
require_once('../config.inc.php');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO estilista (nombre, apellidopaterno, apellidomaterno, edad, idEncargada, idCliente)
VALUES ('".$nombre."', '".$apellidopaterno."', '".$apellidomaterno."', '".$edad."' , '".$encargada."' , '".$cliente."')";

if ($conn->query($sql) === TRUE)
{
  $conn->close();
  header("location:TablaEstilista.php");

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  

$conn->close();


?>