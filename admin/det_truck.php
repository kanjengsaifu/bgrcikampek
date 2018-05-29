<?php include 'Assets/inc/config.php'; ?>
<?php include 'Assets/inc/template_start.php'; ?>
<?php include 'Assets/inc/page_head.php'; ?>

<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="fa fa-table"></i>Detail Truck
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="./">Home</a></li>
        <li><a href="truck.php">Truck</a></li>
        <li>Detail Truck</li>
    </ul>
    <!-- END Datatables Header -->
    <!-- Customer Content -->
    <div class="row">
        <div class="col-lg-4">
            <!-- Customer Info Block -->
            <div class="block">
                <!-- Customer Info Title -->
                <div class="block-title">
                    <h2><i class="fa fa-file-o"></i> <strong>Detail</strong> Truck</h2>
                </div>
                <!-- END Customer Info Title -->
				<?php
				$id=mysql_real_escape_string($_GET['id']);
				$det=mysql_query("select * from truk where id='$id'")or die(mysql_error());
				while($d=mysql_fetch_array($det)){
				?>			
                <!-- Customer Info -->
                <div class="block-section text-center">
                    <h3>
                        <strong><?=$d['nm_truk'] ?></strong><br><small></small>
                    </h3>
                </div>
                <table class="table table-borderless table-striped table-vcenter">
                    <tbody>
                        <tr>
                            <td class="text-right" style="width: 50%;"><strong>Nomor Polisi</strong></td>
                            <td><?=$d['nopol'] ?></td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>Nama Sopir</strong></td>
                            <td><?=$d['nm_supir'] ?></td>
                        </tr>
                    </tbody>
                </table>
                <!-- END Customer Info -->
				<?php
				}
				?>
            </div>
            <!-- END Customer Info Block -->
        </div>
    </div>
    <!-- END Customer Content -->
</div>
<!-- END Page Content -->

<?php include 'Assets/inc/page_footer.php'; ?>
<?php include 'Assets/inc/template_scripts.php'; ?>
<?php include 'Assets/inc/template_end.php'; ?>