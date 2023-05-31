<?php
require ("../config.inc.php");
require('../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$conexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

$conn = new mysqli($servername,$username,$password,$dbname);
$consulta="SELECT estilista.*,encargada.nombre AS nombre_encargada, 
cliente.nombre AS nombre_cliente
from estilista
JOIN encargada ON estilista.idEncargada = encargada.idEncargada
JOIN cliente ON estilista.idCliente = cliente.idCliente";

$datos = $conn->query($consulta);
$statement = $conexion->query($consulta);
$datos = $statement->fetchAll(PDO::FETCH_ASSOC);

$excel = new Spreadsheet();
$hojaActiva =  $excel->getActiveSheet();
$hojaActiva->setTitle("LibroEstilista");

$hojaActiva->setCellValue('A1', 'Nombre');
$hojaActiva->setCellValue('B1', 'Apellido Paterno');
$hojaActiva->setCellValue('C1', 'Apellido Materno');
$hojaActiva->setCellValue('D1', 'Edad');
$hojaActiva->setCellValue('E1', 'Nombre Encargada');
$hojaActiva->setCellValue('F1', 'Nombre Cliente');
$Fila = 2;

foreach ($datos as $row) {
    $hojaActiva->getColumnDimension('A')->setWidth(20);
    $hojaActiva->setCellValue('A'.$Fila, $row['nombre']);
    $hojaActiva->getColumnDimension('B')->setWidth(20);
    $hojaActiva->setCellValue('B'.$Fila, $row['apellidopaterno']);
    $hojaActiva->getColumnDimension('C')->setWidth(20);
    $hojaActiva->setCellValue('C'.$Fila, $row['apellidomaterno']); 
    $hojaActiva->getColumnDimension('D')->setWidth(20);
    $hojaActiva->setCellValue('D'.$Fila, $row['edad']);
    $hojaActiva->getColumnDimension('E')->setWidth(20);
    $hojaActiva->setCellValue('E'.$Fila, $row['nombre_encargada']);
    $hojaActiva->getColumnDimension('F')->setWidth(20);
    $hojaActiva->setCellValue('F'.$Fila, $row['nombre_cliente']);
    $hojaActiva->getColumnDimension('G')->setWidth(20);;
    $Fila++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="LibroEstilista.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;
?>