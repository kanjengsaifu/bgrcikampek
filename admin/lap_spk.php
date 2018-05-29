<?php
include 'timezone.php';
include 'config.php';
require('../assets/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(1,1,1);
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
$pdf->Cell(25.5,0.7,"Laporan Data SPK",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(1, 0.8, 'No', 1, 0, 'C');

$pdf->Cell(4, 0.8, 'No SPK', 				1, 0, 'C');
$pdf->Cell(3, 0.8, 'No Proposal', 			1, 0, 'C');
$pdf->Cell(3, 0.8, 'Surat Jalan', 			1, 0, 'C');
$pdf->Cell(3, 0.8, 'Tanggal SPK Terbit',	1, 0, 'C');
$pdf->Cell(2, 0.8, 'Tanggal SPK Berakhir',	1, 0, 'C');
$pdf->Cell(2, 0.8, 'Jangka Waktu', 			1, 0, 'C');
$pdf->Cell(2, 0.8, 'Asal', 					1, 0, 'C');
$pdf->Cell(2, 0.8, 'Tujuan', 				1, 0, 'C');
$pdf->Cell(2, 0.8, 'Jumlah rit', 			1, 0, 'C');
$pdf->Cell(2, 0.8, 'Realiasi Rit', 			1, 0, 'C');
$pdf->Cell(2, 0.8, 'Harga Rit', 			1, 0, 'C');
$pdf->Cell(2, 0.8, 'Nilai SPK', 			1, 0, 'C');
$pdf->Cell(2, 0.8, 'Biaya', 				1, 0, 'C');
$pdf->Cell(2, 0.8, 'Laba Rugi', 			1, 0, 'C');
$pdf->Cell(2, 0.8, 'PM', 					1, 0, 'C');
$pdf->Cell(2, 0.8, 'Tujuan', 				1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$query=mysql_query("select * from spk");
while($lihat=mysql_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 						1, 0, 'C');
	$pdf->Cell(4, 0.8, $lihat['no_spk'],			1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['no_proposal'], 		1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['surlan'],			1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['tgl_spk_terbit'], 	1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['tgl_spk_berakhir'],	1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['jangka_waktu'],		1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['asal'], 				1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['tujuan'],			1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['jumlah_rit'],		1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['realisasi_rit'],		1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['harga_rit'],			1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['nilai_spk'],			1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['biaya'],				1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['laba_rugi'],			1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['pm'],				1, 1, 'C');


	$no++;
}

$pdf->Output("laporan_SPK.pdf","I");

?>

