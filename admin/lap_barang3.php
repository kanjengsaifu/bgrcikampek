<?php
include 'timezone.php';
include 'config.php';
require('../assets/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(0.95,1,0.95);
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
$pdf->Cell(25.5,0.7,"Laporan Data Realisasi Angkutan",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(1, 0.8, 'No'				, 1, 0, 'C');
$pdf->Cell(2.2, 0.8, 'Tgl Realisasi', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Perusahaan'   	, 1, 0, 'C');
$pdf->Cell(2, 0.8, 'No SPK'       	, 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Vendor'         , 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Asal Muat'      , 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Tujuan Bongkar' , 1, 0, 'C');
$pdf->Cell(2, 0.8, 'No Polisi'      , 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Biaya Vendor'   , 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Ops Muat'       , 1, 0, 'C');
$pdf->Cell(3, 0.8, 'No Surat Jalan' , 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Pendapatan'     , 1, 0, 'C');
$pdf->Cell(2, 0.8, 'No DN'          , 1, 1, 'C');
$pdf->SetFont('Arial','',7);
$no=1;
$query=mysql_query("select * from realisasi_angkutan");
while($lihat=mysql_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(2.2, 0.8, $lihat['tgl_realisasi']	,1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['perusahaan']			,1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['no_spk']			,1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['vendor']				,1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['asal_muat']			,1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['tujuan_bongkar']		,1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['no_polisi']			,1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['biaya_vendor']		,1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['ops_muat']			,1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['no_srt_jalan']		,1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['pendapatan']			,1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['no_dn']				,1, 0, 'C');

	$no++;
}

$pdf->Output("laporan_Realisasi_Angkutan.pdf","I");

?>

