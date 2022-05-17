<?php
require('../fpdf/pdf.php');
include "../config.php";

$sql = "SELECT * FROM materia_prima";
$result = $conn ->query ($sql);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);
$pdf->Cell(40,10,utf8_decode('Reporte de Recursos'));
$pdf->Ln(15);
$pdf->SetFont('Arial','',12);

$pdf->SetDrawColor(255, 255, 255);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFillColor(165,28,48);

$pdf->Cell(8,10,'ID',1,0,'L',1);
$pdf->Cell(40,10,'Nombre',1,0,'L',1);
$pdf->Cell(45,10,'Descripcion',1,0,'L',1);
$pdf->Cell(35,10,'Unidad Medida',1,0,'L',1);
$pdf->Cell(20,10,'Cantidad',1,0,'L',1);
$pdf->Cell(20,10,'Precio',1,0,'L',1);
$pdf->Cell(20,10,'Codigo',1,1,'L',1);

$pdf->SetTextColor(0, 0, 0);

while($row = $result->fetch_assoc()){
  $pdf->Cell(8,10,$row['IdProducto'],1,0,'L',0);
  $pdf->Cell(40,10,$row['NombreProducto'],1,0,'L',0);
  $pdf->Cell(45,10,$row['DescripcionProducto'],1,0,'L',0);
  $pdf->Cell(35,10,$row['UnidadMedida'],1,0,'L',0);
  $pdf->Cell(20,10,$row['Cantidad'],1,0,'L',0);
  $pdf->Cell(20,10,$row['Precio'],1,0,'L',0);
  $pdf->Cell(20,10,$row['CodigoProducto'],1,1,'L',0);
}

$pdf->Output();



?>
