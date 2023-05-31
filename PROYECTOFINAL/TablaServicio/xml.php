<?php
require ("../conn.php");
$consulta="Select * from servicio WHERE estatus = 1";
$resultado = $conn->query($consulta);

$xml = new XMLWriter();
$xml->openURI('servicio.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

$xml->startElement('tabla');

while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('servicio');
    $xml->writeElement('nombre', $row['nombre']);
    $xml->writeElement('precio', $row['precio']);
    $xml->writeElement('duracion', $row['duracion']);
    $xml->writeElement('descripcion', $row['descripcion']);
    $xml->endElement(); 
}
$xml->endElement();
$xml->endDocument();
$xml->flush();

$conn->close();

header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename="servicio.xml"');
header('Content-Length: ' . filesize('servicio.xml'));

readfile('servicio.xml');
exit();
?>