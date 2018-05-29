<?php 
include 'config.php';
$tgl_droping=$_POST['tgl_droping'];
$no_bukti=$_POST['no_bukti'];
$jumlah=$_POST['jumlah'];
$realisasi_kuo=$_POST['realisasi_kuo'];
$sisa=$jumlah-$realisasi_kuo;
$no_bkt_pengembalian=$_POST['no_bkt_pengembalian'];

if($_POST['submit']=='Simpan'){
	mysql_query("insert into droping_kuo values('','$tgl_droping','$no_bukti','$jumlah','$realisasi_kuo','$sisa','$no_bkt_pengembalian')");
	header("location:kuo.php");
}

if($_POST['submit']=='Update'){
	mysql_query("update droping_kuo set tgl_droping='$tgl_droping', jumlah='$jumlah', realisasi_kuo='$realisasi_kuo', sisa='$sisa',no_bkt_pengembalian='$no_bkt_pengembalian' where no_bukti='$no_bukti'");
	header("location:kuo.php");
}
 ?>