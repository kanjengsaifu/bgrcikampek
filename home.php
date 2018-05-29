<?php
include "admin/config.php";
session_start();
if(!isset($_SESSION['username'])){
     echo '<script>window.location.assign("index.php")</script>';
}
?>
<h4> hai <i><?php echo $_SESSION['nama_lengkap'] ?></i>. Selamat datang pada menu <i><?php echo $type=$_SESSION['type_user'] ?></i></h4>
<ol>
     <li>Home</li>
     <li>Download</li>
     <li>Article</li>
     <?php
     if($type=='editor'){
     ?>
     <li>Editor</li>
     <li>Visual</li>
     <li>Design</li>
     <?php
     }
     if($type=='admin'){
     ?>
     <li>Analis</li>
     <li>Controller</li>
     <li>Manajemen</li>
     <?php
     }
     ?>
     <li>About</li>
     <li><a href="logout.php">Logout</a></li>
</ol>