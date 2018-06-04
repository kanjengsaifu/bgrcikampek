<?php
include "config.php";
include "timezone.php";

 $nm=$_POST['nama_lengkap'];
 $user=$_POST['user'];
 $pass1=$_POST['pass1'];
 $pass2=$_POST['pass2'];
 $jabatan=$_POST['jabatan'];
 $email=$_POST['email'];
 $phone=$_POST['phone'];
 $alamat=$_POST['alamat'];
 $type=$_POST['type'];
 $tgl=date('Y-m-d H:i:s');

  ############ Configuration ##############
  $config["generate_image_file"]			= true;
  $config["generate_thumbnails"]			= false;
  $config["image_max_size"] 			= 500; //Maximum image size (height and width)
  $config["thumbnail_size"]  			= 200; //Thumbnails will be cropped to 200x200 pixels
  $config["thumbnail_prefix"]			= "thumb_"; //Normal thumb Prefix
  $config["destination_folder"]			= 'uploads/'; //upload directory ends with / (slash)
  $config["thumbnail_destination_folder"]		= 'uploads/'; //upload directory ends with / (slash)
  $config["upload_url"] 				= "uploads/";
  $config["quality"] 				= 90; //jpeg quality
  $config["random_file_name"]			= true; //randomize each file name


  if(!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
  	exit;  //try detect AJAX request, simply exist if no Ajax
  }

  //specify uploaded file variable
  $config["file_data"] = $_FILES["__files"];


  //include sanwebe impage resize class
  include("resize.class.php");


  //create class instance
  $im = new ImageResize($config);


  try{
  	$responses = $im->resize(); //initiate image resize

  	echo '<h3>Images</h3>';
  	//output images
  	foreach($responses["images"] as $response){
      if($pass1==$pass2){
           $pass=md5($pass1);
           $hasil=mysql_query("insert into multiuser values('','$nm','$user','$pass','$jabatan','$email','$phone','$alamat','$response','$type','$tgl')");
      }
  		//echo '<img src="'.$config["upload_url"].$response.'" class="images" title="'.$response.'" />';
  	}

  }catch(Exception $e){
  	echo '<div class="error">';
  	echo $e->getMessage();
  	echo '</div>';
  }
?>
