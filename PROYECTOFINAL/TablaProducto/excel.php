<?php
require ("../config.inc.php");
require('../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$conexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);


$conn = new mysqli($servername,$username,$password,$dbname);
    $consulta="SELECT producto.*, venta.metodopago AS metodopago_venta,
    compra.fecha AS fecha_compra
    from producto
    JOIN venta ON producto.idVenta = venta.idVenta
    JOIN compra ON producto.idCompra = compra.idCompra";
    $datos = $conn->query($consulta);

$statement = $conexion->query($consulta);
$datos = $statement->fetchAll(PDO::FETCH_ASSOC);

$excel = new Spreadsheet();
$hojaActiva =  $excel->getActiveSheet();
$hojaActiva->setTitle("LibroProducto");

$hojaActiva->setCellValue('A1', 'Nombre');
$hojaActiva->setCellValue('B1', 'Cantidad');
$hojaActiva->setCellValue('C1', 'Categoria');
$hojaActiva->setCellValue('D1', 'Stock');
$hojaActiva->setCellValue('E1', 'Metodo Pago');
$hojaActiva->setCellValue('F1', 'Fecha');
$Fila = 2;

foreach ($datos as $row) {
    $hojaActiva->getColumnDimension('A')->setWidth(20);
    $hojaActiva->setCellValue('A'.$Fila, $row['nombre']);
    $hojaActiva->getColumnDimension('B')->setWidth(20);
    $hojaActiva->setCellValue('B'.$Fila, $row['cantidad']);
    $hojaActiva->getColumnDimension('C')->setWidth(20);
    $hojaActiva->setCellValue('C'.$Fila, $row['categoria']);
    $hojaActiva->getColumnDimension('D')->setWidth(20);
    $hojaActiva->setCellValue('D'.$Fila, $row['stock']);
    $hojaActiva->getColumnDimension('E')->setWidth(20);
    $hojaActiva->setCellValue('E'.$Fila, $row['metodopago_venta']);
    $hojaActiva->getColumnDimension('F')->setWidth(20);
    $hojaActiva->setCellValue('F'.$Fila, $row['fecha_compra']);
    $hojaActiva->getColumnDimension('G')->setWidth(20);;
    $Fila++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="LibroProducto.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;
?>