<?php 
include 'config.php';
$id=$_POST['id'];
$no_spk=$_POST['no_spk'];
$tgl_realisasi=$_POST['tgl_realisasi'];
$armada=$_POST['armada'];
$asal=$_POST['asal'];
$tujuan=$_POST['tujuan'];
$party=$_POST['party'];
$satuan=$_POST['satuan'];
$nopol=$_POST['nopol'];
$no_surjl=$_POST['no_surjl'];
$biaya_armada=$_POST['biaya_armada'];
$operasional_mb=$_POST['operasional_mb'];
$total_biaya=$biaya_armada+$operasional_mb;
$pendapatan=$_POST['pendapatan'];
$laba=$pendapatan-$total_biaya;
$pm=$laba/$pendapatan*100;
$cu=$_POST['cus'];

if($_POST['submit']=='Simpan'){
	mysql_query("insert into realisasi values('','$tgl_realisasi','$armada','$no_spk','$asal','$tujuan','$party','$satuan','$nopol','$no_surjl','$biaya_armada','$operasional_mb','$total_biaya','$pendapatan','$laba','$pm')");

	$jumlah_real=mysql_query("SELECT COUNT(*) from realisasi where no_spk='$no_spk'");
	$jum_real=mysql_result($jumlah_real, 0);
	mysql_query("update spk set realisasi_rit='$jum_real' where no_spk='$no_spk'");

	header("location:realisasi_spk.php?id=$no_spk&cus=$cu");
}

if($_POST['submit']=='Update'){
	mysql_query("update realisasi set no_spk='$no_spk', tgl_realisasi='$tgl_realisasi', armada='$armada',asal='$asal',tujuan='$tujuan',party='$party',satuan='$satuan',nopol='$nopol',no_surjl='$no_surjl',biaya_armada='$biaya_armada',operasional_mb='$operasional_mb',total_biaya='$total_biaya',pendapatan='$pendapatan',laba='$laba',pm='$pm' where id='$id'");

	header("location:realisasi_spk.php?id=$no_spk&cus=$cu");
}
?>