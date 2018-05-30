<?php 
include 'config.php';
$id=$_POST['id'];
$nm_truk=$_POST['nm_truk'];
$nopol=$_POST['nopol'];
$nm_supir=$_POST['nm_supir'];


if($_POST['submit']=='Simpan'){
	mysql_query("insert into truk values('','$nm_truk','$nopol','$nm_supir')");
	header("location:truck.php");
}

if($_POST['submit']=='Update'){
	mysql_query("update truk set nm_truk='$nm_truk', nopol='$nopol', nm_supir='$nm_supir' where id='$id'");
	header("location:truck.php");
}
 ?>