<?php
//memasukkan koneksi database
require_once("../config.php");

//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if($_POST['id']){
	//membuat variabel id berisi post['id']
	$id = $_POST['id'];
	//query standart select where id
	$view = $koneksi->query("SELECT * FROM multiuser WHERE id_user='$id'");
	//jika ada datanya
	if($view->num_rows){
		//fetch data ke dalam veriabel $row_view
		$row_view = $view->fetch_assoc();
		//menampilkan data dengan table
?>

<link rel="stylesheet" href="../plugins/bower_components/dropify/dist/css/dropify.min.css">
                <!-- .row -->
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box">
                            <div class="user-bg">
                                <img width="100%" alt="user" src="../plugins/images/large/<?=$row_view['foto']?>">
                            </div>
                            <div class="user-btm-box">
                                <!-- .row -->
                                <div class="row text-center m-t-10">
                                    <div class="col-md-6 b-r"><strong>Name</strong>
                                        <p><?=$row_view['nama_lengkap']?></p>
                                    </div>
                                    <div class="col-md-6"><strong>Designation</strong>
                                        <p><?=$row_view['jabatan']?></p>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <hr>
                                <!-- .row -->
                                <div class="row text-center m-t-10">
                                    <div class="col-md-6 b-r"><strong>Email ID</strong>
                                        <p><?=$row_view['email']?></p>
                                    </div>
                                    <div class="col-md-6"><strong>Phone</strong>
                                        <p><?=$row_view['phone']?></p>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <hr>
                                <!-- .row -->
                                <div class="row text-center m-t-10">
                                    <div class="col-md-12"><strong>Address</strong>
                                        <p><?=$row_view['alamat']?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="white-box">
                            <!-- .tabs -->
                            <ul class="nav customtab nav-tabs" role="tablist">
                                <li role="presentation" class="nav-item"><a href="#settings" class="nav-link active" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-settings"></i></span> <span class="hidden-xs">Edit Detail</span></a></li>
                            </ul>
                            <!-- /.tabs -->
                            <div class="tab-content">
                                <!-- .tabs1 -->
                                <div class="tab-pane active" id="settings">
                                    <form class="form-horizontal form-material" action="../reg.php" method="post">
                                        <div class="form-group">
                                            <label class="col-md-12">Full Name</label>
                                            <div class="col-md-12">
                                                <input type="text" name="nama_lengkap" placeholder="Full Name" class="form-control form-control-line" value="<?=$row_view['nama_lengkap']?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-email" class="col-md-12">Email</label>
                                            <div class="col-md-12">
                                                <input type="email" value="<?=$row_view['email']?>" placeholder="Email" class="form-control form-control-line" name="email" id="email">
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
                                                <input type="text" name="phone" placeholder="Phone No" value="<?=$row_view['phone']?>" class="form-control form-control-line">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Alamat</label>
                                            <div class="col-md-12">
                                                <textarea name="alamat" rows="5" class="form-control form-control-line" placeholder="Alamat Lengkap"><?=$row_view['alamat']?></textarea>
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
                                             					$idc=$c['id'];
                                             					$nm_cus=$c['nm_cus'];
                                             				?>
                                                    <option value="<?=$idc?>"><?=$nm_cus?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="col-sm-6 ol-md-6 col-xs-12">
                                              <div class="white-box">
                                                  <h3 class="box-title">Foto Upload</h3>
                                                  <label for="input-file-now-custom-1">You can add by drag file or click to replace</label>
                                                  <input name="foto" type="file" id="input-file-now-custom-1" class="dropify" data-default-file="../plugins/bower_components/dropify/src/images/Euclid.png" />
                                              </div>
                                          </div>
                                        </div>
                                        <input type="hidden" name="id" value="<?=$row_view['id'] ?>">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button name="up" class="btn btn-success">Update Profile</button>
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
<?php
	}
}
?>
