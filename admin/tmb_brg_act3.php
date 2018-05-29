<?php 
include 'config.php';
$tgl_realisasi=$_POST['tgl_realisasi'];
$perusahaan=$_POST['perusahaan'];
$no_spk=$_POST['no_spk'];
$vendor=$_POST['vendor'];
$asal_muat=$_POST['asal_muat'];
$tujuan_bongkar=$_POST['tujuan_bongkar'];
$no_polisi=$_POST['no_polisi'];
$biaya_vendor=$_POST['biaya_vendor'];
$ops_muat=$_POST['ops_muat'];
$no_srt_jalan=$_POST['no_srt_jalan'];
$pendapatan=$_POST['pendapatan'];
$no_dn=$_POST['no_dn'];

mysql_query("insert into realisasi_angkutan values('','$tgl_realisasi','$perusahaan','$no_spk','$vendor','$asal_muat','$tujuan_bongkar','$no_polisi','$biaya_vendor','$ops_muat','$no_srt_jalan','$pendapatan','$no_dn')");
header("location:barang3.php");

 ?>