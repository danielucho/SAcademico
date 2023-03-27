<?php
include ("../../fpdf/fpdf.php");

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image("../img/logo_loreto_cetal.png", 10, 5, 15);
    // Arial bold 15
    $this->SetFont("Arial", "B", 12);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(25);
    $this->Ln(2);
    $this->Cell(160, 10, utf8_decode("REPORTE DE MATERIÁS"), 0, 0, "C");
    $this->SetFont("Arial", "", 9);
    $this->Cell(25, 10, "Fecha".date("d/m/Y"), 0, 1, "C");
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

/*
// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
for($i=1;$i<=40;$i++)
    $pdf->Cell(0,10,'Imprimiendo línea número '.$i,0,1);
$pdf->Output();
*/