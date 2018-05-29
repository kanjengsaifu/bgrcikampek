<?php 
    include 'php/top.php';
    include 'php/header.php';
    include 'php/left-sidebar.php';
	include 'php/breadcrumbs.php';
?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Home</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <?php echo breadcrumbs(); ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="row row-in">
                                <div class="col-lg-3 col-sm-6 row-in-br">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="linea-icon linea-basic"></i>
                                            <h5 class="text-muted vb">MYNEW CLIENTS</h5> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-danger">23</h3> </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 row-in-br  b-r-none">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe01b;"></i>
                                            <h5 class="text-muted vb">NEW PROJECTS</h5> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-megna">169</h3> </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-megna" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 row-in-br">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe00b;"></i>
                                            <h5 class="text-muted vb">NEW INVOICES</h5> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-primary">157</h3> </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6  b-0">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe016;"></i>
                                            <h5 class="text-muted vb">All PROJECTS</h5> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-success">431</h3> </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--row -->
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-7 col-lg-9 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Yearly Sales</h3>
                            <ul class="list-inline text-right">
                                <li>
                                    <h5><i class="fa fa-circle m-r-5" style="color: #00bfc7;"></i>iPhone</h5> </li>
                                <li>
                                    <h5><i class="fa fa-circle m-r-5" style="color: #fb9678;"></i>iPad</h5> </li>
                                <li>
                                    <h5><i class="fa fa-circle m-r-5" style="color: #9675ce;"></i>iPod</h5> </li>
                            </ul>
                            <div id="morris-area-chart" style="height: 340px;"></div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-3 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">To Do List</h3>
                            <ul class="list-task list-group" data-role="tasklist">
                                <li class="list-group-item" data-role="task">
                                    <div class="checkbox checkbox-info">
                                        <input type="checkbox" id="inputSchedule" name="inputCheckboxesSchedule">
                                        <label for="inputSchedule"> <span>Schedule meeting</span> </label>
                                    </div>
                                </li>
                                <li class="list-group-item" data-role="task">
                                    <div class="checkbox checkbox-info">
                                        <input type="checkbox" id="inputCall" name="inputCheckboxesCall">
                                        <label for="inputCall"> <span>Give Purchase report</span> <span class="label label-danger">Today</span> </label>
                                    </div>
                                </li>
                                <li class="list-group-item" data-role="task">
                                    <div class="checkbox checkbox-info">
                                        <input type="checkbox" id="inputBook" name="inputCheckboxesBook">
                                        <label for="inputBook"> <span>Book flight for holiday</span> </label>
                                    </div>
                                </li>
                                <li class="list-group-item" data-role="task">
                                    <div class="checkbox checkbox-info">
                                        <input type="checkbox" id="inputForward" name="inputCheckboxesForward">
                                        <label for="inputForward"> <span>Forward all tasks</span> <span class="label label-warning">2 weeks</span> </label>
                                    </div>
                                </li>
                                <li class="list-group-item" data-role="task">
                                    <div class="checkbox checkbox-info">
                                        <input type="checkbox" id="inputRecieve" name="inputCheckboxesRecieve">
                                        <label for="inputRecieve"> <span>Recieve shipment</span> </label>
                                    </div>
                                </li>
                                <li class="list-group-item" data-role="task">
                                    <div class="checkbox checkbox-info">
                                        <input type="checkbox" id="inputForward2" name="inputCheckboxesd">
                                        <label for="inputForward2"> <span>Important tasks</span> <span class="label label-success">2 weeks</span> </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--row -->

                <!--row -->
                <div class="row">
                    <div class="col-md-12 col-lg-9 col-sm-12 col-xs-12 pull-right">
                        <div class="white-box">
                            <h3 class="box-title">Sales Difference</h3>
                            <ul class="list-inline text-right">
                                <li>
                                    <h5><i class="fa fa-circle m-r-5" style="color: #00bfc7;"></i>Site A View</h5> </li>
                                <li>
                                    <h5><i class="fa fa-circle m-r-5" style="color: #fdc006;"></i>Site B View</h5> </li>
                            </ul>
                            <div id="morris-area-chart2" style="height: 370px;"></div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-3 col-sm-6 col-xs-12">
                        <div class="row">
                            <div class="col-md-6 col-lg-12">
                                <div class="white-box m-b-15">
                                    <h3 class="box-title">Sales Difference</h3>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6  m-t-30">
                                            <h1 class="text-info">$647</h1>
                                            <p class="text-muted">APRIL 2017</p>
                                            <b>(150 Sales)</b> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div id="sparkline2dash" class="text-center"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12">
                                <div class="white-box bg-purple m-b-15">
                                    <h3 class="text-white box-title">VISIT STATASTICS</h3>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6  m-t-30">
                                            <h1 class="text-white">$347</h1>
                                            <p class="light_op_text">APRIL 2017</p>
                                            <b class="text-white">(150 Sales)</b> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div id="sales1" class="text-center"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php include 'php/right-sidebar.php';?>
        </div>
        <!-- /.container-fluid -->
        <?php include 'php/footer.php';?>

    <!-- Sparkline chart JavaScript -->
    <script src="../plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
    <script src="../plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $.toast({
                heading: 'Welcome'
                , text: '<?=$user?>, As <?=$type?>.'
                , position: 'top-right'
                , loaderBg: '#ff6849'
                , icon: 'info'
                , hideAfter: 3500
                , stack: 6
            })
        });
    </script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    <!--Style Switcher -->
<script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>