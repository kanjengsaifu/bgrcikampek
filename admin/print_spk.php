<?php
include 'timezone.php';
include 'config.php';
require('../assets/pdf/fpdf.php');

$no=1;
$host="localhost";
$user="root";
$pass="usbw";
$db="db_logistik";
$koneksi=@mysql_connect($host,$user,$pass);

$idhutang=$_GET['idprint'];
$sql="select * from spk where id='$idhutang'";
$qry=@mysql_query($sql,$koneksi)
or die("gagal menampilkan".mysql_error());
$surat=mysql_fetch_array($qry);


//deklarasi FPDF
class PDF extends FPDF {
	//inisialisasi Header DOkumen PDF
	function Header() {
		//load image logo
		$this->Image('../logo/logo.png',1,1,'C');
	
		
		//setting format font
		$this->SetFont('Arial','B',14);
		//header text
		//$this->Ln(1);
		
		//ganti baris
		$this->Ln();
		//setting format font
		
	}
 
}

//deklarasi format kertas 
$pdf=new PDF('L','cm','A4');
$pdf->Open();
$pdf->AliasNbPages();
$pdf->AddPage();
//setting margin kertas
$pdf->SetMargins(1.5,2); 
$pdf->SetFont('Arial','',12);
 

//membuat kop tabel
$x=$pdf->GetY(); 
$pdf->SetY($x+1);


$pdf->SetFont('Arial','B',16);           
$pdf->SetX(4);
$pdf->MultiCell(30,0.5,'SUB BGR CIKAMPEK',0,'L');
$pdf->SetFont('Arial','B',12); 
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 0038XXXXXXX',0,'L');    
$pdf->SetFont('Arial','B',12);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'JL. CIKAMPEK',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'website : --------------------------------',0,'L');
$pdf->Line(1, 4.5, 28.5, 4.5, 1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1, 4.6, 28.5, 4.6, 1);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(25.5,0.7,"Laporan Data SPK",0,10,'C');
$pdf->ln(1);
$pdf->SetX(22);
$pdf->SetFont('Arial','B',12);
$pdf->Line(1, 6.5, 28.5, 6.5, 1); 
$pdf->Line(1, 7.5, 28.5, 7.5, 1);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);



// menuliskan datanya


 
$pdf->SetFont('Arial','',14);
$pdf->Ln(0.3);
//$pdf->Image($temp,15,3);
$pdf->Cell(6,0.5,'No SPK',0,0,'L');
$pdf->Cell(6,0.5,': '.$surat['no_spk'],0,1, 'L');
$pdf->Cell(6,0.5,'No Proposal',0,0,'L');
$pdf->Cell(6,0.5,': '.$surat['no_proposal'],0,1, 'L');
$pdf->Cell(6,0.5,'Surat Jalan',0,0,'L');
$pdf->Cell(6,0.5,': '.$surat['surlan'],0,1, 'L');
$pdf->Cell(6,0.5,'Tanggal SPK Terbit',0,0,'L');
$pdf->Cell(6,0.5,': '.$surat['tgl_spk_terbit'],0,1, 'L');
$pdf->Cell(6,0.5,'Tanggal SPK Berakhir',0,0,'L');
$pdf->Cell(6,0.5,': '.$surat['tgl_spk_berakhir'],0,1, 'L');
$pdf->Cell(6,0.5,'Jangka Waktu',0,0,'L');
$pdf->Cell(6,0.5,': '.$surat['jangka_waktu'],0,1, 'L');
$pdf->Cell(6,0.5,'Asal',0,0,'L');
$pdf->Cell(6,0.5,': '.$surat['asal'],0,1, 'L');
$pdf->Cell(6,0.5,'Tujuan',0,0,'L');
$pdf->Cell(6,0.5,': '.$surat['tujuan'],0,1, 'L');
$pdf->Cell(6,0.5,'Jumlah Rit',0,0,'L');
$pdf->Cell(6,0.5,': '.$surat['jumlah_rit'],0,1, 'L');
$pdf->Cell(6,0.5,'Realisasi Rit',0,0,'L');
$pdf->Cell(6,0.5,': '.$surat['realisasi_rit'],0,1, 'L');
$pdf->Cell(6,0.5,'Harga Rit',0,0,'L');
$pdf->Cell(6,0.5,': Rp. '.$surat['harga_rit'],0,1, 'L');
$pdf->Cell(6,0.5,'Nilai SPK',0,0,'L');
$pdf->Cell(6,0.5,': Rp. '.$surat['nilai_spk'],0,1, 'L');
$pdf->Cell(6,0.5,'Biaya',0,0,'L');
$pdf->Cell(6,0.5,': Rp. '.$surat['biaya'],0,1, 'L');
$pdf->Cell(6,0.5,'Laba Rugi',0,0,'L');
$pdf->Cell(6,0.5,': Rp. '.$surat['laba_rugi'],0,1, 'L');
$pdf->Cell(6,0.5,'PM',0,0,'L');
$pdf->Cell(6,0.5,': '.$surat['pm'].'%',0,1, 'L');




$pdf->Ln(0.5);
$pdf->Cell(6,0.5,'',0,0,'J'); 

$no++;

//Menjadikan dalam bentuk PDF
$pdf->Output("laporan_SPK.pdf","I");
?>