<?php 
include 'config.php';
$id=$_POST['id'];
$nm_vendor=$_POST['nm_vendor'];
$alamat=$_POST['alamat'];
$npwp=$_POST['npwp'];
$nm_pimpinan=$_POST['nm_pimpinan'];


mysql_query("update tb_vendor set nm_vendor='$nm_vendor', alamat='$alamat', npwp='$npwp', nm_pimpinan='$nm_pimpinan' where id='$id'");
header("location:barang.php");

?>