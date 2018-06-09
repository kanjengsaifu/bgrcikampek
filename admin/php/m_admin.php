
<!-- Left navbar-header -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <div class="user-profile">
            <div class="dropdown user-pro-body">
                <div><img src="uploads/<?=$foto?>" alt="user-img" class="img-circle"></div>
                <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?=$user?> <span class="caret"></span></a>
                <ul class="dropdown-menu animated flipInY">
                    <li><a href="profile.php"><i class="ti-user"></i> My Profile</a></li>
                    <li><a href="404.php"><i class="ti-wallet"></i> My Balance</a></li>
                    <li><a href="inbox.php"><i class="ti-email"></i> Inbox</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="404.php"><i class="ti-settings"></i> Account Setting</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="user_manager.php"><i class="ti-settings"></i> User Man</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="../logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
            </div>
        </div>
        <ul class="nav" id="side-menu">
            <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                <!-- input-group -->
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search..."> <span class="input-group-btn">
            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
            </span> </div>
                <!-- /input-group -->
            </li>
            <li class="nav-small-cap m-t-10">--- Main Menu</li>
            <li> <a href="./" class="waves-effect"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">HOME</span></a> </li>
            <li> <a href="javascript:void(0);" class="waves-effect"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu"> MASTER DATA <span class="fa arrow"></span> <span class="label label-rouded label-custom pull-right">3</span></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="customer.php">PRINCIPAL</a> </li>
                    <li> <a href="barang.php">VENDOR</a> </li>
                    <li> <a href="truck.php">TRUK</a> </li>
                </ul>
            </li>
           <?php
           $cus=mysql_query("select * from customer");
           while($c=mysql_fetch_array($cus)){
            $ii++;
           }
           ?>
            <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="F" class="linea-icon linea-software fa-fw"></i> <span class="hide-menu">PRINCIPAL<span class="fa arrow"></span><span class="label label-rouded label-custom pull-right"><?=$ii?></span></span></a>
                <ul class="nav nav-second-level">
                   <?php
                   $cus=mysql_query("select * from customer");
                   while($c=mysql_fetch_array($cus)){
                    $id=$c['id'];
                    $nm_cus=$c['nm_cus'];
                   ?>
                    <li> <a href="javascript:void(0)" class="waves-effect"><?=$nm_cus?> <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li> <a href="spk.php?spk=<?=$id?>">SPK</a> </li>
                            <li> <a href="dn.php?dn=<?=$id?>">DN</a> </li>
                        </ul>
                    </li>
         <?php
         }
         ?>
                </ul>
            </li>
            <li><a href="kuo.php" class="waves-effect"><i data-icon=")" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">KUO</span></a> </li>
            <li class="nav-small-cap">--- SEMUA LAPORAN</li>
            <li> <a href="#" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">LAPORAN<span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="laporan_truk.php">LAPORAN TRUK MILIK</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- Left navbar-header end -->
