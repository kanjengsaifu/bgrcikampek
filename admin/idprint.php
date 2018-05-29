<?php


$host="localhost";
$user="root";
$pass="";
$db="db_logistik";
$koneksi=@mysql_connect($host,$user,$pass);
if(!$koneksi) {
  echo "Aduh sori te bisa asup=".mysql_error();
 exit();
  
}

$milihdb=@mysql_select_db($db,$koneksi);
if(!$milihdb) {
 exit("Teu bisa milih database :".mysql_error());
}

$idhutang=$_GET['idprint'];
$sql="select * from tb_spk where id='$idhutang'";
$qry=@mysql_query($sql,$koneksi)
or die("gagal menampilkan".mysql_error());
$hsl_hutang=mysql_fetch_array($qry);
$data_idhutang 	 =$hsl_hutang['perusahaan'];
$data_namahutang =$hsl_hutang['no_spk'];
$data_nominal    =$hsl_hutang['tgl_spk'];
?>

<html>
<head>
<meta charset="utf-8">
<title>PRINT HUTANG</title>
</head>
<body>

<table width="600" border="1" align="center">
<tr>
<td colspan="4" align="center">Data Hutangku</td>
</tr>
<tr>
<td>Nama Hutang </td>
<td><?php echo"$data_namahutang";?> </td>
</tr>
<tr>
<td>Nominal</td>
<td><?php echo"$data_nominal";?></td>
</tr>
</table>

<!--- TAMBAHIN FUNGSI PRINT JUGA, KALAU CANCEL BISA KLIK PRINT LAGI -->

<center><a href="JavaSCript:window.print()">PRINT LAGI</a></center>
</body>
</html>

<?php
//otomatis muncul ketika laman di akses
echo "<script>window.print()</script>";
?>