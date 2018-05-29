<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Data Vendor</h3>
<a class="btn" href="barang.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id_brg=mysql_real_escape_string($_GET['id']);
$det=mysql_query("select * from tb_proposal where id='$id'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>					
	<form action="update.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?=$d['id'] ?>"></td>
			</tr>
			<tr>
				<td>No Proposal</td>
				<td><input type="text" class="form-control" name="no_proposal" value="<?=$d['no_proposal'] ?>"></td>
			</tr>
			<tr>
				<td>Pemberi Order</td>
				<td><input type="text" class="form-control" name="pemb_order" value="<?=$d['pemb_order'] ?>"></td>
			</tr>
			<tr>
				<td>Perusahaan</td>
				<td><input type="text" class="form-control" name="perusahaan" value="<?=$d['perusahaan'] ?>"></td>
			</tr>
			<tr>
				<td>Nama Pimpinan</td>
				<td><input type="text" class="form-control" name="nm_pimpinan" value="<?=$d['nm_pimpinan'] ?>"></td>
			</tr>
			<tr>
				<td>Alamat Perusahaan</td>
				<td><input type="text" class="form-control" name="alamat_perusahaan" value="<?=$d['alamat_perusahaan'] ?>"></td>
			</tr>
			<tr>
				<td>NPWP</td>
				<td><input type="text" class="form-control" name="npwp" value="<?=$d['npwp'] ?>"></td>
			</tr>
			<tr>
				<td>No Kontrak</td>
				<td><input type="text" class="form-control" name="no_kontrak" value="<?=$d['no_kontrak'] ?>"></td>
			</tr>
			<tr>
				<td>Lingkup Kerjaan</td>
				<td><input type="text" class="form-control" name="lingkup_kerja" value="<?=$d['lingkup_kerja'] ?>"></td>
			</tr>
			<tr>
				<td>Jenis Kargo</td>
				<td><input type="text" class="form-control" name="jenis_kargo" value="<?=$d['jenis_kargo'] ?>"></td>
			</tr>
			<tr>
				<td>Party</td>
				<td><input type="text" class="form-control" name="party" value="<?=$d['party'] ?>"></td>
			</tr>
			<tr>
				<td>Nama Kapal</td>
				<td><input type="text" class="form-control" name="nm_kapal" value="<?=$d['nm_kapal'] ?>"></td>
			</tr>
			<tr>
				<td>Jangka Waktu Kerja</td>
				<td><input type="text" class="form-control" name="jangka_waktu_kerja" value="<?=$d['jangka_waktu_kerja'] ?>"></td>
			</tr>
			<tr>
				<td>Nilai Kontrak</td>
				<td><input type="text" class="form-control" name="nilai_kontrak" value="<?=$d['nilai_kontrak'] ?>"></td>
			</tr>
			<tr>
				<td>Uang Muka</td>
				<td><input type="text" class="form-control" name="uang_muka" value="<?=$d['uang_muka'] ?>"></td>
			</tr>
			<tr>
				<td>Tahap 1</td>
				<td><input type="text" class="form-control" name="tahap_1" value="<?=$d['tahap_1'] ?>"></td>
			</tr>
			<tr>
				<td>Tahap 2</td>
				<td><input type="text" class="form-control" name="tahap_2" value="<?=$d['tahap_2'] ?>"></td>
			</tr>
			<tr>
				<td>Tahap 3</td>
				<td><input type="text" class="form-control" name="tahap_3" value="<?=$d['tahap_3'] ?>"></td>
			</tr>
			<tr>
				<td>Toleransi Susut</td>
				<td><input type="text" class="form-control" name="toleransi_susut" value="<?=$d['toleransi_susut'] ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php 
}
?>
<?php include 'footer.php'; ?>