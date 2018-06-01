<?php
	$nopol=$_GET['nopol'];
    include 'php/top.php';
    include 'php/header.php';
    include 'php/left-sidebar.php'; include 'php/breadcrumbs.php';
?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Data Realisasi SPK</h4> </div>
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
						<button data-toggle="modal" data-target="#responsive-modal" class="btn btn-default waves-effect"><span class="glyphicon glyphicon-plus"></span>Tambah Realisasi SPK</button>
                        <!-- Button trigger modal -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- /row -->
            <div class="row">

                <div class="col-sm-12">
                    <div class="white-box">
					     <h3 class="box-title m-b-0"><a href="laporan_truk.php?nopol=<?=$nopol?>" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" title="Kembali">Kembali</a></h3>
                        <h3 class="box-title m-b-0">Data Realisasi SPK</h3>
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
										<th>ID</th>
										<th>Tanggal Realisasi</th>
										<th>Armada</th>
										<th>No SPK</th>
										<th>Asal</th>
										<th>Tujuan</th>
										<th>Party</th>
										<th>Satuan</th>
										<th>No Polisi</th>
										<th>No Surat Jalan</th>
										<th>Biaya Armada</th>
										<th>Operasional M/B</th>
										<th>Total Biaya</th>
										<th>Pendapatan</th>
										<th>Laba Rugi</th>
										<th>PM</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
								$nopol=$_GET['nopol'];
								$brg=mysql_query("select * from realisasi where nopol='$nopol'");
								$no=1;
								while($b=mysql_fetch_array($brg)){

									?>
									<tr>
										<td><?=$no++ ?></td>
										<td><?=$b['tgl_realisasi'] ?></td>
										<td><?=$b['armada'] ?></td>
										<td><?=$b['no_spk'] ?></td>
										<td><?=$b['asal'] ?></td>
										<td><?=$b['tujuan'] ?></td>
										<td><?=$b['party'] ?></td>
										<td><?=$b['satuan'] ?></td>
										<td><?=$b['nopol'] ?></td>
										<td><?=$b['no_surjl'] ?></td>
										<td>Rp.<?=number_format($b['biaya_armada']) ?>,-</td>
										<td>Rp.<?=number_format($b['operasional_mb']) ?>,-</td>
										<td>Rp.<?=number_format($b['total_biaya']) ?>,-</td>
										<td>Rp.<?=number_format($b['pendapatan']) ?>,-</td>
										<td>Rp.<?=number_format($b['laba']) ?>,-</td>
										<td><?=round($b['pm'],2) ?>%</td>
									</tr>
									<?php
									}
									$query = "SELECT * FROM realisasi where nopol='$nopol'";
									$query_run = mysql_query($query);

									$biaya_armada= 0;
									$operasional_mb= 0;
									$total_biaya= 0;
									$pendapatan= 0;
									$laba= 0;
									$pm= 0;
									while ($num = mysql_fetch_assoc ($query_run)) {
										$biaya_armada += $num['biaya_armada'];
										$operasional_mb += $num['operasional_mb'];
										$total_biaya=$biaya_armada+$operasional_mb;
										$pendapatan += $num['pendapatan'];
										$laba=$pendapatan-$total_biaya;
										$pm=$laba/$pendapatan*100;

											mysql_query("update truk set biaya='$total_biaya', pendapatan='$pendapatan', laba_rugi='$laba', pm='$pm' where nopol='$nopol'");
									}
									?>
								<tfoot>
									<tr>
										<td colspan="10"><b>Jumlah</b></td>
										<td><b>Rp.<?=number_format($biaya_armada)?>,-</b></td>
										<td><b>Rp.<?=number_format($operasional_mb)?>,-</b></td>
										<td><b>Rp.<?=number_format($total_biaya)?>,-</b></td>
										<td><b>Rp.<?=number_format($pendapatan)?>,-</b></td>
										<td><b>Rp.<?=number_format($laba)?>,-</b></td>
										<td colspan="2"><b><?=round($pm,2) ?>%</b></td>
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
				<h4 class="modal-title">Tambah Realisasi SPK</h4> </div>
			<form action="tmb_real_act.php" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label>No SPK</label>
						<input name="no_spk" type="hidden" class="form-control" value="<?=$id?>">
						<input name="cus" type="hidden" class="form-control" value="<?=$cu?>">
						<p><h2><b><?=$id?></b></h2></p>
					</div>

					<div class="form-group m-b-40">
						<label for="tgl_realisasi" class="control-label">Tanggal Realisasi:</label>
						<input name="tgl_realisasi" type="text" class="form-control mydatepicker" id="tgl_realisasi">
					</div>
					<div class="form-group">
						<label for="armada" class="control-label">Armada:</label>
						<input name="armada" type="text" class="form-control" id="armada">
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
						<label for="party" class="control-label">Party:</label>
						<input name="party" type="text" class="form-control" id="tujupartyan">
					</div>
					<div class="form-group m-b-40">
						<label for="satuan" class="control-label">Satuan:</label>
						<select name="satuan" class="form-control p-0" id="satuan" required>
							<option></option>
							<option>TON</option>
							<option>BALLS</option>
							<option>M3</option>
							<option>RITASE</option>
						</select>
					</div>
					<div class="form-group">
						<label for="nopol" class="control-label">No Polisi:</label>
						<input name="nopol" type="text" class="form-control" id="nopol">
					</div>
					<div class="form-group">
						<label for="no_surjl" class="control-label">No Surat Jalan:</label>
						<input name="no_surjl" type="text" class="form-control" id="no_surjl">
					</div>
					<div class="form-group">
						<label for="biaya_armada" class="control-label">Biaya Armada:</label>
						<input name="biaya_armada" type="text" class="form-control" id="biaya_armada">
					</div>
					<div class="form-group">
						<label for="operasional_mb" class="control-label">Operasional MB:</label>
						<input name="operasional_mb" type="text" class="form-control" id="operasional_mb">
					</div>
					<div class="form-group">
						<label for="pendapatan" class="control-label">Pendapatan:</label>
						<input name="pendapatan" type="text" class="form-control" id="pendapatan">
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
