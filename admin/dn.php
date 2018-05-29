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
                    <h4 class="page-title">Data DN</h4> </div>
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
						<button data-toggle="modal" data-target="#responsive-modal" class="btn btn-default waves-effect"><span class="glyphicon glyphicon-plus"></span>Tambah DN</button>
                        <!-- Button trigger modal -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- /row -->
            <div class="row">

                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Data DN</h3>
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
										<th>ID</th>
										<th>No DN</th>
										<th>No SPK</th>
										<th>Tanggal</th>
										<th>Nilai</th>
										<th>Biaya</th>
										<th>laba Rugi</th>		
										<th>PM</th>		
										<th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    error_reporting(0);
									$cus=$_GET['dn'];
									if(isset($_GET['cari'])){
										$cari=mysql_real_escape_string($_GET['cari']);
										$brg=mysql_query("select * from data_nota where id_customer='$cus' and tgl_dn like '$cari'");
									}else{
										$brg=mysql_query("select * from data_nota where id_customer='$cus'");
									}
									$no=1;
									while($b=mysql_fetch_array($brg)){
										$nodn = $b['no_dn'];
										$nilai = $b['nilai'];
										$query = "SELECT * FROM realisasi_dn where no_dn='$nodn'";
										$query_run = mysql_query($query);

										$biaya= 0;
										while ($num = mysql_fetch_assoc ($query_run)) {
											$biaya += $num['realisasi'];
											$laba_rugi=$nilai-$biaya;
											$pm=$laba_rugi/$nilai*100;
											mysql_query("update data_nota set biaya='$biaya',laba_rugi='$laba_rugi',pm='$pm' where no_dn='$nodn'");
										}				
										?>
										<tr>
											<td><?=$no++?>.</td>
											<td><?=$nodn?></td>
											<td><?=$b['no_spk'] ?></td>
											<td><?=$b['tgl_dn'] ?></td>
											<td>Rp.<?=number_format($b['nilai']) ?>,-</td>
											<td>Rp.<?=number_format($b['biaya']) ?>,- 
											<a href="detail_dn.php?cus=<?=$cus?>&no_dn=<?=$nodn?>" class="btn btn-info">Detail</a></td>
											<td>Rp.<?=number_format($b['laba_rugi']) ?>,-</td>
											<td><?=round($b['pm'],2) ?>%</td>
											<td>
												<a href="edit_dn.php?cus=<?=$cus?>&id=<?=$b['id']?>" class="btn btn-warning">Edit</a>
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
				<h4 class="modal-title">Tambah DN Baru</h4> </div>
			<form action="tmb_dn_act.php" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="no_dn" class="control-label">No DN:</label>
						<input name="no_dn" type="text" class="form-control" id="no_dn"> 
					</div>
					<div class="form-group">
						<label for="no_spk" class="control-label">No SPK:</label>
						<select name="no_spk" class="form-control p-0" id="party" required>
						<?php
						$sql = mysql_query("SELECT * FROM spk");
						if(mysql_num_rows($sql) != 0){
							while($row = mysql_fetch_assoc($sql)){
								echo '<option value='.$row['no_spk'].'>'.$row['no_spk'].'</option>';
							}
						}
						?>
						</select>
					</div>
					<div class="form-group m-b-40">
						<label for="tgl_dn" class="control-label">Tanggal DN:</label>
						<input name="tgl_dn" type="text" class="form-control mydatepicker" id="tgl_dn">
					</div>
					<div class="form-group">
						<label for="nilai" class="control-label">Nilai:</label>
						<input name="nilai" type="text" class="form-control" id="nilai"> 
					</div>
					<div class="form-group">
						<label for="biaya" class="control-label">Biaya:</label>
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