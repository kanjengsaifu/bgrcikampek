<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BGR CIKAMPEK | Registration</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./assets/dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="./assets/plugins/iCheck/square/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="./"><b>BGR</b> CIKAMPEK</a>
  </div>

  <div class="card">
<?php
include "admin/config.php";
if(isset($_POST['reg'])){
     $nm=$_POST['nm'];
     $user=$_POST['user'];
     $pass1=$_POST['pass1'];
     $pass2=$_POST['pass2'];
     $type=$_POST['type'];
     $tgl=date('Y-m-d H:i:s');
     if($pass1==$pass2){
          $pass=md5($pass1);
          $hasil=mysql_query("insert into multiuser values('','$nm','$user','$pass','$type','$tgl')");
          if($hasil){
               echo '
               <script>
               var conn=confirm("Berhasil Register User, Apa mau lanjut ke Menu Login");
               if(conn==true){
                    window.location.assign("index.php");
               }
               </script>
               ';
          }else{
			echo '
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fa fa-ban"></i> Alert!</h5>
                  Gagal Registrasi !!! ....
                </div>
			';
			}
     }
}
?>
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="../../index.html" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Nama Lengkap">
          <span class="fa fa-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Username">
          <span class="fa fa-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input name="pass1" type="password" class="form-control" placeholder="Password">
          <span class="fa fa-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input name="pass2" type="password" class="form-control" placeholder="Retype password">
          <span class="fa fa-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button name="reg" type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fa fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fa fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="index.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="./assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="./assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })
</script>
</body>
</html>
