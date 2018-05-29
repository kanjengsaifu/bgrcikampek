<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Barang</h3>
<a class="btn" href="barang3.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id=mysql_real_escape_string($_GET['id']);


$det=mysql_query("select * from realisasi_angkutan where id='$id'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td>Tanggal Realisasi</td>
			<td><?=$d['tgl_realisasi'] ?></td>
		</tr>
		<tr>
			<td>Perusahaan</td>
			<td><?=$d['perusahaan'] ?></td>
		</tr>
		<tr>
			<td>No SPK</td>
			<td><?=$d['no_spk'] ?></td>
		</tr>
		<tr>
			<td>Vendor</td>
			<td><?=$d['vendor'] ?></td>
		</tr>
			<tr>
			<td>Asal Muat</td>
			<td><?=$d['asal_muat'] ?></td>
		</tr>
		</tr>
			<tr>
			<td>Tujuan Bongkar</td>
			<td><?=$d['tujuan_bongkar'] ?></td>
		</tr>
		</tr>
			<tr>
			<td>No Polisi</td>
			<td><?=$d['no_polisi'] ?></td>
		</tr>
		<tr>
			<td>Biaya Vendor</td>
			<td>Rp.<?=number_format($d['biaya_vendor']) ?>,-</td>
		</tr>
		<tr>
			<td>Opr Muat</td>
			<td>Rp.<?=number_format($d['ops_muat']) ?>,-</td>
		</tr>
		</tr>
			<tr>
			<td>No Surat Jalan</td>
			<td><?=$d['no_srt_jalan'] ?></td>
		</tr>
		</tr>
			<tr>
			<td>Pendapatan</td>
			<td><?=$d['pendapatan'] ?></td>
		</tr>
		</tr>
			<tr>
			<td>No DN</td>
			<td><?=$d['no_dn'] ?></td>
		</tr>
		
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>