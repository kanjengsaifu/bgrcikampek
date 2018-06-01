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
                    <h4 class="page-title">Data Customer</h4> </div>
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
						<button data-toggle="modal" data-target="#responsive-modal" class="btn btn-default waves-effect"><span class="glyphicon glyphicon-plus"></span>Tambah Customer</button>
                        <!-- Button trigger modal -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- /row -->
            <div class="row">

                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Data Customer</h3>
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
										<th>ID</th>
										<th>Nama Customer</th>
										<th>Alamat</th>
										<th>NPWP</th>
										<th>Nama Pimpinan</th>
										<th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
								  <?php
								  if(isset($_GET['cari'])){
									$cari=mysql_real_escape_string($_GET['cari']);
									$brg=mysql_query("select * from customer where nm_cus like '$cari' or nm_pimpinan like '$cari'");
								  }else{
									$brg=mysql_query("select * from customer");
								  }
								  $no=1;
								  while($b=mysql_fetch_array($brg)){
								  ?>
								  <tr>
									<td><?=$no++?>.</td>
									<td><?=$b['nm_cus']?></td>
									<td><?=$b['alamat']?></td>
									<td><?=$b['npwp']?></td>
									<td><?=$b['nm_pimpinan']?></td>
									<td>
                    <?php
                      if($type=="admin"){
                        ?>
                        <a href="det_cus.php?id_cus=<?=$b['id']; ?>" class="btn btn-info">Detail</a>
    									  <a href="edit_cus.php?id_cus=<?=$b['id']; ?>" class="btn btn-warning">Edit</a>
    									  <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_cus.php?id_cus=<?=$b['id']; ?>' }" class="btn btn-danger">Hapus</a>
                        <?php
                      } else if($type=="editor"){
                        ?>
                        <a href="det_cus.php?id_cus=<?=$b['id']; ?>" class="btn btn-info">Detail</a>
    									  <a href="edit_cus.php?id_cus=<?=$b['id']; ?>" class="btn btn-warning">Edit</a>
                        <?php
                      } else{
                        ?>
                        <a href="det_cus.php?id_cus=<?=$b['id']; ?>" class="btn btn-info">Detail</a>
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
				<h4 class="modal-title">Tambah Customer Baru</h4> </div>
			<form action="tmb_cus_act.php" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="nm_cus" class="control-label">Nama Customer:</label>
						<input name="nm_cus" type="text" class="form-control" id="nm_cus">
					</div>
					<div class="form-group">
						<label for="alamat" class="control-label">Alamat:</label>
						<input name="alamat" type="text" class="form-control" id="alamat">
					</div>
					<div class="form-group">
						<label for="npwp" class="control-label">No NPWP:</label>
						<input name="npwp" type="text" class="form-control" id="npwp">
					</div>
					<div class="form-group">
						<label for="nm_pimpinan" class="control-label">Nama Pimpinan:</label>
						<input name="nm_pimpinan" type="text" class="form-control" id="nm_pimpinan">
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

    <!-- Date Picker Plugin JavaScript -->
    <script src="../plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
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
        jQuery('.mydatepicker, #datepicker').datepicker();
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
