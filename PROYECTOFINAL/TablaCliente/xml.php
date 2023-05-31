<?php
require ("../conn.php");
$consulta="Select * from cliente WHERE estatus = 1";
$resultado = $conn->query($consulta);

$xml = new XMLWriter();
$xml->openURI('cliente.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

$xml->startElement('tabla');

while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('cliente');
    $xml->writeElement('nombre', $row['nombre']);
    $xml->writeElement('apellidopaterno', $row['apellidopaterno']);
    $xml->writeElement('apellidomaterno', $row['apellidomaterno']);
    $xml->writeElement('telefono', $row['telefono']);
    $xml->endElement(); 
}
$xml->endElement();
$xml->endDocument();
$xml->flush();

$conn->close();

header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename="cliente.xml"');
header('Content-Length: ' . filesize('cliente.xml'));

readfile('cliente.xml');
exit();
?>