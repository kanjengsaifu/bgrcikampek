<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Barang</h3>
<a class="btn" href="barang.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id=mysql_real_escape_string($_GET['id']);


$det=mysql_query("select * from tb_vendor where id='$id'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td>Nama Vendor</td>
			<td><?=$d['nm_vendor'] ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><?=$d['alamat'] ?></td>
		</tr>
		<tr>
			<td>NPWP</td>
			<td><?=$d['npwp'] ?></td>
		</tr>
		<tr>
			<td>Nama Pimpinan</td>
			<td><?=$d['nm_pimpinan'] ?></td>
		</tr>
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>