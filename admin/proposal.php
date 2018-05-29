<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Proposal</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Proposal</button>
<br/>
<br/>


<?php 
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from tb_proposal");
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
	<a style="margin-bottom:10px" href="lap_barang.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak All</a>
</div>
<form action="cari_act.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari Vendor di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-1">No Proposal</th>
		<th class="col-md-2">Pemberi Order</th>
		<th class="col-md-1">Peerusahaan</th>
		<th class="col-md-1">Nama Pimpinan</th>
		<th class="col-md-2">Alamat Perusahaan</th>
		<th class="col-md-1">NPWP</th>
		<th class="col-md-1">No Kontrak</th>
		<th class="col-md-1">Lingkup Pekerjaan</th>
		<th class="col-md-1">Jenis Kargo</th>
		<th class="col-md-1">Party</th>
		<th class="col-md-1">Nama Kapal</th>
		<th class="col-md-1">Jangka Waktu Kerja</th>
		<th class="col-md-1">Nilai Kontrak</th>
		<th class="col-md-1">Uang Muka</th>
		<th class="col-md-1">Tahap 1</th>
		<th class="col-md-1">Tahap 2</th>
		<th class="col-md-1">Tahap 3</th>
		<th class="col-md-1">Toleransi Susut</th>
		<!-- <th class="col-md-1">Sisa</th>		 -->
		<th class="col-md-3">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("select * from tb_proposal where nm_vendor like '$cari' or tgl_spk like '$cari'");
	}else{
		$brg=mysql_query("select * from tb_proposal limit $start, $per_hal");
	}
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?=$no++ ?></td>
			<td><?=$b['no_proposal'] ?></td>
			<td><?=$b['pemb_order'] ?></td>
			<td><?=$b['perusahaan'] ?></td>
			<td><?=$b['nm_pimpinan'] ?></td>
			<td><?=$b['alamat_perusahaan'] ?></td>
			<td><?=$b['npwp'] ?></td>
			<td><?=$b['no_kontrak'] ?></td>
			<td><?=$b['lingkup_kerja'] ?></td>
			<td><?=$b['jenis_kargo'] ?></td>
			<td><?=$b['party'] ?></td>
			<td><?=$b['nm_kapal'] ?></td>
			<td><?=$b['jangka_waktu_kerja'] ?></td>
			<td><?=$b['nilai_kontrak'] ?></td>
			<td><?=$b['uang_muka'] ?></td>
			<td><?=$b['tahap_1'] ?></td>
			<td><?=$b['tahap_2'] ?></td>
			<td><?=$b['tahap_3'] ?></td>
			<td><?=$b['toleransi_susut'] ?></td>
			<td>
				<a href="det_proposal.php?id=<?=$b['id']; ?>" class="btn btn-info">Detail</a>
				<a href="edit_proposal.php?id=<?=$b['id']; ?>" class="btn btn-warning">Edit</a>
				
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus.php?id=<?=$b['id']; ?>' }" class="btn btn-danger">Hapus</a>
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
				<h4 class="modal-title">Tambah Proposal</h4>
			</div>
			<div class="modal-body">
				<form action="tmb_prop_act.php" method="post">
					<div class="form-group">
						<label>No Proposal</label>
						<input name="no_proposal" type="text" class="form-control" placeholder="Nama Vendor ..">
					</div>
					<div class="form-group">
						<label>Pemberi Order</label>
						<input name="pemb_order" type="text" class="form-control" placeholder="Alamat ..">
					</div>
						<div class="form-group">
							<label>Perusahaan</label>
							<input name="perusahaan" type="text" class="form-control"  >
						</div>
					<div class="form-group">
						<label>Nama Pimpinan</label>
						<input name="nm_pimpinan" type="text" class="form-control" placeholder="Nama Pimpinan...">
					</div>
					<div class="form-group">
						<label>Alamat Perusahaan</label>
						<input name="alamat_perusahaan" type="text" class="form-control" placeholder="Nama Pimpinan...">
					</div>
					<div class="form-group">
						<label>NPWP</label>
						<input name="npwp" type="text" class="form-control" placeholder="Nama Pimpinan...">
					</div>
					<div class="form-group">
						<label>No Kontrak</label>
						<input name="no_kontrak" type="text" class="form-control" placeholder="Nama Pimpinan...">
					</div>
					<div class="form-group">
						<label>Lingkup Kerjaan</label>
						<input name="lingkup_kerja" type="text" class="form-control" placeholder="Nama Pimpinan...">
					</div>
					<div class="form-group">
						<label>Jenis Kargo</label>
						<input name="jenis_kargo" type="text" class="form-control" placeholder="Nama Pimpinan...">
					</div>
					<div class="form-group">
						<label>Party</label>
						<input name="party" type="text" class="form-control" placeholder="Nama Pimpinan...">
					</div>
					<div class="form-group">
						<label>Nama Kapal</label>
						<input name="nm_kapal" type="text" class="form-control" placeholder="Nama Pimpinan...">
					</div>
					<div class="form-group">
						<label>Jangka Waktu Kerja</label>
						<input name="jangka_waktu_kerja" type="text" class="form-control" placeholder="Nama Pimpinan...">
					</div>
					<div class="form-group">
						<label>Nilai Kontrak</label>
						<input name="nilai_kontrak" type="text" class="form-control" placeholder="Nama Pimpinan...">
					</div>
					<div class="form-group">
						<label>Uang Muka</label>
						<input name="uang_muka" type="text" class="form-control" placeholder="Nama Pimpinan...">
					</div>
					<div class="form-group">
						<label>Tahap 1</label>
						<input name="tahap_1" type="text" class="form-control" placeholder="Nama Pimpinan...">
					</div>
					<div class="form-group">
						<label>Tahap 2</label>
						<input name="tahap_2" type="text" class="form-control" placeholder="Nama Pimpinan...">
					</div>
					<div class="form-group">
						<label>Tahap 3</label>
						<input name="tahap_3" type="text" class="form-control" placeholder="Nama Pimpinan...">
					</div>
					<div class="form-group">
						<label>Toleransi Susut</label>
						<input name="toleransi_susut" type="text" class="form-control" placeholder="Nama Pimpinan...">
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