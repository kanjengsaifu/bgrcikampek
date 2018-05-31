<?php 
include 'config.php';
$id=$_POST['id'];
$no_proposal=$_POST['no_proposal'];
$pemb_order=$_POST['pemb_order'];
$perusahaan=$_POST['perusahaan'];
$nm_pimpinan=$_POST['nm_pimpinan'];
$alamat_perusahaan=$_POST['alamat_perusahaan'];
$npwp=$_POST['npwp'];
$no_kontrak=$_POST['no_kontrak'];
$lingkup_kerja=$_POST['lingkup_kerja'];
$jenis_kargo=$_POST['jenis_kargo'];
$party=$_POST['party'];
$nm_kapal=$_POST['nm_kapal'];
$jangka_waktu_kerja=$_POST['jangka_waktu_kerja'];
$nilai_kontrak=$_POST['nilai_kontrak'];
$uang_muka=$_POST['uang_muka'];
$tahap_1=$_POST['tahap_1'];
$tahap_2=$_POST['tahap_2'];
$tahap_3=$_POST['tahap_3'];
$toleransi_susut=$_POST['toleransi_susut'];


mysql_query("update tb_proposal set no_proposal='$no_proposal', pemb_order='$pemb_order', perusahaan='$perusahaan',nm_pimpinan='$nm_pimpinan',alamat_perusahaan='$alamat_perusahaan',npwp ='$npwp', no_kontrak='$no_kontrak',lingkup_kerja='$lingkup_kerja',jenis_kaargo='$jenis_kargo',party='$party',nm_kapal='$nm_kapal',jangka_waktu_kerja='$jangka_waktu_kerja',nilaii_kontrak='$nilai_kontrak',uang_muka='$uang_muka',tahap_1='$tahap_1',tahap_2='$tahap_2',tahap_3='$tahap_3',toleransi_susut='$toleransi_susut where id='$id'");
header("location:barang.php");

?>