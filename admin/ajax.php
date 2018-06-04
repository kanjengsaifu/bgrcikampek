<?php
error_reporting(0);
include 'config.php';
if(isset($_GET['Area_chart'])){

	if($_GET['Area_chart'] == 1)	{
		$return_arr = array();
		$fetch = mysql_query("SELECT * FROM realisasi");
		while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
			list($dd,$mm,$yy) = explode('/',$row['tgl_realisasi']);
			$row_array['day'] = $yy.'-'.$mm.'-'.$dd;
			$row_array['a'] = $row['total_biaya'];
			$row_array['b'] = $row['pendapatan'];
			$row_array['c'] = $row['laba'];
			array_push($return_arr,$row_array);
		}
		echo json_encode($return_arr);
	}

	if($_GET['Area_chart'] == 2)	{
		$return_arr = array();
		$fetch = mysql_query("SELECT * FROM data_nota");
		while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
			list($dd,$mm,$yy) = explode('/',$row['tgl_dn']);
			$row_array['day'] = $yy.'-'.$mm.'-'.$dd;
			$row_array['a'] = $row['nilai'];
			$row_array['b'] = $row['biaya'];
			$row_array['c'] = $row['laba_rugi'];
			array_push($return_arr,$row_array);
		}
		echo json_encode($return_arr);
	}

	if($_GET['Area_chart'] == 3)	{
		$return_arr = array();
		$fetch = mysql_query("SELECT * FROM droping_kuo");
		while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
			list($dd,$mm,$yy) = explode('/',$row['tgl_droping']);
			$row_array['day'] = $yy.'-'.$mm.'-'.$dd;
			$row_array['a'] = $row['jumlah'];
			$row_array['b'] = $row['realisasi_kuo'];
			$row_array['c'] = $row['sisa'];
			array_push($return_arr,$row_array);
		}
		echo json_encode($return_arr);
	}
}

?>
