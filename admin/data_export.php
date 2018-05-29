<table border="1">
	<tr>
		<th>NO.</th>
		<th>NO SPK</th>
		<th>NO PROPOSAL</th>
		<th>SURAT JALAN</th>
		<th>TANGGAL SPK TERBIT</th>
		<th>TANGGAL SPK BERAKHIR</th>
		<th>JANGKA WAKTU</th>
		<th>ASAL</th>
		<th>TUJUAN</th>
		<th>JUMLAH RIT</th>
		<th>REALISASI RIT</th>
		<th>HARGA RIT</th>
		<th>NILAI RIT</th>
		<th>BIAYA</th>
		<th>LABA RUGI</th>
		<th>PM</th>
	</tr>
	<?php
	//koneksi ke database
	mysql_connect("localhost", "root", "usbw");
	mysql_select_db("db_logistik");
	
	//query menampilkan data
	$sql = mysql_query("SELECT * FROM spk ORDER BY id ASC");
	$no = 1;
	while($data = mysql_fetch_assoc($sql)){
		echo '
		<tr>
			<td>'.$no.'</td>
			<td>'.$data['no_spk'].'</td>
			<td>'.$data['no_proposal'].'</td>
			<td>'.$data['surlan'].'</td>
			<td>'.$data['tgl_spk_terbit'].'</td>
			<td>'.$data['tgl_spk_berakhir'].'</td>
			<td>'.$data['jangka_waktu'].'</td>
			<td>'.$data['asal'].'</td>
			<td>'.$data['tujuan'].'</td>
			<td>'.$data['jumlah_rit'].'</td>
			<td>'.$data['realisasi_rit'].'</td>
			<td>'.$data['harga_rit'].'</td>
			<td>'.$data['nilai_spk'].'</td>
			<td>'.$data['biaya'].'</td>
			<td>'.$data['laba_rugi'].'</td>
			<td>'.$data['pm'].'</td>
		</tr>
		';
		$no++;
	}
	?>
</table>