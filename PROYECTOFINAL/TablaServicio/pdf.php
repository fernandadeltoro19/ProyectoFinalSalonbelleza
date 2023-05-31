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
        $this->Cell(70,10,'Servicio',0,0,'C');
        // Salto de línea
        $this->Ln(20);

        $this->SetFont('Arial','B',7);
        $this->Cell(25,10,'Nombre',1,0,'C',0);
        $this->Cell(25,10,'Precio',1,0,'C',0);
        $this->Cell(30,10,'Duracion',1,0,'C',0);
        $this->Cell(20,10,'Descripcion',1,0,'C',0);
        $this->Cell(40,10,'Metodo Pago',1,0,'C',0);
        $this->Cell(40,10,'Nombre Cliente',1,1,'C',0);
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
$consulta="SELECT servicio.*, venta.metodopago AS metodopago_venta,
cliente.nombre AS nombre_cliente
FROM servicio
JOIN venta ON servicio.idVenta = venta.idVenta
JOIN cliente ON servicio.idCliente = cliente.idCliente";
$datos = $conn->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',7);

while ($row = $datos->fetch_assoc()) {
    $pdf->Cell(25,10,$row['nombre'],1,0,'C',0);
    $pdf->Cell(25,10,$row['precio'],1,0,'C',0);
    $pdf->Cell(30,10,$row['duracion'],1,0,'C',0);
    $pdf->Cell(20,10,$row['descripcion'],1,0,'C',0);
    $pdf->Cell(40,10,$row['metodopago_venta'],1,0,'C',0);
    $pdf->Cell(40,10,$row['nombre_cliente'],1,1,'C',0);
}

$pdf->Output('servicio.pdf', 'I');
?>
