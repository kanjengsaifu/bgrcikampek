<?php
include 'timezone.php';
include 'config.php';
require('../assets/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('../logo/malasngoding.png',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'BGR SUB CIKAMPEK',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 0038XXXXXXX',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'JL. CIKAMPEK',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'website : --------------------------------',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Data Vendor",0,10,'L');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'L');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->MultiCell(19.5,0.5,'Nama',0,'L'); 
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'L');
$pdf->Cell(7, 0.8, 'Nama Vednor', 1, 0, 'L');
$pdf->Cell(3, 0.8, 'Alamat', 1, 0, 'L');
$pdf->Cell(4, 0.8, 'npwp', 1, 0, 'L');
$pdf->Cell(4.5, 0.8, 'nm_pimpinan', 1, 1, 'L');

$pdf->SetFont('Arial','',10);
$no=1;
$query=mysql_query("select * from tb_vendor");
while($lihat=mysql_fetch_array($query)){
	$pdf->MultiCell(19.5,0.5, $lihat['nm_vendor'],0,'L'); 
	$pdf->Cell(1, 0.8, $no , 1, 0, 'L');
	$pdf->Cell(7, 0.8, $lihat['nm_vendor'],1, 0, 'L');
	$pdf->Cell(3, 0.8, $lihat['alamat'], 1, 0,'L');
	$pdf->Cell(4, 0.8, $lihat['npwp'],1, 0, 'L');
	$pdf->Cell(4.5, 0.8, $lihat['nm_pimpinan'], 1, 1,'L');
	

	$no++;
}

$pdf->Output("laporan_vendor.pdf","I");

?>

