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
        $this->Cell(70,10,'Productos',0,0,'C');
        // Salto de línea
        $this->Ln(20);

        $this->Cell(25,10,'Nombre',1,0,'C',0);
        $this->Cell(25,10,'Cantidad',1,0,'C',0);
        $this->Cell(30,10,'Categoria',1,0,'C',0);
        $this->Cell(20,10,'Stock',1,0,'C',0);
        $this->Cell(40,10,'MetodoPago',1,0,'C',0);
        $this->Cell(40,10,'Fecha',1,1,'C',0);
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
    $consulta="SELECT producto.*, venta.metodopago AS metodopago_venta,
    compra.fecha AS fecha_compra
    from producto
    JOIN venta ON producto.idVenta = venta.idVenta
    JOIN compra ON producto.idCompra = compra.idCompra";
    $datos = $conn->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);

while ($row = $datos->fetch_assoc()) {
    $pdf->Cell(25,10,$row['nombre'],1,0,'C',0);
    $pdf->Cell(25,10,$row['cantidad'],1,0,'C',0);
    $pdf->Cell(30,10,$row['categoria'],1,0,'C',0);
    $pdf->Cell(20,10,$row['stock'],1,0,'C',0);
    $pdf->Cell(40,10,$row['metodopago_venta'],1,0,'C',0);
    $pdf->Cell(40,10,$row['fecha_compra'],1,1,'C',0);
} 

$pdf->Output('producto.pdf', 'I');
?>