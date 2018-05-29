<?php
	include 'php/top.php';
    include 'php/header.php';
    include 'php/left-sidebar.php'; include 'php/breadcrumbs.php';
?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
            <!-- .page title -->
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Session Idle Timeout</h4>
            </div>
            <!-- /.page title -->
            <!-- .breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Session Idle Timeout</li>
            </ol>
            </div>
            <!-- /.breadcrumb -->
            </div>
            <!-- .row -->
            <div class="row">
            <div class="col-md-12">
            <div class="white-box">
            <h3 class="box-title">Session Idle Timeout Notification Control</h3>
            <!-- <div id="idletimeout">
               You will be logged off in <span>countdown place holder</span>&nbsp;seconds due to inactivity. 
               <a id="idletimeout-resume" href="#">Click here to continue using this web page</a>.
            </div> -->
            <p>This plugin allows you to detect whether a user is idle on website or working. It will notify the user if he/she is idle for the time specified in the plugin's settings. The user will be given a choice whether he/she wants to continue working or not. If not than screen will be locked after the specified time. User will have to enter the password to continue working after that. Here, for the demo purpose, notifying time is set to 5s and timeout time is set to 30s. In real time application it should be much higher number.</p>
            <div id="idle-timeout-dialog" data-backdrop="static" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Your session is expiring soon</h4> </div>
                        <div class="modal-body">
                            <p>
                             <i class="fa fa-warning font-red"></i> You session will be locked in
                             <span id="idle-timeout-counter"></span> seconds.</p>
                            <p> Do you want to continue your session? </p>
                        </div>
                        <div class="modal-footer text-center">
                            <button id="idle-timeout-dialog-keepalive" type="button" class="btn btn-outline btn-success" data-dismiss="modal">Yes, Keep Working</button>
                        </div>
                    </div>
                </div>
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

    <!-- Session-timeout-idle -->
    <script src="../plugins/bower_components/session-timeout/idle/jquery.idletimeout.js"></script>
    <script src="../plugins/bower_components/session-timeout/idle/jquery.idletimer.js"></script>
    <script src="../plugins/bower_components/session-timeout/idle/session-timeout-idle-init.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    
</body>

</html>