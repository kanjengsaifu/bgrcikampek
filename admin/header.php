<?php
include "config.php";
session_start();
if(!isset($_SESSION['username'])){
     echo '<script>window.location.assign("../index.php")</script>';
}
$user=$_SESSION['nama_lengkap'];
$type=$_SESSION['type_user'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BGR CIKAMPEK</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.css">
  <!-- fullCalendar 2.2.5-->
  <link rel="stylesheet" href="../assets/plugins/fullcalendar/fullcalendar.css">
  <link rel="stylesheet" href="../assets/plugins/fullcalendar/fullcalendar.print.css" media="print">
  <!-- iCheck -->
  <link rel="stylesheet" href="../assets/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../assets/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../assets/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../assets/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">
          <span><i class="fa fa-arrow-circle-left"></i> Logout</span>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="./index.php" class="brand-link">
      <img src="../assets/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

		<!-- Sidebar -->
		<div class="sidebar">
		  <!-- Sidebar user panel (optional) -->
		  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
			  <img src="../assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
			  <a href="#" class="d-block"><?=$user?></a>
			</div>
		  </div>
		  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="info">
			  <a href="#" class="d-block">Selamat Datang <b><?=$type?>.</b></a>
			</div>
		  </div>
		  <!-- Sidebar Menu -->
		  <nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
			  <!-- Add icons to the links using the .nav-icon class
				   with font-awesome or any other icon font library -->
		 <?php
		 if($type=='Editor'){
		 ?>

			  <li class="nav-item has-treeview menu-open">
				<a href="index.php" class="nav-link">
				  <i class="nav-icon fa fa-dashboard"></i>
				  <p>
					HOME
				  </p>
				</a>
			  </li>
			  <li class="nav-item has-treeview">
				<a href="#" class="nav-link">
				  <i class="nav-icon fa fa-pie-chart"></i>
				  <p>
					MASTER DATA
					<i class="right fa fa-angle-left"></i>
				  </p>
				</a>
				<ul class="nav nav-treeview">
				  <li class="nav-item">
					<a href="customer.php" class="nav-link">
					  <i class="fa fa-circle-o nav-icon"></i>
					  <p>PRINCIPAL</p>
					</a>
				  </li>
				  <li class="nav-item">
					<a href="barang.php" class="nav-link">
					  <i class="fa fa-circle-o nav-icon"></i>
					  <p>VENDOR</p>
					</a>
				  </li>
				  <li class="nav-item">
					<a href="truck.php" class="nav-link">
					  <i class="fa fa-circle-o nav-icon"></i>
					  <p>TRUK</p>
					</a>
				  </li>
				</ul>
			  </li>
			  <li class="nav-item has-treeview">
				<a href="#" class="nav-link">
				  <i class="nav-icon fa fa-dashboard"></i>
				  <p>
					PRINCIPAL
					<i class="right fa fa-angle-left"></i>
				  </p>
				</a>
				<ul class="nav nav-treeview">
				 <?php
				 $cus=mysql_query("select * from customer");
				 while($c=mysql_fetch_array($cus)){
					$id=$c['id'];
					$nm_cus=$c['nm_cus'];
				 ?>
				  <li class="nav-item has-treeview">
					<a href="#" class="nav-link">
					  <i class="nav-icon fa fa-dashboard"></i>
					  <p>
						<?=$nm_cus?>
					  <i class="right fa fa-angle-left"></i>
					  </p>
							</a>
					<ul class="nav nav-treeview">
					  <li class="nav-item">
					  <a href="spk.php?spk=<?=$id?>" class="nav-link">
						<i class="fa fa-circle-o nav-icon"></i>
						<p>SPK</p>
					  </a>
					  </li>
					  <li class="nav-item">
					  <a href="dn.php?dn=<?=$id?>" class="nav-link">
						<i class="fa fa-circle-o nav-icon"></i>
						<p>DN</p>
					  </a>
					  </li>
					</ul>
				  </li>
				<?php 
				}
				?> 
				</ul>
			  </li>
			  <li class="nav-item">
				<a href="kuo.php" class="nav-link">
				  <i class="nav-icon fa fa-calendar"></i>
				  <p>
					KUO
				  </p>
				</a>
			  </li>
			  <li class="nav-item has-treeview">
				<a href="#" class="nav-link">
				  <i class="nav-icon fa fa-edit"></i>
				  <p>
					LAPORAN
					<i class="fa fa-angle-left right"></i>
				  </p>
				</a>
				<ul class="nav nav-treeview">
				  <li class="nav-item">
					<a href="pages/forms/general.html" class="nav-link">
					  <i class="fa fa-circle-o nav-icon"></i>
					  <p>KEGIATAN PROPOSAL</p>
					</a>
				  </li>
				  <li class="nav-item">
					<a href="pages/forms/advanced.html" class="nav-link">
					  <i class="fa fa-circle-o nav-icon"></i>
					  <p>LAPORAN OPERASIONAL LOGISTIK</p>
					</a>
				  </li>
				  <li class="nav-item">
					<a href="pages/forms/editors.html" class="nav-link">
					  <i class="fa fa-circle-o nav-icon"></i>
					  <p>KEGIATAN LOGISTIK</p>
					</a>
				  </li>
				  <li class="nav-item">
					<a href="pages/forms/editors.html" class="nav-link">
					  <i class="fa fa-circle-o nav-icon"></i>
					  <p>LAPORAN KERUSAKAN</p>
					</a>
				  </li>
				</ul>
			  </li>

		 <?php
		 }
		 if($type=='Admin'){
		 ?>

			  <li class="nav-item has-treeview menu-open">
				<a href="index.php" class="nav-link">
				  <i class="nav-icon fa fa-dashboard"></i>
				  <p>
					HOME
				  </p>
				</a>
			  </li>
			  <li class="nav-item has-treeview">
				<a href="#" class="nav-link">
				  <i class="nav-icon fa fa-pie-chart"></i>
				  <p>
					MASTER DATA
					<i class="right fa fa-angle-left"></i>
				  </p>
				</a>
				<ul class="nav nav-treeview">
				  <li class="nav-item">
					<a href="customer.php" class="nav-link">
					  <i class="fa fa-circle-o nav-icon"></i>
					  <p>PRINCIPAL</p>
					</a>
				  </li>
				  <li class="nav-item">
					<a href="barang.php" class="nav-link">
					  <i class="fa fa-circle-o nav-icon"></i>
					  <p>VENDOR</p>
					</a>
				  </li>
				  <li class="nav-item">
					<a href="truck.php" class="nav-link">
					  <i class="fa fa-circle-o nav-icon"></i>
					  <p>TRUK</p>
					</a>
				  </li>
				</ul>
			  </li>
			  <li class="nav-item has-treeview">
				<a href="#" class="nav-link">
				  <i class="nav-icon fa fa-dashboard"></i>
				  <p>
					PRINCIPAL
					<i class="right fa fa-angle-left"></i>
				  </p>
				</a>
				<ul class="nav nav-treeview">
				 <?php
				 $cus=mysql_query("select * from customer");
				 while($c=mysql_fetch_array($cus)){
					$id=$c['id'];
					$nm_cus=$c['nm_cus'];
				 ?>
				  <li class="nav-item has-treeview">
					<a href="#" class="nav-link">
					  <i class="nav-icon fa fa-dashboard"></i>
					  <p>
						<?=$nm_cus?>
					  <i class="right fa fa-angle-left"></i>
					  </p>
							</a>
					<ul class="nav nav-treeview">
					  <li class="nav-item">
					  <a href="spk.php?spk=<?=$id?>" class="nav-link">
						<i class="fa fa-circle-o nav-icon"></i>
						<p>SPK</p>
					  </a>
					  </li>
					  <li class="nav-item">
					  <a href="dn.php?dn=<?=$id?>" class="nav-link">
						<i class="fa fa-circle-o nav-icon"></i>
						<p>DN</p>
					  </a>
					  </li>
					</ul>
				  </li>
				<?php 
				}
				?> 
				</ul>
			  </li>
			  <li class="nav-item">
				<a href="kuo.php" class="nav-link">
				  <i class="nav-icon fa fa-calendar"></i>
				  <p>
					KUO
				  </p>
				</a>
			  </li>
			  <li class="nav-item has-treeview">
				<a href="#" class="nav-link">
				  <i class="nav-icon fa fa-edit"></i>
				  <p>
					LAPORAN
					<i class="fa fa-angle-left right"></i>
				  </p>
				</a>
				<ul class="nav nav-treeview">
				  <li class="nav-item">
					<a href="pages/forms/general.html" class="nav-link">
					  <i class="fa fa-circle-o nav-icon"></i>
					  <p>KEGIATAN PROPOSAL</p>
					</a>
				  </li>
				  <li class="nav-item">
					<a href="pages/forms/advanced.html" class="nav-link">
					  <i class="fa fa-circle-o nav-icon"></i>
					  <p>LAPORAN OPERASIONAL LOGISTIK</p>
					</a>
				  </li>
				  <li class="nav-item">
					<a href="pages/forms/editors.html" class="nav-link">
					  <i class="fa fa-circle-o nav-icon"></i>
					  <p>KEGIATAN LOGISTIK</p>
					</a>
				  </li>
				  <li class="nav-item">
					<a href="pages/forms/editors.html" class="nav-link">
					  <i class="fa fa-circle-o nav-icon"></i>
					  <p>LAPORAN KERUSAKAN</p>
					</a>
				  </li>
				</ul>
			  </li>
	 
		 <?php
		 }
		 ?>
			</ul>
		  </nav>
		  <!-- /.sidebar-menu -->
		</div>
		<!-- /.sidebar -->

  </aside>
  