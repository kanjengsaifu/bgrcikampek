<?php
include "admin/config.php";

 $id=$_POST['id'];
 $nm=$_POST['nama_lengkap'];
 $user=$_POST['user'];
 $pass1=$_POST['pass1'];
 $pass2=$_POST['pass2'];
 $jabatan=$_POST['jabatan'];
 $email=$_POST['email'];
 $phone=$_POST['phone'];
 $alamat=$_POST['alamat'];
 $foto=$_FILE['foto'];
 $type=$_POST['type'];
 $tgl=date('Y-m-d H:i:s');

 $statusMsg = '';

 // File upload path
 $targetDir = "plugins/bower_components/dropify/src/images/";
 $fileName = basename($_FILES["foto"]["name"]);
 $targetFilePath = $targetDir . $fileName;
 $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST['reg'])){
     if(!empty($_FILES["foto"]["name"])){
         // Allow certain file formats
         $allowTypes = array('jpg','png','jpeg','gif','pdf');
         if(in_array($fileType, $allowTypes)){
             // Upload file to server
             if(move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFilePath)){
                 // Insert image file name into database
                 if($pass1==$pass2){
                      $pass=md5($pass1);
                      $hasil=mysql_query("insert into multiuser values('','$nm','$user','$pass','$jabatan','$email','$phone','$alamat','$fileName','$type','$tgl')");
                 }
                 if($hasil){
                    header("location:admin/user_manager.php");
                     $statusMsg = "The user successfully added.";
                 }else{
                   header("location:admin/user_manager.php");
                     $statusMsg = "Add user failed, please try again.";
                 }
             }else{
               header("location:admin/user_manager.php");
                 $statusMsg = "Sorry, there was an error uploading your file.";
             }
         }else{
           header("location:admin/user_manager.php");
             $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
         }
     }else{
       if($pass1==$pass2){
            $pass=md5($pass1);
            $hasil=mysql_query("insert into multiuser values('','$nm','$user','$pass','$jabatan','$email','$phone','$alamat','Euclid.png','$type','$tgl')");
       }
       if($hasil){
          header("location:admin/user_manager.php");
           $statusMsg = "The user successfully added.";
        }
     }

     // Display status message
     echo $statusMsg;

}

if(isset($_POST['up'])){
     if(!empty($_FILES["foto"]["name"])){
         // Allow certain file formats
         $allowTypes = array('jpg','png','jpeg','gif','pdf');
         if(in_array($fileType, $allowTypes)){
             // Upload file to server
             if(move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFilePath)){
                 // Insert image file name into database
                 if($pass1==$pass2){
                      $pass=md5($pass1);
                      $hasil=mysql_query("update multiuser set nama_lengkap='$nm', username='$user', password='$pass', jabatan='$jabatan', email='$email', phone='$phone', alamat='$alamat', foto='$fileName', type_user='$type', nm_pimpinan='$fileName' where id_user='$id'");
                 }
                 if($hasil){
                    header("location:admin/user_manager.php");
                     $statusMsg = "The user successfully added.";
                 }else{
                     $statusMsg = "Add user failed, please try again.";
                 }
             }else{
                 $statusMsg = "Sorry, there was an error uploading your file.";
             }
         }else{
             $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
         }
     }else{
         $statusMsg = 'Please select a file to upload.';
     }

     // Display status message
     echo $statusMsg;

}

if(isset($_GET['hapus'])){
  $hapus=$_GET['hapus'];
  mysql_query("delete from multiuser where id_user='$hapus'");
  header("location:admin/user_manager.php");

}
?>
