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
        $this->Cell(70,10,'Encargada',0,0,'C');
        // Salto de línea
        $this->Ln(20);

        $this->SetFont('Arial','B',10);
        $this->Cell(25,10,'Nombre',1,0,'C',0);
        $this->Cell(35,10,'Apellido Paterno',1,0,'C',0);
        $this->Cell(35,10,'Apellido Materno',1,0,'C',0);
        $this->Cell(20,10,'Edad',1,0,'C',0);
        $this->Ln(); // Salto de línea después de la fila de encabezado
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
$consulta="SELECT * FROM encargada";
$datos = $conn->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);

while ($row = $datos->fetch_assoc()) {
    $pdf->Cell(25,10,$row['nombre'],1,0,'C',0);
    $pdf->Cell(35,10,$row['apellidopaterno'],1,0,'C',0);
    $pdf->Cell(35,10,$row['apellidomaterno'],1,0,'C',0);
    $pdf->Cell(20,10,$row['edad'],1,0,'C',0);
    $pdf->Ln(); // Salto de línea después de cada fila
} 

$pdf->Output('encargada.pdf', 'I');
?>
