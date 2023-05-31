<?php
require('../PDF/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Arial bold 15
        $this->SetFont('Arial','B',13);
        // Movernos a la derecha
        $this->Cell(60);
        // Título
        $this->Cell(70,10,'Compras',0,0,'C');
        // Salto de línea
        $this->Ln(20);

        $this->SetFont('Arial','B',7);
        $this->Cell(25,10,'Cantidad',1,0,'C',0);
        $this->Cell(25,10,'Fecha',1,0,'C',0);
        $this->Cell(30,10,'MetodoPago',1,0,'C',0);
        $this->Cell(20,10,'NumeroCompra',1,0,'C',0);
        $this->Cell(40,10,'Encargada',1,0,'C',0);
        $this->Cell(40,10,'Proveedor',1,1,'C',0);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
    }
}

require_once('../config.inc.php');

$conn = new mysqli($servername,$username,$password,$dbname);
$consulta = "SELECT compra.*, encargada.nombre AS nombre_encargada, proveedor.nombre AS nombre_proveedor
             FROM compra
             JOIN encargada ON compra.idEncargada = encargada.idEncargada
             JOIN proveedor ON compra.idProveedor = proveedor.idProveedor";
$datos = $conn->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',7); // Tamaño de letra reducido

while ($row = $datos->fetch_assoc()) {
    $pdf->Cell(25,10,$row['cantidad'],1,0,'C',0);
    $pdf->Cell(25,10,$row['fecha'],1,0,'C',0);
    $pdf->Cell(30,10,$row['metodopago'],1,0,'C',0);
    $pdf->Cell(20,10,$row['numerocompra'],1,0,'C',0);
    $pdf->Cell(40,10,$row['nombre_encargada'],1,0,'C',0);
    $pdf->Cell(40,10,$row['nombre_proveedor'],1,1,'C',0);
} 

$pdf->Output('Compras.pdf', 'I');
?>
