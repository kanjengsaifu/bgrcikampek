<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Realisasi Angkutan</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Realisasi</button>
<br/>
<br/>


<?php 
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from realisasi_angkutan");
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
	<a style="margin-bottom:10px" href="lap_barang3.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
</div>
<form action="cari_act3.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-0">No</th>
		<th class="col-md-1">Tanggal Realisasi</th>
		<th class="col-md-2">Perusahaan</th>
		<th class="col-md-1">No SPK</th>
		<th class="col-md-2">Vendor</th>
		<th class="col-md-1">Asal Muat</th>
		<th class="col-md-1">Tujuan Bongkar</th>
		<th class="col-md-2">No Polisi</th>
		<th class="col-md-1">Biaya VendorK</th>
		<th class="col-md-1">Ops Muat</th>
		<th class="col-md-1">No Surat Jalan</th>
		<th class="col-md-1">Pendapatan</th>
		<th class="col-md-1">No DN</th>
		<!-- <th class="col-md-1">Sisa</th>		 -->
		<th class="col-md-3">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("select * from realisasi_angkutan where perusahaan like '$cari' or tgl_realisasi like '$cari'");
	}else{
		$brg=mysql_query("select * from realisasi_angkutan limit $start, $per_hal");
	}
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?=$no++ ?></td>
			<td><?=$b['tgl_realisasi'] ?></td>
			<td><?=$b['perusahaan'] ?></td>
			<td><?=$b['no_spk'] ?></td>
			<td><?=$b['vendor'] ?></td>
			<td><?=$b['asal_muat'] ?></td>
			<td><?=$b['tujuan_bongkar'] ?></td>
			<td><?=$b['no_polisi'] ?></td>
			<td><?=$b['biaya_vendor'] ?></td>
			<td><?=$b['ops_muat'] ?></td>
			<td><?=$b['no_srt_jalan'] ?></td>
			<td><?=$b['pendapatan'] ?></td>
			<td><?=$b['no_dn'] ?></td>
		
			<td>
				<a href="det_barang3.php?id=<?=$b['id']; ?>" class="btn btn-info">Detail</a>
				<a href="edit3.php?id=<?=$b['id']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus3.php?id=<?=$b['id']; ?>' }" class="btn btn-danger">Hapus</a>
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
				<h4 class="modal-title">Tambah Realisasi Angkutan Baru</h4>
			</div>
			<div class="modal-body">
				<form action="tmb_brg_act3.php" method="post">
					<div class="form-group">
							<label>Tanggal Realisasi</label>
							<input name="tgl_realisasi" type="text" class="form-control" id="tgl_realisasi" autocomplete="off">
						</div>
					<div class="form-group">
						<label>Perusahaan</label>
						<input name="perusahaan" type="text" class="form-control" placeholder="Nama Perusahaan ..">
					</div>
					<div class="form-group">
						<label>No SPK</label>
						<input name="no_spk" type="text" class="form-control" placeholder="No SPK ..">
					</div>
					
					<div class="form-group">
					<label>Vendor</label>
					<select name="vendor" class="form-control">
						<option>--- Pilih Vendor ---</option></p>
						
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
						</select>
					</div>
					<div class="form-group">
						<label>Asal Muat</label>
						<input name="asal_muat" type="text" class="form-control" placeholder="Asal Muat...">
					</div>	
					<div class="form-group">
						<label>Tujuan Bongkar</label>
						<input name="tujuan_bongkar" type="text" class="form-control" placeholder="Tujuan Bongkar..">
					</div>
					<div class="form-group">
						<label>No Polisi</label>
						<input name="no_polisi" type="text" class="form-control" placeholder="No Polisi..">
					</div>
					<div class="form-group">
						<label>Biaya Vendor</label>
						<input name="biaya_vendor" type="text" class="form-control" placeholder="Biaya..">
					</div>																	
					<div class="form-group">
						<label>OPS Muat</label>
						<input name="ops_muat" type="text" class="form-control" placeholder="Operasional Muat..">
					</div>
					<div class="form-group">
						<label>No Suat Jalan</label>
						<input name="no_srt_jalan" type="text" class="form-control" placeholder="Nomor surat jalan..">
					</div>
					<div class="form-group">
						<label>Pendapatan</label>
						<input name="pendapatan" type="text" class="form-control" placeholder="Pendapatan..">
					</div>
					<div class="form-group">
						<label>No DN</label>
						<input name="no_dn" type="text" class="form-control" placeholder="No DN.">
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
			$("#tgl_realisasi").datepicker({dateFormat : 'dd/mm/yy'});							
		});
	</script>
<?php 
include 'footer.php';

?>