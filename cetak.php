<?php
	session_start();
	$tempat_antri = "Tempat Antri";
	$nomor_antri = 0;
	$jam_antri = 0;
	$instansi = array(
		'A' => 'pukesmas',
		'B' => 'klinik',
		'C' => 'rumahsakit',
		'D' => 'dokter'
	);
	if(isset($_GET['instansi']) && isset($_GET['no'])) {
		require_once "koneksi.php";
		$instansi_kode = $_GET['instansi'];
		$nama_instansi = $instansi[$instansi_kode[0]];
		// $sql = "SELECT nama_$nama_instansi FROM $nama_instansi WHERE ID_$nama_instansi='$instansi_kode'";
		$sql = "SELECT $nama_instansi.nama_$nama_instansi, temp.jam_ambil_antrian FROM $nama_instansi JOIN temp ON $nama_instansi.ID_$nama_instansi=temp.lokasi WHERE $nama_instansi.ID_$nama_instansi='$instansi_kode'";
		// echo $sql;
		$hasil = $conn->query($sql);
		if($hasil->num_rows > 0) {
			while($row = $hasil->fetch_assoc()) {
				$kolom = 'nama_'.$nama_instansi;
				$tempat_antri = $row[$kolom];
				$jam_antri = $row['jam_ambil_antrian'];
			}
		}
		
		$nomor_antri = $_SESSION['print_no_antrian'];
	}	
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		@media print {
			body {
				width: 21cm;
				height: 29.7cm;
				/*margin: 30mm 45mm 30mm 45mm;*/
			}
			/*.title{
				text-align: center;
				color: blue;
			}
			.body .instansi{
				text-align: center;
				color: blue;
			}
			.body .nomor{
				text-align: center;
				font-size: 20mm;
				color: blue;
			}*/
			.brand {
				display: inline-block;
			}
			.logo {
				width: 30mm;
			}
		}
		.brand {
			display: inline-block;
		}
		.logo {
			width: 65px;
			margin-left: 5px;
			margin-top: 5px;
		}
		.title {
			display: inline-block;
			margin-left: 10px;
		}
		h4 {
			font-family: arial;
			display: block;
			letter-spacing: 5px;
		}
		.container {
			width: 200px;
			border: 1px solid black;
		}
	</style>
</head>
<body>
	<!-- <div class="title">
		ANTRI SEHAT
	</div>
	<div class="body">
		<div class="instansi">
			<?= $tempat_antri ?>
		</div>
		<div class="nomor">
			<?= $nomor_antri ?>
		</div>
		<div class="jam">
			<?= $jam_antri ?>
		</div>
	</div> -->
	<div class="container">
	<div class="brand">
		<img src="img/logo.png" class="logo">
	</div>
	<div class="title">
		<h4 style="margin-top: 0; margin-bottom: 0; letter-spacing: 9px;">SISTEM</h4>
		<h4 style="margin-top: 5px; margin-bottom: 0;">ANTRIAN</h4>
		<h4 style="margin-top: 5px; margin-bottom: 0; letter-spacing: 8px;">ONLINE</h4>
	</div>
	<div class="nomer_antri" style="display: block;">
		<h1 style="font-size: 150px; margin-top: -10px; margin-bottom: 0; text-align: center;"><?= $nomor_antri ?></h1>
	</div>
	<div class="footer" style="display: block;">
		<h4 style="text-align: center; margin-top: -10px; letter-spacing: 2px;"><?= $tempat_antri ?></h4>
	</div>
	</div>
</body>