<?php 
include 'config.php';
$id=$_GET['id'];
mysql_query("delete from realisasi_angkutan where id='$id'");
header("location:barang3.php");

?>