<?php
require('../fpdf/pdf.php');
include "../config.php";


$sql = "SELECT * FROM user_form ORDER BY user_type";
$result = $conn ->query ($sql);
$result1 = $conn ->query($sql);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);
$pdf->Cell(40,10,utf8_decode('Reporte de Empleados'));
$pdf->Ln(15);
$pdf->SetFont('Arial','',10);

$pdf->SetDrawColor(255, 255, 255);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFillColor(165,28,48);

$pdf->Cell(8,10,'ID',1,0,'L',1);
$pdf->Cell(80,10,'Nombre',1,0,'L',1);
$pdf->Cell(50,10,'CURP',1,0,'L',1);
$pdf->Cell(50,10,'RFC',1,1,'L',1);

$pdf->SetTextColor(0, 0, 0);

while($row = $result->fetch_assoc()){
  $pdf->Cell(8,10,$row['id'],1,0,'L',0);
  $pdf->Cell(80,10,$row['name'],1,0,'L',0);
  $pdf->Cell(50,10,$row['curp'],1,0,'L',0);
  $pdf->Cell(50,10,$row['rfc'],1,1,'L',0);

}
$pdf->Ln(10);

$pdf->SetDrawColor(255, 255, 255);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFillColor(165,28,48);

$pdf->Cell(8,10,'ID',1,0,'L',1);
$pdf->Cell(60,10,'Email',1,0,'L',1);
$pdf->Cell(30,10,'Telefono',1,0,'L',1);
$pdf->Cell(70,10,'Direccion',1,0,'L',1);
$pdf->Cell(20,10,'Tipo',1,1,'L',1);

$pdf->SetTextColor(0, 0, 0);

while($row1 = $result1->fetch_assoc()){
  $pdf->Cell(8,10,$row1['id'],1,0,'L',0);
  $pdf->Cell(60,10,$row1['email'],1,0,'L',0);
  $pdf->Cell(30,10,$row1['numero'],1,0,'L',0);
  $pdf->Cell(70,10,$row1['direccion'],1,0,'L',0);
  $pdf->Cell(20,10,$row1['user_type'],1,1,'L',0);
}




$pdf->Output();



?>
