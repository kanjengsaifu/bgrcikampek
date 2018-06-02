<?php
error_reporting(0);
mysql_connect('localhost','root','')or die(mysql_error());
mysql_select_db('db_logistik')or die(mysql_error());
$koneksi = new mysqli("localhost", "root", "", "db_logistik");
if($koneksi->connect_errno) {
	echo "Gagal melakukan koneksi ke MySQL: " . $koneksi->connect_error;
}
?>
