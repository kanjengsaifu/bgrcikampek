<?php
    include 'php/top.php';
    include 'php/header.php';
    include 'php/left-sidebar.php'; include 'php/breadcrumbs.php';
?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Data SPK</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <?php echo breadcrumbs(); ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- .row -->
            <div class="row">
                <div class="col-md-4">
                    <div class="white-box">
                        <!-- sample modal content -->
						<button data-toggle="modal" data-target="#responsive-modal" class="btn btn-default waves-effect"><span class="glyphicon glyphicon-plus"></span>Tambah SPK</button>
                        <!-- Button trigger modal -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- /row -->
            <div class="row">

                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Data SPK</h3>
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                  										<th>ID</th>
                  										<th>No SPK</th>
                  										<th>No Proposal</th>
                  										<th>Tanggal SPK Terbit</th>
                  										<th>Tanggal SPK Berakhir</th>
                  										<th>Jangka Waktu</th>
                  										<th>Asal</th>
                  										<th>Tujuan</th>
                  										<th>Jumlah/rit</th>
                  										<th>Realisai rit</th>
                  										<th>Harga/rit</th>
                  										<th>Nilai SPK</th>
                  										<th>Biaya</th>
                  										<th>Laba Rugi</th>
                  										<th>PM</th>
                  										<th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
									$cus=$_GET['spk'];
									if(isset($_GET['cari'])){
										$cari=mysql_real_escape_string($_GET['cari']);
										$brg=mysql_query("select * from spk where id_customer='$cus' and perusahaan like '$cari' or tgl_spk like '$cari'");
									}else{
										$brg=mysql_query("select * from spk where id_customer='$cus'");
									}
									$no=1;
									while($b=mysql_fetch_array($brg)){
										$j_sp=$b['no_spk'];
										$jumlah_real=mysql_query("SELECT COUNT(*) from realisasi where no_spk='$j_sp'");
										$jum_real=mysql_result($jumlah_real, 0);
										mysql_query("update spk set realisasi_rit='$jum_real' where no_spk='$j_sp'");

										?>
										<tr>
											<td><?=$no++?>.</td>
											<td><?=$b['no_spk'] ?></td>
											<td><?=$b['no_proposal'] ?></td>
											<td><?=$b['tgl_spk_terbit'] ?></td>
											<td><?=$b['tgl_spk_berakhir'] ?></td>
											<td><?=$b['jangka_waktu'] ?></td>
											<td><?=$b['asal'] ?></td>
											<td><?=$b['tujuan'] ?></td>
											<td><?=$b['jumlah_rit'] ?></td>
											<td><?=$b['realisasi_rit'] ?></td>
											<td>Rp.<?=number_format($b['harga_rit']) ?>,-</td>
											<td>Rp.<?=number_format($b['nilai_spk']) ?>,-</td>
											<td>Rp.<?=number_format($b['biaya']) ?>,-</td>
											<td>Rp.<?=number_format($b['laba_rugi']) ?>,-</td>
											<td><?=round($b['pm'],2) ?>%</td>
											<td>
                      <?php
                        if($type=="admin"){
                          ?>
                          <a href="realisasi_spk.php?id=<?=$b['no_spk']; ?>&cus=<?=$cus?>" class="btn btn-info">Realisasi</a>
  												<a href="edit_spk.php?id=<?=$b['id']?>&cus=<?=$cus?>" class="btn btn-warning">Edit</a>
                          <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus.php?page=spk&id=<?=$b['id']?>&cus=<?=$cus?>' }" class="btn btn-danger">Hapus</a>
                          <?php
                			  } else if($type=="editor"){
                          ?>
                          <a href="realisasi_spk.php?id=<?=$b['no_spk']; ?>&cus=<?=$cus?>" class="btn btn-info">Realisasi</a>
  												<a href="edit_spk.php?id=<?=$b['id']?>&cus=<?=$cus?>" class="btn btn-warning">Edit</a>
                          <?php
                			  } else{
                          ?>
                          <a href="realisasi_spk.php?id=<?=$b['no_spk']; ?>&cus=<?=$cus?>" class="btn btn-info">Realisasi</a>
                          <?php
                			  }
                      ?>
											</td>
										</tr>
										<?php
									}
									?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
<!-- .modal -->
<div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Tambah SPK Baru</h4> </div>
			<form action="tmb_spk_act.php" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="no_spk" class="control-label">No SPK:</label>
						<input name="no_spk" type="text" class="form-control" id="no_spk">
					</div>
					<div class="form-group">
						<label for="no_proposal" class="control-label">No Proposal:</label>
						<input name="no_proposal" type="text" class="form-control" id="no_proposal">
					</div>
					<div class="form-group m-b-40">
						<label for="tgl_spk_terbit" class="control-label">Tanggal SPK Terbit:</label>
						<input name="tgl_spk_terbit" type="text" class="form-control mydatepicker" id="tgl_spk_terbit">
					</div>
					<div class="form-group m-b-40">
						<label for="tgl_spk_berakhir" class="control-label">Tanggal SPK Berakhir:</label>
						<input name="tgl_spk_berakhir" type="text" class="form-control mydatepicker" id="tgl_spk_berakhir">
					</div>
					<div class="form-group">
						<label for="asal" class="control-label">Asal:</label>
						<input name="asal" type="text" class="form-control" id="asal">
					</div>
					<div class="form-group">
						<label for="tujuan" class="control-label">Tujuan:</label>
						<input name="tujuan" type="text" class="form-control" id="tujuan">
					</div>
					<div class="form-group">
						<label for="jumlah_rit" class="control-label">Jumlah rit:</label>
						<input name="jumlah_rit" type="text" class="form-control" id="jumlah_rit">
					</div>
					<div class="form-group">
						<label for="harga_rit" class="control-label">Harga perRit:</label>
						<input name="harga_rit" type="text" class="form-control" id="harga_rit">
					</div>
					<div class="form-group">
						<label for="biaya" class="control-label">Biaya Proposal:</label>
						<input name="biaya" type="text" class="form-control" id="biaya">
					</div>
				</div>
				<input name="cus" type="hidden" value="<?=$cus?>">
				<div class="modal-footer">
					<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
					<button name="submit" type="submit" class="btn btn-danger waves-effect waves-light" value="Simpan">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /.modal -->
            <?php include 'php/right-sidebar.php';?>
        </div>
        <!-- /.container-fluid -->
        <?php include 'php/footer.php';?>

    <!-- Date range Plugin JavaScript -->
    <script src="../plugins/bower_components/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="../plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="../plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="js/dataTables.buttons.min.js"></script>
    <script src="js/buttons.flash.min.js"></script>
    <script src="js/jszip.min.js"></script>
    <script src="js/pdfmake.min.js"></script>
    <script src="js/vfs_fonts.js"></script>
    <script src="js/buttons.html5.min.js"></script>
    <script src="js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
            $(document).ready(function () {
                var table = $('#example').DataTable({
                    "columnDefs": [
                        {
                            "visible": false
                            , "targets": 2
						}
					]
                    , "order": [[2, 'asc']]
                    , "displayLength": 25
                    , "drawCallback": function (settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function (group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function () {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    }
                    else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
        $('#example23').DataTable({
            dom: 'Bfrtip'
            , buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
        });
    </script>
    <script>
        // Date Picker
        jQuery('#datepicker-autoclose').datepicker();
        jQuery('#date-range').datepicker({
            toggleActive: true
        });
        jQuery('#datepicker-inline').datepicker({
            todayHighlight: true
        });
        // Daterange picker
        $('.input-daterange-datepicker').daterangepicker({
            buttonClasses: ['btn', 'btn-sm']
            , applyClass: 'btn-danger'
            , cancelClass: 'btn-inverse'
        });
        $('.input-daterange-timepicker').daterangepicker({
            timePicker: true
            , format: 'MM/DD/YYYY h:mm A'
            , timePickerIncrement: 30
            , timePicker12Hour: true
            , timePickerSeconds: false
            , buttonClasses: ['btn', 'btn-sm']
            , applyClass: 'btn-danger'
            , cancelClass: 'btn-inverse'
        });
        $('.input-limit-datepicker').daterangepicker({
            format: 'MM/DD/YYYY'
            , minDate: '06/01/2015'
            , maxDate: '06/30/2015'
            , buttonClasses: ['btn', 'btn-sm']
            , applyClass: 'btn-danger'
            , cancelClass: 'btn-inverse'
            , dateLimit: {
                days: 6
            }
        });
    </script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    <!--Style Switcher -->
<script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
