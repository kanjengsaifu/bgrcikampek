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
                <div id="test" class="row el-element-overlay m-b-40">
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
                                            <img src="uploads/<?=$row['foto']?>" />
                                            <div class="el-overlay">
                                                <ul class="el-info">
                                                    <li><a class="view_data btn default btn-outline" href="reg.php?hapus=<?=$row['id_user']?>"><i class="icon-user-unfollow"></i></a></li>
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
                            <form action="reg.php" method="post" enctype="multipart/form-data" id="upload_form" class="form-horizontal form-material">
                                <div class="form-group">
                                    <label class="col-md-12">Full Name</label>
                                    <div class="col-md-12">
                                        <input type="text" name="nama_lengkap" placeholder="Full Name" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">User Name</label>
                                    <div class="col-md-12">
                                        <input type="text" name="user" placeholder="Full Name" class="form-control form-control-line">
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
                                    <label class="col-md-12">Jabatan</label>
                                    <div class="col-md-12">
                                        <input type="text" name="jabatan" placeholder="Full Name" class="form-control form-control-line">
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
                                        <textarea rows="5"  name="alamat" class="form-control form-control-line" placeholder="Alamat Lengkap"></textarea>
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
                                <div class="form-group">
                                    <div class="white-box">
                                        <h3 class="box-title">Foto Upload</h3>
                                        <label for="images">You can add by drag file or click to replace</label>
                                        <input name="__files[]" type="file" id="images" class="dropify" multiple />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                      <input type="submit" name="reg" class="btn btn-success" id="reg" value="Simpan"/>
                                    </div>
                                </div>
                            </form>
                            <div id="output"><!-- error or success results --></div>
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
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();
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
		<script type="text/javascript">
		//configuration
		var max_file_size 		= 2048576; //allowed file size. (1 MB = 1048576)
		var allowed_file_types 		= ['image/png', 'image/gif', 'image/jpeg', 'image/pjpeg']; //allowed file types
		var result_output 		= '#output'; //ID of an element for response output
		var my_form_id 			= '#upload_form'; //ID of an element for response output
		var total_files_allowed 	= 3; //Number files allowed to upload

		//on form submit
		$(my_form_id).on( "submit", function(event) {
			event.preventDefault();
			var proceed = true; //set proceed flag
			var error = [];	//errors
			var total_files_size = 0;

			if(!window.File && window.FileReader && window.FileList && window.Blob){ //if browser doesn't supports File API
				error.push("Your browser does not support new File API! Please upgrade."); //push error text
			}else{
				var total_selected_files = this.elements['__files[]'].files.length; //number of files

				//limit number of files allowed
				if(total_selected_files > total_files_allowed){
					error.push( "You have selected "+total_selected_files+" file(s), " + total_files_allowed +" is maximum!"); //push error text
					proceed = false; //set proceed flag to false
				}
				 //iterate files in file input field
				$(this.elements['__files[]'].files).each(function(i, ifile){
					if(ifile.value !== ""){ //continue only if file(s) are selected
						if(allowed_file_types.indexOf(ifile.type) === -1){ //check unsupported file
							error.push( "<b>"+ ifile.name + "</b> is unsupported file type!"); //push error text
							proceed = false; //set proceed flag to false
						}

						total_files_size = total_files_size + ifile.size; //add file size to total size
					}
				});

				//if total file size is greater than max file size
				if(total_files_size > max_file_size){
					error.push( "You have "+total_selected_files+" file(s) with total size "+total_files_size+", Allowed size is " + max_file_size +", Try smaller file!"); //push error text
					proceed = false; //set proceed flag to false
				}

				var submit_btn  = $(this).find("input[type=submit]"); //form submit button

				//if everything looks good, proceed with jQuery Ajax
				if(proceed){
					submit_btn.val("Please Wait...").prop( "disabled", true); //disable submit button
					var form_data = new FormData(this); //Creates new FormData object
					var post_url = $(this).attr("action"); //get action URL of form

					//jQuery Ajax to Post form data
					$.ajax({
						url : post_url,
						type: "POST",
						data : form_data,
						contentType: false,
						cache: false,
						processData:false,
						mimeType:"multipart/form-data"
					}).done(function(res){ //
						//$(my_form_id)[0].reset(); //reset form
						//$(result_output).html(res); //output response from server
						submit_btn.val("Simpan").prop( "disabled", false); //enable submit button once ajax is done
            //$('#responsive-modal').modal('hide');
            window.location.reload(true);
					});
				}
			}

			$(result_output).html(""); //reset output
			$(error).each(function(i){ //output any error to output element
				$(result_output).append('<div class="error">'+error[i]+"</div>");
			});

		});
		</script>
        <!--Style Switcher -->
        <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    </body>

    </html>
