<?php 
include 'config.php';
$id_cus=$_GET['id_cus'];
mysql_query("delete from customer where id='$id_cus'");
header("location:customer.php");

?>