<?php 

include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Barang</h3>
<a class="btn" href="barang2.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id=mysql_real_escape_string($_GET['id']);


$det=mysql_query("select * from tb_spk where id='$id'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td>No Proposal</td>
			<td><?=$d['no_proposal'] ?></td>
		</tr>
		<tr>
			<td>Pemberi Order]]</td>
			<td><?=$d['pemb_order'] ?></td>
		</tr>
		<tr>
			<td>Perusahaan</td>
			<td><?=$d['perusahaan'] ?></td>
		</tr>
		<tr>
			<td>Nama Pimpinan</td>
			<td><?=$d['nm_pimpinan'] ?></td>
		</tr>
			<tr>
			<td>Alamat Perusahaan</td>
			<td><?=$d['alamat_perusahaan'] ?></td>
		</tr>
		<tr>
			<td>NPWP</td>
			<td><?=$d['npwp'] ?>,-</td>
		</tr>
			</tr>
			<tr>
			<td>No Kontrak</td>
			<td><?=$d['no_kontrak'] ?></td>
		</tr>
			</tr>
			<tr>
			<td>Lingkup Kerjaan</td>
			<td><?=$d['lingkup_kerja'] ?></td>
		</tr>
		</tr>
			<tr>
			<td>Jenis Kargo</td>
			<td><?=$d['jenis_kargo'] ?></td>
		</tr>
		</tr>
			<tr>
			<td>Party</td>
			<td><?=$d['party'] ?></td>
		</tr>
		</tr>
			<tr>
			<td>Nama Kapal</td>
			<td><?=$d['nm_kapal'] ?></td>
		</tr>
		</tr>
			<tr>
			<td>Jangka Waktu Kerja</td>
			<td><?=$d['jangka_waktu_kerja'] ?></td>
		</tr>
		</tr>
			<tr>
			<td>Nilai Kontrak</td>
			<td><?=$d['nilai_kontrak'] ?></td>
		</tr>
		</tr>
			<tr>
			<td>Uang Muka</td>
			<td><?=$d['uang_muka'] ?></td>
		</tr>
		</tr>
			<tr>
			<td>Tahap 1</td>
			<td><?=$d['tahap_1'] ?></td>
		</tr>
			<tr>
			<td>Tahap 2</td>
			<td><?=$d['tahap_2'] ?></td>
		</tr>
			<tr>
			<td>Tahap 3</td>
			<td><?=$d['tahap_3'] ?></td>
		</tr>
			<tr>
			<td>Toleransi Susut</td>
			<td><?=$d['toleransi_susut'] ?></td>
		</tr>
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>