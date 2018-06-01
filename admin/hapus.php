<?php
include 'config.php';
$page=$_GET['page'];
$id=$_GET['id'];

//Hapus DN
if($page=='dn'){
  $cu=$_GET['cus'];
  mysql_query("delete from data_nota where id='$id'");
  header("location:".$page.".php?dn=".$cu);
}


//Hapus det DN
if($page=='detail_dn'){
  $cu=$_GET['cus'];
	$id_dn=$_GET['id_dn'];
  mysql_query("delete from realisasi_dn where id='$id'");
  header("location:".$page.".php?id=".$id_dn."&cus=".$cu);
}

//Hapus spk
if($page=='spk'){
  $cu=$_GET['cus'];
  mysql_query("delete from spk where id='$id'");
  header("location:".$page.".php?spk=".$cu);
}

//Hapus det spk
if($page=='realisasi_spk'){
  $cu=$_GET['cus'];
	$id_spk=$_GET['no_spk'];
  mysql_query("delete from realisasi where id='$id'");
  header("location:".$page.".php?id=".$id_spk."&cus=".$cu);
}

//Hapus Kuo
if($page=='kuo'){
  mysql_query("delete from droping_kuo where id='$id'");
  header("location:".$page.".php");
}

//Hapus Real Kuo
if($page=='realisasi_kuo'){
  $no_bukti=$_GET['no_bukti'];
  mysql_query("delete from realisasi_kuo where id='$id'");
  header("location:".$page.".php?no_bukti=".$no_bukti);
}

//Hapus Vendor
if($page=='barang'){
  mysql_query("delete from tb_vendor where id='$id'");
  header("location:".$page.".php");
}

//Hapus Truck
if($page=='truck'){
  mysql_query("delete from truk where id='$id'");
  header("location:".$page.".php");
}

?>
