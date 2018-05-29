<?php 

include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Barang</h3>
<a class="btn" href="spk.php?spk=$id"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id=mysql_real_escape_string($_GET['id']);


$det=mysql_query("select * from spk where id='$id'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td>No SPK</td>
			<td><?=$d['no_spk'] ?></td>
		</tr>
		<tr>
			<td>No Proposal</td>
			<td><?=$d['no_proposal'] ?></td>
		</tr>
		<tr>
			<td>No Surat Jalan</td>
			<td><?=$d['surlan'] ?></td>
		</tr>
		<tr>
			<td>Tanggal SPK Terbit</td>
			<td><?=$d['tgl_spk_terbit'] ?></td>
		</tr>
		<tr>
			<td>Tanggal SPK Berakhir</td>
			<td><?=$d['tgl_spk_berakhir'] ?></td>
		</tr>
		<tr>
			<td>Jangka Waktu</td>
			<td><?=$d['jangka_waktu'] ?></td>
		</tr>
		<tr>
			<td>Asal</td>
			<td><?=$d['asal'] ?></td>
		</tr>
		<tr>
			<td>Tujuan</td>
			<td><?=$d['tujuan'] ?></td>
		</tr>
		<tr>
			<td>Jumlah Rit</td>
			<td><?=$d['jumlah_rit'] ?></td>
		</tr>
		<tr>
			<td>Harga/rit</td>
			<td>Rp.<?=number_format($d['harga_rit']) ?>,-</td>
		</tr>
			</tr>
			<tr>
			<td>Nilai SPK</td>
			<td><?=$d['nilai_spk'] ?></td>
		</tr>
		</tr>
			<tr>
			<td>Biaya</td>
			<td><?=$d['biaya'] ?></td>
		</tr>
		<tr>
			<td>Laba Rugi</td>
			<td><?=$d['laba_rugi'] ?></td>
		</tr>
		<tr>
			<td>PM</td>
			<td><?=$d['pm'] ?></td>
		</tr>
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>