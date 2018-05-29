<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Realisasi Angkutan</h3>
<a class="btn" href="barang3.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id_brg=mysql_real_escape_string($_GET['id']);
$det=mysql_query("select * from realisasi_angkutan where id='$id_brg'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>					
	<form action="update3.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?=$d['id'] ?>"></td>
			</tr>
			<tr>
				<td>Tanggal Realisasi</td>
				<td><input type="text" class="form-control" name="tgl_realisasi" value="<?=$d['tgl_realisasi'] ?>"></td>
			</tr>
			<tr>
				<td>Perusahaan</td>
				<td><input type="text" class="form-control" name="perusahaan" value="<?=$d['perusahaan'] ?>"></td>
			</tr>
			<tr>
				<td>No SPK</td>
				<td><input type="text" class="form-control" name="no_spk" value="<?=$d['no_spk'] ?>"></td>
			</tr>
			<tr>
			<td>Vendor</td>
				<td><select name="vendor" class="form-control" name="vendor" value="<?=$d['vendor'] ?>">
						<?php
						mysql_connect("localhost", "root", "");
						mysql_select_db("db_logistik");
						$sql = mysql_query("SELECT * FROM tb_vendor ORDER BY nm_vendor ASC");
						if(mysql_num_rows($sql) != 0){
							while($row = mysql_fetch_assoc($sql)){
								echo '<option>'.$row['nm_vendor'].'</option>';
							}
						}
						?>
				</select></td>
					
			</tr>
			<tr>
				<td>Asal Muat</td>
				<td><input type="text" class="form-control" name="asal_muat" value="<?=$d['asal_muat'] ?>"></td>
			</tr>
			<tr>
				<td>Tujuan Bongkar</td>
				<td><input type="text" class="form-control" name="tujuan_bongkar" value="<?=$d['tujuan_bongkar'] ?>"></td>
			</tr>
			<tr>
				<td>No Polisi</td>
				<td><input type="text" class="form-control" name="no_polisi" value="<?=$d['no_polisi'] ?>"></td>
			</tr>
			<tr>
			<tr>
				<td>Biaya Vendor</td>
				<td><input type="text" class="form-control" name="biaya_vendor" value="<?=$d['biaya_vendor'] ?>"></td>
			</tr>
			<tr>
				<td>Operasional Muat</td>
				<td><input type="text" class="form-control" name="ops_muat" value="<?=$d['ops_muat'] ?>"></td>
			</tr>
			<tr>
				<td> No Surat Jalan</td>
				<td><input type="text" class="form-control" name="no_srt_jalan" value="<?=$d['no_srt_jalan'] ?>"></td>
			</tr>
			<tr>
				<td> Pendapatan</td>
				<td><input type="text" class="form-control" name="pendapatan" value="<?=$d['pendapatan'] ?>"></td>
			</tr>
			<tr>
				<td> No DN</td>
				<td><input type="text" class="form-control" name="no_dn" value="<?=$d['no_dn'] ?>"></td>
			</tr>
			<tr>
			<tr>
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