<html>
<head>
<title>Data Mahasiswa</title>
<style type="text/css">
.baris1{background-color:white;}
.baris2{background-color:lime;}
.top{background-color:yellow;
font-size:14pt;}
table{text-align:center;}
body{
	font-family: sans-serif;
	font-size: 14pt;
}

</style>
</head>
<body>
<?php
	include "koneksi.php";
	
	
	$sql = "select * from tbmhs order by NPM desc";
	$result = $conn->query($sql);
	$count = mysqli_num_rows($result);
	echo "<h1>DATA MAHASISWA</h1>";
	echo "Jumlah Data : $count";
	echo "<table border='1'>
		<tr class='top'>
			<td width='40px'>No</td>
			<td width='60px'>NPM</td>
			<td width='200px'>NAMA</td>
			<td width='200px'>ALAMAT</td>
			<td width='60px'>ACTION</td>
		</tr>
	
	";
	
	if ($result ->num_rows >0){
		$no=1;
		$wb=1;
		while($row = $result->fetch_assoc()){
			echo "<tr class='baris$wb'>
			<td align='right'>".$no."</td>
			<td>".$row["NPM"]."</td>
			<td align='left'>".$row["NAMA"]."</td>
			<td>".$row["ALAMAT"]."</td>
			<td><form method='post' action='delete.php'>
					<input type='submit' name='hapus' value='Hapus'>
					<input type='hidden' name='npm' value='$row[NPM]'>
				</form>
				<form method='post' action='update.php'>
					<input type='submit' name='update' value='Update'>
					<input type='hidden' name='npm' value='$row[NPM]'>
					<input type='hidden' name='nama' value='$row[NAMA]'>
					<input type='hidden' name='alamat' value='$row[ALAMAT]'>
				</form>
			</td></tr>"
			;
			$no++;
			if($wb==1)
				$wb=2;
			else
				$wb=1;
		}
	}
	echo "</table>";
?>
</body>
</html>