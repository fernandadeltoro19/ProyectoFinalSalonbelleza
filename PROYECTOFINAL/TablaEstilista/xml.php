<?php
require ("../conn.php");
$consulta="Select * from estilista WHERE estatus = 1";
$resultado = $conn->query($consulta);

$xml = new XMLWriter();
$xml->openURI('estilista.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

$xml->startElement('tabla');

while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('estilista');
    $xml->writeElement('nombre', $row['nombre']);
    $xml->writeElement('apellidopaterno', $row['apellidopaterno']);
    $xml->writeElement('apellidomaterno', $row['apellidomaterno']);
    $xml->writeElement('edad', $row['edad']);
    $xml->endElement(); 
}
$xml->endElement();
$xml->endDocument();
$xml->flush();

$conn->close();

header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename="estilista.xml"');
header('Content-Length: ' . filesize('estilista.xml'));

readfile('estilista.xml');
exit();
?>