<?php 
include 'config.php';
$no_bukt=$_GET['no_bukt'];
mysql_query("delete from droping_kuo where no_bukt='$no_bukt'");
header("location:kuo.php");

?>