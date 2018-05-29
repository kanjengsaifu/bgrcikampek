<?php
	$no_bukti=$_GET['no_bukti'];
    include 'php/top.php';
    include 'php/header.php';
    include 'php/left-sidebar.php'; include 'php/breadcrumbs.php';
    ?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Edit Data Realisasi KUO</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <?php echo breadcrumbs(); ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- .row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box p-l-20 p-r-20">
                        <h3 class="box-title m-b-0"><a href="realisasi_kuo.php?no_bukti=<?=$no_bukti?>" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" title="Kembali">Kembali</a></h3>
                        <h2><strong>Edit Data Realisasi</strong> KUO</h2>
						<br>
                        <div class="row">
                            <div class="col-md-12">
							  <?php
							  $id=$_GET['id'];
							$det=mysql_query("select * from realisasi_kuo where id='$id'")or die(mysql_error());
							while($d=mysql_fetch_array($det)){
							  ?>  
                                <form action="tmb_spk_act.php" method="post" class="floating-labels ">
									<div class="form-group">
										<label>No Bukti</label>
										<input name="no_bukti" type="hidden" class="form-control" value="<?=$$no_bukti?>"><br>
										<p><h2><b><?=$no_bukti?></b></h2></p>
									</div>
									
									<div class="form-group m-b-40">
										<input name="tgl_realisasi_kuo" type="text" class="form-control mydatepicker" id="tgl_realisasi_kuo" value="<?=$d['tgl_realisasi_kuo'] ?>" required><span class="highlight"></span> <span class="bar"></span>
										<label for="tgl_realisasi_kuo">Tanggal Realisasi KUO</label>
									</div>
                                    <div class="form-group m-b-40">
                                        <input name="jumlah" type="text" class="form-control" id="jumlah" value="<?=$d['jumlah'] ?>" required><span class="highlight"></span> <span class="bar"></span>
                                        <label for="jumlah">Jumlah</label>
                                    </div>
                                    <div class="form-group m-b-40">
                                        <input name="uraian" type="text" class="form-control" id="uraian" value="<?=$d['uraian'] ?>" required><span class="highlight"></span> <span class="bar"></span>
                                        <label for="uraian">Uraian</label>
                                    </div>
                                    <div class="form-group m-b-40">
                                        <select name="surat_jalan" class="form-control p-0" id="surat_jalan" required>
											<option></option>
											<?php
											$sql = mysql_query("SELECT * FROM realisasi");
											if(mysql_num_rows($sql) != 0){
												while($row = mysql_fetch_assoc($sql)){
													echo '<option value='.$row['no_surjl'].'>'.$row['no_surjl'].'</option>';
												}
											}
											?>
                                        </select><span class="highlight"></span> <span class="bar"></span>
                                        <label for="surat_jalan">No Surat Jalan</label>
                                    </div>
                                    
									<input name="id" type="hidden" value="<?=$id?>">
									<div class="form-group form-actions">
										<div class="col-md-9 col-md-offset-3">
											<button name="submit" type="submit" class="btn btn-sm btn-primary" value="Update"><i class="fa fa-angle-right"></i> Update</button>
											<button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
										</div>
									</div>
                                </form>
							  <?php
							  }
							  ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <?php include 'php/right-sidebar.php';?>
        </div>
        <!-- /.container-fluid -->
        <?php include 'php/footer.php';?>

    <!-- Sweet-Alert  -->
    <script src="../plugins/bower_components/sweetalert/sweetalert.min.js"></script>
    <script src="../plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="../plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="../plugins/bower_components/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="../plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
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