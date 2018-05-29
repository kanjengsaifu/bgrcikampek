<?php 
include 'config.php';
$id_dn=$_GET['id'];
$dn=$_GET['dn'];
mysql_query("delete from data_nota where id='$id_dn'");
header("location:dn.php?dn=$dn");

?>