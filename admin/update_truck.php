<?php 
include 'config.php';
$id=$_POST['id'];
$nm_truk=$_POST['nm_truk'];
$nopol=$_POST['nopol'];
$nm_supir=$_POST['nm_supir'];



mysql_query("update truk set nm_truk='$nm_truk', nopol='$nopol', nm_supir='$nm_supir' where id='$id'");
header("location:truck.php");

?>