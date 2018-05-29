<?php 
include 'config.php';
$cu=$_POST['cus'];
$id_det_dn=$_POST['id'];
$no_dn=$_POST['no_dn'];
$tanggal=$_POST['tanggal'];
$uraian=$_POST['uraian'];
$no_bukti=$_POST['no_bukti'];
$realisasi=$_POST['realisasi'];
$droping=$_POST['droping'];

if($_POST['submit']=='Simpan'){
	$sql1 = mysql_query("SELECT * FROM realisasi_kuo where no_bukti_kuo='$no_bukti'");
	if(mysql_num_rows($sql1) != 0){
		while($row1 = mysql_fetch_assoc($sql1)){
		$surat_jalan=$row1['surat_jalan'];
		}
	}

	switch ($droping) {
		case 0 :
			$sql2 = mysql_query("SELECT saldo FROM realisasi_dn where no_dn='$no_dn' ORDER BY id DESC LIMIT 1");
			if(mysql_num_rows($sql2) != 0){
				while($row2 = mysql_fetch_assoc($sql2)){
					$droping=0;
					$saldo=$row2['saldo']-$realisasi;
				}
			}else{

			}
			break;
	}
	switch ($realisasi) {
		case 0 :
			$sql2 = mysql_query("SELECT saldo FROM realisasi_dn where no_dn='$no_dn' ORDER BY id DESC LIMIT 1");
			if(mysql_num_rows($sql2) != 0){
				while($row2 = mysql_fetch_assoc($sql2)){
					$realisasi=0;
					$saldo=$row2['saldo']+$droping;
				}
			}else{
				$realisasi=0;
				$saldo=$droping;
			}
			break;
	}

	mysql_query("insert into realisasi_dn values('','$no_dn','$tanggal','$uraian','$no_bukti','$surat_jalan','$realisasi','$droping','$saldo')");
	header("location:detail_dn.php?cus=$cu&no_dn=$no_dn");
}

if($_POST['submit']=='Update'){
	$sql1 = mysql_query("SELECT * FROM realisasi_kuo where no_bukti_kuo='$no_bukti'");
	if(mysql_num_rows($sql1) != 0){
		while($row1 = mysql_fetch_assoc($sql1)){
		$surat_jalan=$row1['surat_jalan'];
		}
	}

	switch ($droping) {
		case 0 :
			$sql2 = mysql_query("SELECT saldo FROM realisasi_dn where no_dn='$no_dn' ORDER BY id DESC LIMIT 1");
			if(mysql_num_rows($sql2) != 0){
				while($row2 = mysql_fetch_assoc($sql2)){
					$droping=0;
					$saldo=$row2['saldo']-$realisasi;
				}
			}else{

			}
			break;
	}
	switch ($realisasi) {
		case 0 :
			$sql2 = mysql_query("SELECT saldo FROM realisasi_dn where no_dn='$no_dn' ORDER BY id DESC LIMIT 1");
			if(mysql_num_rows($sql2) != 0){
				while($row2 = mysql_fetch_assoc($sql2)){
					$realisasi=0;
					$saldo=$row2['saldo']+$droping;
				}
			}else{
				$realisasi=0;
				$saldo=$droping;
			}
			break;
	}

	mysql_query("update realisasi_dn set no_dn='$no_dn', tanggal='$tanggal', uraian='$uraian', surat_jalan='$surat_jalan',realisasi='$realisasi',droping='$droping',saldo='$saldo' where id='$id_det_dn'");
	header("location:detail_dn.php?cus=$cu&no_dn=$no_dn");
}
?>