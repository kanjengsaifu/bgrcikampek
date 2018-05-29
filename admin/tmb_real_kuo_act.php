<?php 
include 'config.php';

$id=$_POST['id'];
$tgl_realisasi_kuo=$_POST['tgl_realisasi_kuo'];
$no_bukti=$_POST['no_bukti'];
$jumlah=$_POST['jumlah'];
$uraian=$_POST['uraian'];
$surat_jalan=$_POST['surat_jalan'];
$sql = mysql_query("SELECT * FROM realisasi where no_surjl='$surat_jalan'");
if(mysql_num_rows($sql) != 0){
	while($row = mysql_fetch_assoc($sql)){
	$no_spk=$row['no_spk'];
	$asal=$row['asal'];
	$tujuan=$row['tujuan'];
	$nopol=$row['nopol'];
	}
}

if($_POST['submit']=='Simpan'){
	mysql_query("insert into realisasi_kuo values('','$tgl_realisasi_kuo','$no_bukti','$jumlah','$uraian','$surat_jalan','$no_spk','$asal','$tujuan','$nopol')");
	header("location:realisasi_kuo.php?no_bukti=$no_bukti");
}

if($_POST['submit']=='Update'){
	mysql_query("update realisasi_kuo set tgl_realisasi_kuo='$tgl_realisasi_kuo', jumlah='$jumlah', uraian='$uraian', surat_jalan='$surat_jalan',no_spk='$no_spk',asal='$asal',tujuan='$tujuan',nopol='$nopol' where id='$id'");
	header("location:realisasi_kuo.php?no_bukti=$no_bukti");
}
?>