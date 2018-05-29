<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data SPK </h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah SPK</button>
<br/>
<br/>


<?php 
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from tb_spk");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<div class="col-md-12">
	<table class="col-md-2">
		<tr>
			<td>Jumlah Record</td>		
			<td><?=$jum; ?></td>
		</tr>
		<tr>
			<td>Jumlah Halaman</td>	
			<td><?=$halaman; ?></td>
		</tr>
	</table>
	<a style="margin-bottom:10px" href="lap_barang2.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak All</a>
</div>
<form action="cari_act2.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari SPK di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-0">No</th>
		<th class="col-md-1">No SPK</th>
		<th class="col-md-1">No Proposal</th>
		<th class="col-md-1">Tanggal SPK Terbit</th>
		<th class="col-md-1">Tanggal SPK Berakhir</th>
		<th class="col-md-1">Jangka Waktu</th>
		<th class="col-md-1">Asal</th>
		<th class="col-md-1">Tujuan</th>
		<th class="col-md-1">Jumlah/rit</th>
		<th class="col-md-1">Realisai rit</th>
		<th class="col-md-1">Harga/rit</th>
		<th class="col-md-1">Nilai rit</th>
		<th class="col-md-1">Laba Rugi</th>
		<th class="col-md-1">PM</th>
		<!-- <th class="col-md-1">Sisa</th>		 -->
		<th class="col-md-3">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("select * from spk where perusahaan like '$cari' or tgl_spk like '$cari'");
	}else{
		$brg=mysql_query("select * from spk limit $start, $per_hal");
	}
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?=$no++ ?></td>
			<td><?=$b['no_spk'] ?></td>
			<td><?=$b['no_proposal'] ?></td>
			<td><?=$b['tgl_spk_terbit'] ?></td>
			<td><?=$b['tgl_spk_berakhir'] ?></td>
			<td><?=$b['jangka_waktu'] ?></td>
			<td><?=$b['asal'] ?></td>
			<td><?=$b['tujuan'] ?></td>
			<td><?=$b['jml_rit'] ?></td>
			<td><?=$b['realisasi_rit'] ?></td>
			<td>Rp.<?=number_format($b['hrg_rit']) ?>,-</td>
			<td>Rp.<?=number_format($b['nilai_spk']) ?>,-</td>
			<td>Rp.<?=number_format($b['laba_rugi']) ?>,-</td>
			<td><?=$b['pm'] ?></td>
			<td>
				<a href="det_barang2.php?id=<?=$b['id']; ?>" class="btn btn-info">Detail</a>
				<a href="edit2.php?id=<?=$b['id']; ?>" class="btn btn-warning">Edit</a>
				<a href="print_spk.php?idprint=<?=$b['id']?>" target="_blank" class="btn btn-default"><span class='glyphicon glyphicon-print'></span>Cetak</a></p>
				<a onclick="if(confirm('Yakin Mau di Hapus?? Besok Juga diisi Lagi')){ location.href='hapus2.php?id=<?=$b['id']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>		
		<?php 
	}
	?>
	
</table>
<ul class="pagination">			
			<?php 
			for($x=1;$x<=$halaman;$x++){
				?>
				<li><a href="?page=<?=$x ?>"><?=$x ?></a></li>
				<?php
			}
			?>						
		</ul>
<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah SPK Baru</h4>
			</div>
			<div class="modal-body">
				<form action="tmb_brg_act2.php" method="post">
					<div class="form-group">
						<label>No SPK</label>
						<input name="no_spk" type="text" class="form-control" placeholder="Nama Perusahaan ..">
					</div>
					<div class="form-group">
					<label>No Proposal</label>
					<select name="no_proposal" class="form-control">
						<option>--- Pilih No Proposal ---</option></p>
						
						<?php
						mysql_connect("localhost", "root", "usbw");
						mysql_select_db("db_logistik");
						$sql = mysql_query("SELECT * FROM tb_proposal ORDER BY no_proposal ASC");
						if(mysql_num_rows($sql) != 0){
							while($row = mysql_fetch_assoc($sql)){
								echo '<option>'.$row['no_proposal'].'</option>';
							}
						}
						?>
						</select>
					</div>
						<div class="form-group">
							<label>Tanggal SPK Terbit</label>
							<input name="tgl_spk_terbit" type="text" class="form-control" id="tgl_spk" autocomplete="off">
						</div>
						<div class="form-group">
							<label>Tanggal SPK Berakhir</label>
							<input name="tgl_spk_berakhir" type="text" class="form-control" id="tgl_spk" autocomplete="off">
						</div>
					<div class="form-group">
						<label>Jangka Waktu</label>
						<input name="jangka_waktu" type="text" class="form-control" placeholder="Asal Barang...">
					</div>	
					<div class="form-group">
						<label>Asal</label>
						<input name="asal" type="text" class="form-control" placeholder="Tujuan Barang..">
					</div>
					<div class="form-group">
						<label>Tujuan</label>
						<input name="tujuan" type="text" class="form-control" placeholder="Tujuan Barang..">
					</div>
					<div class="form-group">
						<label>Jumlah/rit</label>
						<input name="jml_rit" type="text" class="form-control" placeholder="Jumlah..">
					</div>
					<div class="form-group">
						<label>Ralisasi rit</label>
						<input name="realisasi_rit" type="text" class="form-control" placeholder="Jumlah..">
					</div>
					<div class="form-group">
						<label>Harga/rit </label>
						<input name="hrg_rit" type="text" class="form-control" placeholder="Harga..">
					</div>																	
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div>


<script type="text/javascript">
		$(document).ready(function(){
			$("#tgl_spk").datepicker({dateFormat : 'dd/mm/yy'});							
		});
	</script>
<?php 
include 'footer.php';

?>