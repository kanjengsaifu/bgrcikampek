<?php
	$cu=$_GET['cus'];
    include 'php/top.php';
    include 'php/header.php';
    include 'php/left-sidebar.php'; include 'php/breadcrumbs.php';
?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Data Realisasi DN</h4> </div>
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
						<button data-toggle="modal" data-target="#responsive-modal" class="btn btn-default waves-effect"><span class="glyphicon glyphicon-plus"></span>Tambah Realisasi DN</button>
                        <!-- Button trigger modal -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- /row -->
            <div class="row">

                <div class="col-sm-12">
                    <div class="white-box">
					     <h3 class="box-title m-b-0"><a href="dn.php?dn=<?=$cu?>" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" title="Kembali">Kembali</a></h3>
                        <h3 class="box-title m-b-0">Data Realisasi DN</h3>
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
										<th>ID</th>
										<th>Tanggal</th>
										<th>Uraian</th>
										<th>No Bukti</th>
										<th>Surat Jalan</th>
										<th>Realisasi</th>
										<th>Dropping</th>
										<th>Saldo</th>
										<th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
								error_reporting(0);
								$id_dn=$_GET['no_dn'];
								$brg=mysql_query("select * from realisasi_dn where no_dn='$id_dn'");
								$no=1;
								while($b=mysql_fetch_array($brg)){

									?>
									<tr>
										<td><?=$no++ ?></td>
										<td><?=$b['tanggal'] ?></td>
										<td><?=$b['uraian'] ?></td>
										<td><?=$b['no_bukti'] ?></td>
										<td><?=$b['surat_jalan'] ?></td>
										<td>Rp.<?=number_format($b['realisasi']) ?>,-</td>
										<td>Rp.<?=number_format($b['droping']) ?>,-</td>
										<td>Rp.<?=number_format($b['saldo']) ?>,-</td>
										<td><a href="edit_det_dn.php?cus=<?=$cu?>&id=<?=$b['id']?>&id_dn=<?=$id_dn?>" class="btn btn-warning">Edit</a>
										<a href="print_spk.php?idprint=<?=$b['id']?>" target="_blank" class="btn btn-default"><span class='glyphicon glyphicon-print'></span>Cetak</a></p></td>
									</tr>
									<?php
									}
									?>
								</tbody>
									<?php
									$query = "SELECT * FROM realisasi_dn where no_dn='$id_dn'";
									$query_run = mysql_query($query);


									$realisasi= 0;
									while ($num = mysql_fetch_assoc ($query_run)) {
										$realisasi += $num['realisasi'];
										$droping += $num['droping'];

									}
									?>
								<tfoot>
									<tr>
										<td colspan="5"><b>Jumlah</b></td>
										<td><b>Rp.<?=number_format($realisasi)?>,-</b></td>
										<td><b>Rp.<?=number_format($droping)?>,-</b></td>
										<td colspan="2"><b>Rp.<?php
										$sql2 = mysql_query("SELECT saldo FROM realisasi_dn where no_dn='$id_dn' ORDER BY id DESC LIMIT 1");
										if(mysql_num_rows($sql2) != 0){
											while($row2 = mysql_fetch_assoc($sql2)){
												echo number_format($row2['saldo']).",-";
											}
										}
										?></b></td>
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
			<form action="tmb_detail_dn_act.php" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label>No DN</label>
						<input name="no_dn" type="hidden" class="form-control" value="<?=$id_dn?>">
						<p><h2><b><?=$id_dn?></b></h2></p>
					</div>

					<div class="form-group m-b-40">
						<label for="tanggal" class="control-label">Tanggal:</label>
						<input name="tanggal" type="text" class="form-control mydatepicker" id="tanggal">
					</div>
					<div class="form-group">
						<label for="uraian" class="control-label">Uraian:</label>
						<input name="uraian" type="text" class="form-control" id="uraian">
					</div>
					<div class="form-group m-b-40">
						<label for="no_bukti" class="control-label">No Bukti:</label>
						<select name="no_bukti" class="form-control p-0" id="no_bukti" required>
							<?php
							$sql = mysql_query("SELECT * FROM realisasi_kuo");
							if(mysql_num_rows($sql) != 0){
								while($row = mysql_fetch_assoc($sql)){
									echo '<option value='.$row['no_bukti_kuo'].'>'.$row['no_bukti_kuo'].'</option>';
								}
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="realisasi" class="control-label">Realisasi:</label>
						<input name="realisasi" type="text" class="form-control" id="realisasi">
					</div>
					<div class="form-group">
						<label for="droping" class="control-label">Dropping:</label>
						<input name="droping" type="text" class="form-control" id="droping">
					</div>
				</div>
				<input name="cus" type="hidden" value="<?=$cu?>">
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
        $("#realisasi").change(function() {
            if($("#realisasi").val().trim() != ""){
            $("#droping").attr("disabled","disabled");
        }else{
            $("#droping").removeAttr("disabled");
        }
        });

        $("#droping").change(function() {
        if($("#droping").val().trim() != ""){
            $("#realisasi").attr("disabled","disabled");
        }else{
            $("#realisasi").removeAttr("disabled");
        }
        });
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
