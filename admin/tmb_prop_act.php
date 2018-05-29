<?php 
include 'config.php';
$no_proposal=$_POST['nm_vendor'];
$pemb_order=$_POST['alamat'];
$perusahaan=$_POST['npwp'];
$nm_pimpinan=$_POST['nm_pimpinan'];
$alamat_perusahaan=$_POST['nm_vendor'];
$npwp=$_POST['alamat'];
$no_kontrak=$_POST['npwp'];
$lingkup_kerja=$_POST['nm_pimpinan'];
$jenis_kargo=$_POST['nm_vendor'];
$party=$_POST['alamat'];
$nm_kapal=$_POST['npwp'];
$jangka_waktu_kerja=$_POST['nm_pimpinan'];
$nilai_kontrak=$_POST['nm_vendor'];
$uang_muka=$_POST['alamat'];
$tahap_1=$_POST['npwp'];
$tahap_2=$_POST['nm_pimpinan'];
$tahap_3=$_POST['npwp'];
$toleransi_susut=$_POST['nm_pimpinan'];


mysql_query("insert into tb_proposal values('','$no_proposal','$pemb_order','$perusahaan','$nm_pimpinan','$alamat_perusahaan','$npwp','$no_kontrak','$lingkup_kerja','$jenis_kargo','$party','$nm_kapal','$jangka_waktu_kerja','$nilai_kontrak','$uang_muka','$tahap_1','$tahap_2','$tahap_3','$toleransi_susut')");
header("location:barang.php");

 ?>