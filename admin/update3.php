<?php 
include 'config.php';
$id=$_POST['id'];
$tgl_realisasi=$_POST['tgl_realisasi'];
$perusahaan=$_POST['perusahaan'];
$vendor=$_POST['vendor'];
$asal_muat=$_POST['asal_muat'];
$tujuan_bongkar=$_POST['tujuan_bongkar'];
$no_polisi=$_POST['no_polisi'];
$biaya_vendor=$_POST['biaya_vendor'];
$ops_muat=$_POST['ops_muat'];
$no_srt_jalan=$_POST['no_srt_jalan'];
$pendapatan=$_POST['pendapatan'];
$no_dn=$_POST['no_dn'];

mysql_query("update realisasi_angkutan set tgl_realisasi='$tgl_realisasi', perusahaan='$perusahaan', 
vendor='$vendor', 
asal_muat='$asal_muat', 
tujuan_bongkar='$tujuan_bongkar', 
no_polisi='$no_polisi', 
biaya_vendor='$biaya_vendor', 
ops_muat='$ops_muat', 
no_srt_jalan='$no_srt_jalan', 
pendapatan='$pendapatan',
no_dn='$no_dn' 


where id='$id'");
header("location:barang3.php");

?>