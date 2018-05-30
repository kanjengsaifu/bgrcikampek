<?php
include '../config.php';

$id=$_POST['id'];
$no_spk=$_POST['no_spk'];
$no_proposal=$_POST['no_proposal'];
$no_surlan=$_POST['no_surlan'];
$asal=$_POST['asal'];
$tujuan=$_POST['tujuan'];
$jumlah_rit=$_POST['jumlah_rit'];
$realisasi_rit=$_POST['realisasi_rit'];
$harga_rit=$_POST['harga_rit'];
$nilai_spk=$jumlah_rit*$harga_rit;
$biaya=$_POST['biaya'];
$laba_rugi=$biaya-$nilai_spk;
$pm=$laba_rugi/$nilai_spk*100;
$id_spk=$_POST['cus'];

$tgl_spk_terbit=$_POST['tgl_spk_terbit'];
$tgl_spk_terbit1  = str_replace('/','-',$tgl_spk_terbit);
$tgl_spk_terbit1  = strtotime($tgl_spk_terbit1);
$tgl_spk_berakhir=$_POST['tgl_spk_berakhir'];
$tgl_spk_berakhir1    = str_replace('/','-',$tgl_spk_berakhir);
$tgl_spk_berakhir1    = strtotime($tgl_spk_berakhir1);

$diff   = $tgl_spk_berakhir1 - $tgl_spk_terbit1;

$jangka_waktu= floor($diff / (60 * 60 * 24));

if($_POST['submit']=='Simpan'){
	mysql_query("insert into spk values('','$no_spk','$no_proposal','$no_surlan','$tgl_spk_terbit','$tgl_spk_berakhir','$jangka_waktu','$asal','$tujuan','$jumlah_rit','$realisasi_rit','$harga_rit','$nilai_spk','$biaya','$laba_rugi','$pm','$id_spk')");
	header("location:spk.php?spk=$id_spk");
}

if($_POST['submit']=='Update'){
	mysql_query("update spk set no_spk='$no_spk', no_proposal='$no_proposal', surlan='$no_surlan', tgl_spk_terbit='$tgl_spk_terbit',tgl_spk_berakhir='$tgl_spk_berakhir',jangka_waktu='$jangka_waktu',asal='$asal',tujuan='$tujuan',jumlah_rit='$jumlah_rit',realisasi_rit='$realisasi_rit',harga_rit='$harga_rit',nilai_spk='$nilai_spk',biaya='$biaya',laba_rugi='$laba_rugi',pm='$pm',id_customer='$id_spk' where id='$id'");
	header("location:spk.php?spk=$id_spk");
}
 ?>
