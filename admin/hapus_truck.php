<?php 
include 'config.php';
$id=$_GET['id'];
mysql_query("delete from truk where id='$id'");
header("location:truck.php");

?>