<?php
require ("../conn.php");
$consulta="SELECT * FROM cliente WHERE estatus = 1";
$resultado = $conn->query($consulta);

$grupos = array();

while ($row = $resultado->fetch_assoc()) {
    $grupo = array(
        'nombre' => $row['apellidopaterno'],
        'apellidomaterno' => $row['telefono'],
    );

    $grupos[] = $grupo;
}

$conn->close();

$json = json_encode($grupos);

header('Content-type: application/json');
header('Content-Disposition: attachment; filename="cliente.json"');
header('Content-Length: ' . strlen($json));

echo $json;
exit();
?>