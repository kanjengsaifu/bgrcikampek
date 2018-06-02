<?php
    include 'php/top.php';
    include 'php/header.php';
    include 'php/left-sidebar.php'; include 'php/breadcrumbs.php';
?>
        <!-- Page Content -->
        <div id="page-wrapper">
          <div class="container-fluid">
    				<div class="row bg-title">
    					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    						<h4 class="page-title">User Management </h4> </div>
    					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    						<?php echo breadcrumbs(); ?>
    					</div>
    					<!-- /.col-lg-12 -->
    				</div>
            <!-- .row -->
            <div class="row">
                <div class="col-md-4">
                    <div class="white-box">
                        <!-- sample modal content -->
                        <button data-toggle="modal" data-target="#responsive-modal" class="btn btn-default waves-effect"><span class="glyphicon glyphicon-plus"></span>Tambah User</button>
                        <!-- Button trigger modal -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
                <!-- .row -->
                <div class="row el-element-overlay m-b-40">
                    <div class="col-md-12">
                        <h4>Daftar <small>User <br/><code>Lihat Semua Pengguna</code></small></h4>

                        <hr>
                    </div>

                    <!-- /.usercard -->
                    <?php
              				// memasukkan koneksi ke database
              				require_once("config.php");

              				// query ke database, query standart ya dengan mysqli

              				$query = $koneksi->query("SELECT * FROM multiuser ORDER BY id_user ASC");
              				//jika ada datanya
              				if($query->num_rows){
              					$no = 1;	// membuat variabel $no untu nomor urut
              					//melakukan perulangan while, membuat variabel $row untuk menyimpan datanya
              					while($row = $query->fetch_assoc()){
              						//menampilkan isi table nomor, nama dan aksi untuk tombol lihat data
                          ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <div class="white-box">
                                    <div class="el-card-item">
                                        <div class="el-card-avatar el-overlay-1">
                                            <img src="../plugins/bower_components/dropify/src/images/<?=$row['foto']?>" />
                                            <div class="el-overlay">
                                                <ul class="el-info">
                                                    <li><a class="view_data btn default btn-outline" data-toggle="modal" id="<?=$row['id_user']?>" data-target="#myModal"><i class="icon-magnifier"></i></a></li>
                                                    <li><a class="view_data btn default btn-outline" href="../reg.php?hapus=<?=$row['id_user']?>"><i class="icon-user-unfollow"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="el-card-content">
                                            <h3 class="box-title"><?=$row['nama_lengkap']?></h3>
                                            <small><?=$row['type_user']?></small>
                                            <br/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.usercard-->
                          <?php
              						// increase nomor
              						$no++;
              					}
              				}
            				?>

                </div>
                <!-- /.row -->

<!-- .modal1 -->
<!-- memulai modal nya. pada id="$myModal" harus sama dengan data-target="#myModal" pada tombol di atas -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Contact Detail</h4>
      </div>
      <!-- memulai untuk konten dinamis -->
      <!-- lihat id="data_siswa", ini yang di pangging pada ajax di bawah -->
      <div class="modal-body" id="data_user">
      </div>
      <!-- selesai konten dinamis -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /.modal1 -->

<!-- .modal2 -->
<!-- memulai modal nya. pada id="$myModal" harus sama dengan data-target="#myModal" pada tombol di atas -->
<div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true" style="display: none;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Tambah  User Baru</h4> </div>
        <!-- .row -->
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="white-box">
                    <!-- .tabs -->
                    <ul class="nav customtab nav-tabs" role="tablist">
                        <li role="presentation" class="nav-item"><a href="#settings" class="nav-link active" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-settings"></i></span> <span class="hidden-xs">Add Detail</span></a></li>
                    </ul>
                    <!-- /.tabs -->
                    <div class="tab-content">
                        <!-- .tabs1 -->
                        <div class="tab-pane active" id="settings">
                            <form class="form-horizontal form-material" action="../reg.php" method="post">
                                <div class="form-group">
                                    <label class="col-md-12">Full Name</label>
                                    <div class="col-md-12">
                                        <input type="text" name="nama_lengkap" placeholder="Full Name" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" placeholder="Email" class="form-control form-control-line" name="email" id="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="password" name="pass1" placeholder="Password" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Retype password</label>
                                    <div class="col-md-12">
                                        <input type="password" name="pass2" placeholder="Retype password" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input type="text" name="phone" placeholder="Phone No" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Alamat</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" class="form-control form-control-line" placeholder="Alamat Lengkap"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Hak Akses</label>
                                    <div class="col-sm-12">
                                        <select name="type" class="custom-select col-12" id="inlineFormCustomSelect">
                                            <option selected>Choose...</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Editor">Editor</option>
                                            <?php
                                     				 $cus=mysql_query("select * from customer");
                                     				 while($c=mysql_fetch_array($cus)){
                                     					$id=$c['id'];
                                     					$nm_cus=$c['nm_cus'];
                                     				?>
                                            <option value="<?=$id?>"><?=$nm_cus?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 ol-md-6 col-xs-12">
                                    <div class="white-box">
                                        <h3 class="box-title">Foto Upload</h3>
                                        <label for="input-file-now-custom-1">You can add by drag file or click to replace</label>
                                        <input name="foto" type="file" id="input-file-now-custom-1" class="dropify" data-default-file="../plugins/bower_components/dropify/src/images/Euclid.png" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button name="reg" class="btn btn-success">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tabs1 -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
		</div>
	</div>
</div>
<!-- /.modal2 -->

            <?php include 'php/right-sidebar.php';?>
        </div>
        <!-- /.container-fluid -->
        <?php include 'php/footer.php';?>

        <!-- jQuery file upload -->
        <script src="../plugins/bower_components/dropify/dist/js/dropify.min.js"></script>
        <!-- nah, ini buat menampilkan data modal dengan ajax, pantengin ya :) -->
      	<script>
        	// ini menyiapkan dokumen agar siap grak :)
        	$(document).ready(function(){
        		// yang bawah ini bekerja jika tombol lihat data (class="view_data") di klik
        		$('.view_data').click(function(){
        			// membuat variabel id, nilainya dari attribut id pada button
        			// id="'.$row['id'].'" -> data id dari database ya sob, jadi dinamis nanti id nya
        			var id = $(this).attr("id");

        			// memulai ajax
        			$.ajax({
        				url: 'php/getuser.php',	// set url -> ini file yang menyimpan query tampil detail data siswa
        				method: 'post',		// method -> metodenya pakai post. Tahu kan post? gak tahu? browsing aja :)
        				data: {id:id},		// nah ini datanya -> {id:id} = berarti menyimpan data post id yang nilainya dari = var id = $(this).attr("id");
        				success:function(data){		// kode dibawah ini jalan kalau sukses
        					$('#data_user').html(data);	// mengisi konten dari -> <div class="modal-body" id="data_siswa">
        					$('#myModal').modal("show");	// menampilkan dialog modal nya
        				}
        			});
        		});
        	});
      	</script>
        <script>
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });
        </script>

        <!--Style Switcher -->
        <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    </body>

    </html>
