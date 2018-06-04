<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="./plugins/images/favicon.png">
<title>BGR SUB CABANG CIKAMPEK | Log in</title>
<!-- Bootstrap Core CSS -->
<link href="admin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="./plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
<!-- animation CSS -->
<link href="admin/css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="admin/css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="admin/css/colors/blue.css" id="theme"  rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register">
  <div class="login-box login-sidebar">
	<?php
	include "admin/config.php";
	if(isset($_POST['log'])){
		 $user=$_POST['username'];
		 $pass=md5($_POST['password']);
		 $res=mysql_query("select * from multiuser where username='$user' and password='$pass'");
		 $data=mysql_fetch_array($res);
		 $nm=$data['nama_lengkap'];
		 $name=$data['username'];
		 $word=$data['password'];
		 $type=$data['type_user'];
		 $foto=$data['foto'];
		 $home="./admin";
		 if($user==$name && $pass==$word){
			  if($type=="Admin"){
				   session_start();
				   $_SESSION['nama_lengkap']=$nm;
				   $_SESSION['username']=$name;
				   $_SESSION['type_user']=$type;
				   $_SESSION['foto']=$foto;
				   echo '<script>window.location.assign("'.$home.'")</script>';
			  } else if($type=="Editor"){
				   session_start();
				   $_SESSION['nama_lengkap']=$nm;
				   $_SESSION['username']=$name;
				   $_SESSION['type_user']=$type;
           $_SESSION['foto']=$foto;
				   echo '<script>window.location.assign("'.$home.'")</script>';
			  } else{
				   session_start();
				   $_SESSION['nama_lengkap']=$nm;
				   $_SESSION['username']=$name;
				   $_SESSION['type_user']=$type;
           $_SESSION['foto']=$foto;
				   echo '<script>window.location.assign("'.$home.'")</script>';
			  }
		 }
		 else{
			 echo '
					<div class="alert alert-danger alert-dismissible">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					  <h5><i class="icon fa fa-ban"></i> Alert!</h5>
					  Gagal Login !!! ....
					</div>
				';
		 }
	}
	?>
    <div class="white-box">
      <form class="form-horizontal form-material" id="loginform" action="" method="post">
        <a href="javascript:void(0)" class="text-center db"><img src="./plugins/images/eliteadmin-logo-dark.png" alt="Home" /><br/><img src="./plugins/images/eliteadmin-text-dark.png" alt="Home" /></a>

        <div class="form-group m-t-40">
          <div class="col-xs-12">
            <input name="username" class="form-control" type="text" required="" placeholder="Username">
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input name="password"class="form-control" type="password" required="" placeholder="Password">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <div class="checkbox checkbox-primary pull-left p-t-0">
              <input id="checkbox-signup" type="checkbox">
              <label for="checkbox-signup"> Remember me </label>
            </div>
            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button name="log" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
<!-- jQuery -->
<script src="./plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="admin/bootstrap/dist/js/tether.min.js"></script>
<script src="admin/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="./plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>

<!--slimscroll JavaScript -->
<script src="admin/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="admin/js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="admin/js/custom.min.js"></script>
<!--Style Switcher -->
<script src="./plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
