<?php
require ("../conn.php");
$consulta="Select * from representante WHERE estatus = 1";
$resultado = $conn->query($consulta);

$xml = new XMLWriter();
$xml->openURI('representante.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

$xml->startElement('tabla');

while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('representante');
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
header('Content-Disposition: attachment; filename="representante.xml"');
header('Content-Length: ' . filesize('representante.xml'));

readfile('representante.xml');
exit();
?>