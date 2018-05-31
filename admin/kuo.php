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
                    <h4 class="page-title">Data KUO</h4> </div>
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
						<button data-toggle="modal" data-target="#responsive-modal" class="btn btn-default waves-effect"><span class="glyphicon glyphicon-plus"></span>Tambah Dropping Keuangan</button>
                        <!-- Button trigger modal -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- /row -->
            <div class="row">

                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Data KUO</h3>
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
										<th>ID</th>
										<th>Tanggal Dropping</th>
										<th>No Bukti</th>
										<th>Jumlah</th>
										<th>Jumlah Realisai</th>
										<th>Sisa</th>
										<th>No Bukti Pengembalian</th>
										<th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
									error_reporting(0);
									$brg=mysql_query("select * from droping_kuo");
									$no=1;
									while($b=mysql_fetch_array($brg)){
										$no_bukti=$b['no_bukti'];
										$jumlah=$b['jumlah'];
										$query = "SELECT * FROM realisasi_kuo where no_bukti_kuo='$no_bukti'";
										$query_run = mysql_query($query);

										$jumlah_real= 0;
										while ($num = mysql_fetch_assoc ($query_run)) {
											$jumlah_real += $num['jumlah'];
											$sisa=$jumlah-$jumlah_real;
											mysql_query("update droping_kuo set realisasi_kuo='$jumlah_real', sisa='$sisa' where no_bukti='$no_bukti'");
										}
										?>
										<tr>
											<td><?=$no++ ?></td>
											<td><?=$b['tgl_droping'] ?></td>
											<td><?=$no_bukti?></td>
											<td>Rp.<?=number_format($jumlah) ?>,-</td>
											<td>Rp.<?=number_format($jumlah_real) ?>,- <a href="realisasi_kuo.php?no_bukti=<?=$no_bukti?>" class="btn btn-info">Detail KUO</a></td>
											<td>Rp.<?=number_format($sisa) ?>,-</td>
											<td><?=$b['no_bkt_pengembalian'] ?></td>
											<td>
												<a href="edit_kuo.php?no_bukti=<?=$no_bukti?>" class="btn btn-warning">Edit</a>
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
				<h4 class="modal-title">Tambah KUO Baru</h4> </div>
			<form action="tmb_kuo_act.php" method="post">
				<div class="modal-body">
					<div class="form-group m-b-40">
						<label for="tgl_droping" class="control-label">Tanggal Dropping:</label>
						<input name="tgl_droping" type="text" class="form-control mydatepicker" id="tgl_droping">
					</div>
					<div class="form-group">
						<label for="no_bukti" class="control-label">No Bukti:</label>
						<input name="no_bukti" type="text" class="form-control" id="no_bukti">
					</div>
					<div class="form-group">
						<label for="jumlah" class="control-label">Jumlah:</label>
						<input name="jumlah" type="text" class="form-control" id="jumlah">
					</div>
					<div class="form-group">
						<label for="no_bkt_pengembalian" class="control-label">No Bukti Pengembalian:</label>
						<input name="no_bkt_pengembalian" type="text" class="form-control" id="no_bkt_pengembalian">
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
    <script src="assets/js/dataTables.buttons.min.js"></script>
    <script src="assets/js/buttons.flash.min.js"></script>
    <script src="assets/js/jszip.min.js"></script>
    <script src="assets/js/pdfmake.min.js"></script>
    <script src="assets/js/vfs_fonts.js"></script>
    <script src="assets/js/buttons.html5.min.js"></script>
    <script src="assets/js/buttons.print.min.js"></script>
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
