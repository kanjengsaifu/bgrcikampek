<?php 
include 'config.php';
$nm_vendor=$_POST['nm_vendor'];
$alamat=$_POST['alamat'];
$npwp=$_POST['npwp'];
$nm_pimpinan=$_POST['nm_pimpinan'];



mysql_query("insert into tb_vendor values('','$nm_vendor','$alamat','$npwp','$nm_pimpinan')");
header("location:barang.php");

 ?>