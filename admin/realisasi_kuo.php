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
                    <h4 class="page-title">Data Realisasi KUO</h4> </div>
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
						<button data-toggle="modal" data-target="#responsive-modal" class="btn btn-default waves-effect"><span class="glyphicon glyphicon-plus"></span>Tambah Realisasi KUO</button>
                        <!-- Button trigger modal -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- /row -->
            <div class="row">

                <div class="col-sm-12">
                    <div class="white-box">
					     <h3 class="box-title m-b-0"><a href="kuo.php" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" title="Kembali">Kembali</a></h3>
                        <h3 class="box-title m-b-0">Data Realisasi KUO</h3>
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
										<th>ID</th>
										<th>Tanggal Realisasi KUO</th>
										<th>No Bukti</th>
										<th>Jumlah</th>
										<th>Uraian</th>
										<th>No Surat Jalan</th>
										<th>No SPK</th>
										<th>Asal</th>
										<th>Tujuan</th>
										<th>No Polisi</th>
										<th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php 
								error_reporting(0);
								$no_bukti=$_GET['no_bukti'];
								$brg=mysql_query("select * from realisasi_kuo where no_bukti_kuo='$no_bukti'");
								$no=1;
								while($b=mysql_fetch_array($brg)){

									?>
									<tr>
										<td><?=$no++ ?></td>
										<td><?=$b['tgl_realisasi_kuo'] ?></td>
										<td><?=$b['no_bukti_kuo'] ?></td>
										<td>Rp.<?=number_format($b['jumlah']) ?>,-</td>
										<td><?=$b['uraian'] ?></td>
										<td><?=$b['surat_jalan'] ?></td>
										<td><?=$b['no_spk'] ?></td>
										<td><?=$b['asal'] ?></td>
										<td><?=$b['tujuan'] ?></td>
										<td><?=$b['nopol'] ?></td>
										<td>
											<a href="edit_real_kuo.php?id=<?=$b['id']?>&no_bukti=<?=$no_bukti?>" class="btn btn-warning">Edit</a>
										</td>
									</tr>		
									<?php 
									}
									?>
								</tbody>
								<?php 
								$query = "SELECT * FROM realisasi_kuo where no_bukti_kuo='$no_bukti'";
								$query_run = mysql_query($query);

								$jumlah= 0;
								while ($num = mysql_fetch_assoc ($query_run)) {
									$jumlah += $num['jumlah'];
								}
								?>
								<tfoot>
									<tr>
										<td colspan="3"><b>Jumlah</b></td>
										<td colspan="8"><b>Rp.<?=number_format($jumlah)?>,-</b></td>
									</tr>
								</tfoot>
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
				<h4 class="modal-title">Tambah Realisasi DN</h4> </div>
			<form action="tmb_real_kuo_act.php" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label>No Bukti</label>
						<input name="no_bukti" type="hidden" class="form-control" value="<?=$no_bukti?>">
						<p><h2><b><?=$no_bukti?></b></h2></p>
					</div>

					<div class="form-group m-b-40">
						<label for="tgl_realisasi_kuo" class="control-label">Tanggal Realisasi KUO:</label>
						<input name="tgl_realisasi_kuo" type="text" class="form-control mydatepicker" id="tgl_realisasi_kuo">
					</div>
					<div class="form-group">
						<label for="jumlah" class="control-label">Jumlah:</label>
						<input name="jumlah" type="text" class="form-control" id="jumlah"> 
					</div>
					<div class="form-group">
						<label for="uraian" class="control-label">Uraian:</label>
						<input name="uraian" type="text" class="form-control" id="uraian"> 
					</div>
					<div class="form-group m-b-40">
						<label for="surat_jalan" class="control-label">No Surat Jalan:</label>
						<select name="surat_jalan" class="form-control p-0" id="surat_jalan" required>
							<?php
							$sql = mysql_query("SELECT * FROM realisasi");
							if(mysql_num_rows($sql) != 0){
								while($row = mysql_fetch_assoc($sql)){
									echo '<option value='.$row['no_surjl'].'>'.$row['no_surjl'].'</option>';
								}
							}
							?>
						</select>
					</div>
				</div>
					
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
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true
            , todayHighlight: true
        });
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