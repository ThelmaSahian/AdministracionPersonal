<?php
require('../fpdf/pdf.php');
include "../config.php";

$sql = "SELECT us.id ,us.name, ch.fecha, ch.fechaEntrada, ch.fechaSalida FROM checkin_form AS ch INNER JOIN user_form AS us ON ch.idEmpleado = us.id";
$result = $conn -> query($sql);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);
$pdf->Cell(40,10,utf8_decode('Reporte de Asistencia'));
$pdf->Ln(15);
$pdf->SetFont('Arial','',12);

$pdf->SetDrawColor(255, 255, 255);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFillColor(165,28,48);
$pdf->Cell(8,10,'ID',1,0,'L',1);
$pdf->Cell(50,10,'Nombre',1,0,'L',1);
$pdf->Cell(40,10,'Fecha',1,0,'L',1);
$pdf->Cell(45,10,'Fecha Entrada',1,0,'L',1);
$pdf->Cell(45,10,'Fecha Salida',1,1,'L',1);

$pdf->SetTextColor(0, 0, 0);
while($row = $result->fetch_assoc()){
  $pdf->Cell(8,10,$row['id'],1,0,'L',0);
  $pdf->Cell(50,10,$row['name'],1,0,'L',0);
  $pdf->Cell(40,10,$row['fecha'],1,0,'L',0);
  $pdf->Cell(45,10,$row['fechaEntrada'],1,0,'L',0);
  $pdf->Cell(45,10,$row['fechaSalida'],1,1,'L',0);
}

$pdf->Output();



?>
