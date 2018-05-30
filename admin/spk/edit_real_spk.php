<?php
	$cu=$_GET['cus'];
	$no_spk=$_GET['no_spk'];
    include '../php/top.php';
    include '../php/header.php';
    include '../php/left-sidebar.php'; include '../php/breadcrumbs.php';
    ?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Edit Data Realisasi SPK</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <?php echo breadcrumbs(); ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- .row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box p-l-20 p-r-20">
                        <h3 class="box-title m-b-0"><a href="realisasi_spk.php?id=<?=$no_spk?>&cus=<?=$cu?>" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" title="Kembali">Kembali</a></h3>
                        <h2><strong>Edit Data Realisasi</strong> SPK</h2>
						<br>
                        <div class="row">
                            <div class="col-md-12">
							  <?php
							  $id=$_GET['id'];
							  $det=mysql_query("select * from realisasi where id='$id'")or die(mysql_error());
							  while($d=mysql_fetch_array($det)){
							  ?>
                                <form action="tmb_real_act.php" method="post" class="floating-labels ">
									<div class="form-group">
										<label>No SPK</label>
										<input name="no_spk" type="hidden" class="form-control" value="<?=$d['no_spk'] ?>"><br>
										<p><h2><b><?=$d['no_spk'] ?></b></h2></p>
									</div>

									<div class="form-group m-b-40">
										<input name="tgl_realisasi" type="text" class="form-control mydatepicker" id="tgl_realisasi" value="<?=$d['tgl_realisasi'] ?>" required><span class="highlight"></span> <span class="bar"></span>
										<label for="tgl_realisasi">Tanggal Realisasi</label>
									</div>
                                    <div class="form-group m-b-40">
                                        <input name="armada" type="text" class="form-control" id="armada" value="<?=$d['armada'] ?>" required><span class="highlight"></span> <span class="bar"></span>
                                        <label for="armada">Armada</label>
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
                                        <input name="party" type="text" class="form-control" id="party" value="<?=$d['party'] ?>" required><span class="highlight"></span> <span class="bar"></span>
                                        <label for="party">Party</label>
                                    </div>
                                    <div class="form-group m-b-40">
                                        <select name="satuan" class="form-control p-0" id="satuan" required>
											<option></option>
											<option>TON</option>
											<option>BALLS</option>
											<option>M3</option>
											<option>RITASE</option>
                                        </select><span class="highlight"></span> <span class="bar"></span>
                                        <label for="satuan">Satuan</label>
                                    </div>
                                    <div class="form-group m-b-40">
                                        <input name="nopol" type="text" class="form-control" id="nopol" value="<?=$d['nopol'] ?>" required><span class="highlight"></span> <span class="bar"></span>
                                        <label for="nopol">No Polisi</label>
                                    </div>
                                    <div class="form-group m-b-40">
                                        <input name="no_surjl" type="text" class="form-control" id="no_surjl" value="<?=$d['no_surjl'] ?>" required><span class="highlight"></span> <span class="bar"></span>
                                        <label for="no_surjl">No Surat Jalan</label>
                                    </div>
                                    <div class="form-group m-b-40">
                                        <input name="biaya_armada" type="text" class="form-control" id="biaya_armada" value="<?=$d['biaya_armada'] ?>" required><span class="highlight"></span> <span class="bar"></span>
                                        <label for="biaya_armada">Biaya Armada</label>
                                    </div>
                                    <div class="form-group m-b-40">
                                        <input name="operasional_mb" type="text" class="form-control" id="operasional_mb" value="<?=$d['operasional_mb'] ?>" required><span class="highlight"></span> <span class="bar"></span>
                                        <label for="operasional_mb">Operasional MB</label>
                                    </div>
                                    <div class="form-group m-b-40">
                                        <input name="pendapatan" type="text" class="form-control" id="pendapatan" value="<?=$d['pendapatan'] ?>" required><span class="highlight"></span> <span class="bar"></span>
                                        <label for="pendapatan">Pendapatan</label>
                                    </div>

									<input name="cus" type="hidden" value="<?=$cu?>">
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
            <?php include '../php/right-sidebar.php';?>
        </div>
        <!-- /.container-fluid -->
        <?php include '../php/footer.php';?>

    <!-- Sweet-Alert  -->
    <script src="../../plugins/bower_components/sweetalert/sweetalert.min.js"></script>
    <script src="../../plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="../../plugins/bower_components/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="../../plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
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
    <script src="../../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    <!--Style Switcher -->
<script src="../../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
