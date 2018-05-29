<?php 
include 'config.php';
$id=$_GET['id'];
mysql_query("delete from tb_vendor where id='$id'");
header("location:barang.php");

?>