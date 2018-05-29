<?php 
include 'config.php';
$id=$_POST['id'];
$nm_cus=$_POST['nm_cus'];
$alamat=$_POST['alamat'];
$npwp=$_POST['npwp'];
$nm_pimpinan=$_POST['nm_pimpinan'];

if($_POST['submit']=='Simpan'){
	mysql_query("insert into customer values('','$nm_cus','$alamat','$npwp','$nm_pimpinan')");
	header("location:customer.php");
}

if($_POST['submit']=='Update'){
	mysql_query("update customer set nm_cus='$nm_cus', alamat='$alamat', npwp='$npwp', nm_pimpinan='$nm_pimpinan' where id='$id'");
	header("location:customer.php");
}
 ?>