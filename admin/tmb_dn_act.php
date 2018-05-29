<?php 
include 'config.php';
$cus=$_POST['cus'];
$id=$_POST['id'];
$no_dn=$_POST['no_dn'];
$no_spk=$_POST['no_spk'];
$tgl_dn=$_POST['tgl_dn'];
$nilai=$_POST['nilai'];
$biaya=$_POST['biaya'];
$laba_rugi=$nilai-$biaya;
$pm=$laba_rugi/$nilai*100;

if($_POST['submit']=='Simpan'){
	mysql_query("insert into data_nota values('','$no_dn','$no_spk','$tgl_dn','$nilai','$biaya','$laba_rugi','$pm','$cus')");
	header("location:dn.php?dn=$cus");
}

if($_POST['submit']=='Update'){
	mysql_query("update data_nota set no_dn='$no_dn', no_spk='$no_spk', tgl_dn='$tgl_dn', nilai='$nilai',biaya='$biaya',laba_rugi='$laba_rugi',pm='$pm',id_customer='$cus' where id='$id'");
	header("location:dn.php?dn=$cus");
}
 ?>