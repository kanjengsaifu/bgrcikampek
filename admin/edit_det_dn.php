<?php
	$cu=$_GET['cus'];
	$id_dn=$_GET['id_dn'];
    include 'php/top.php';
    include 'php/header.php';
    include 'php/left-sidebar.php'; include 'php/breadcrumbs.php';
    ?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Edit Data Realisasi DN</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <?php echo breadcrumbs(); ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- .row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box p-l-20 p-r-20">
                        <h3 class="box-title m-b-0"><a href="detail_dn.php?id=<?=$no_spk?>&cus=<?=$cu?>" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" title="Kembali">Kembali</a></h3>
                        <h2><strong>Edit Data Realisasi</strong> DN</h2>
						<br>
                        <div class="row">
                            <div class="col-md-12">
							  <?php
							  $id=$_GET['id'];
							  $det=mysql_query("select * from realisasi_dn where id='$dn'")or die(mysql_error());
							  while($d=mysql_fetch_array($det)){
							  ?>          
                                <form action="tmb_detail_dn_act.php" method="post" class="floating-labels ">
									<div class="form-group">
										<label>No DN</label>
										<input name="no_dn" type="hidden" class="form-control" value="<?=$d['no_dn'] ?>"><br>
										<p><h2><b><?=$d['no_dn'] ?></b></h2></p>
									</div>
									
									<div class="form-group m-b-40">
										<input name="tanggal" type="text" class="form-control mydatepicker" id="tanggal" value="<?=$d['tanggal'] ?>"  required><span class="highlight"></span> <span class="bar"></span>
										<label for="tanggal">Tanggal</label>
									</div>
                                    <div class="form-group m-b-40">
                                        <input name="uraian" type="text" class="form-control" id="uraian" value="<?=$d['uraian'] ?>" required><span class="highlight"></span> <span class="bar"></span>
                                        <label for="uraian">Uraian</label>
                                    </div>
                                    <div class="form-group m-b-40">
                                        <input name="asal" type="text" class="form-control" id="asal" value="<?=$d['asal'] ?>" required><span class="highlight"></span> <span class="bar"></span>
                                        <label for="asal">Asal</label>
                                    </div>
                                    <div class="form-group m-b-40">
                                        <input name="tujuan" type="text" class="form-control" id="tujuan" value="<?=$d['tujuan'] ?>" required><span class="highlight"></span> <span class="bar"></span>
                                        <label for="tujuan">Tujuan</label>
                                    </div>
                                    <div class="form-group m-b-40">
                                        <select name="no_bukti" class="form-control p-0" id="no_bukti" required>
											<?php
											$sql = mysql_query("SELECT * FROM realisasi_kuo");
											if(mysql_num_rows($sql) != 0){
												while($row = mysql_fetch_assoc($sql)){
													echo '<option value='.$row['no_bukti_kuo'].'>'.$row['no_bukti_kuo'].'</option>';
												}
											}
											?>
                                        </select><span class="highlight"></span> <span class="bar"></span>
                                        <label for="no_bukti">No Bukti</label>
                                    </div>
                                    <div class="form-group m-b-40">
                                        <input name="realisasi" type="text" class="form-control" id="realisasi" value="<?=$d['realisasi'] ?>"><span class="highlight"></span> <span class="bar"></span>
                                        <label for="realisasi">Realisasi</label>
                                    </div>
                                    <div class="form-group m-b-40">
                                        <input name="droping" type="text" class="form-control" id="droping" value="<?=$d['droping'] ?>"><span class="highlight"></span> <span class="bar"></span>
                                        <label for="droping">Dropping</label>
                                    </div>
									<input name="cus" type="hidden" class="form-control" value="<?=$cu?>">
									<input name="id" type="hidden" class="form-control" value="<?=$dn?>">
									
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
    <!-- Date range Plugin JavaScript -->
    <script src="../plugins/bower_components/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="../plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
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