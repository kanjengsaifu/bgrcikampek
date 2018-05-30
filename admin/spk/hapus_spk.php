<?php
include '../config.php';
$id=$_GET['id'];
mysql_query("delete from spk where id='$id'");
header("location:spk.php?spk=1");

?>
