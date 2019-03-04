
<?php include '../../koneksi.php'; ?>

        <!-- 
    - format diganti .php kecil semua
    - bootstrap butuh jquery agar manipulasi seperti dropdown bisa bekerja
    - berasumsi bahwa file css dan js ada di root server
 -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../framework/css/bootstrap.min.css">
    <title>User</title>
    <style>
        body{
            padding-top: 70px;
            padding-bottom: 24px;
        }

        .btn-primary {
            color: #fff;
            background-color: #36d7b7;
            border-color: #36d7b7;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #16a085;
            border-color: #16a085
        }

        .navbar-default .navbar-toggle:hover {
            border-color: #36d7b7;
            color: #36d7b7;
            background-color: white;
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="user_antrian.php">
                    Logo
                </a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#form-login" aria-expanded="false">Login</button>

            </div>
 <?php include 'proses_us/back.php'; ?>
        </div>
    </nav>
    <div class="container">
        <div class="row">
           <?php

 $sql = " SELECT ID_dk, username_dk  , id_praktek_dk  ,   no_ijin_dk  FROM dokter ";

        $hasil = $conn->query($sql);

        if(!$hasil) {
            if($conn->errno == 1062) {
                // 1062 error kode duplicate primary key
                echo "<h1>ID Pasien sudah ada sudah digunakan</h1>";
            } else {
                echo "Maaf terjadi kesalahan ". $conn->error; // fungsi debug 
           
            }
        } else {
           ?><table class="table table-bordered table-hover text-center" >
		<thead>
			<tr>
				<th>NO</th>
				<th >ID Dokter</th>
				<th>Nama Dokter</th>
				<th>Ijin Praktek</th>
				<th>No ijin Dokter</th>
				<th>Aksi</th>

			</tr>
		</thead>
		<tbody>';
		
<?php 
if ($hasil ->num_rows >=0){
		$no=1;
		while($row = $hasil->fetch_assoc()){
			?>
			<td align='right'><?php echo $no; ?></td>
			<td><?php echo $row["ID_dk"]; ?></td>
			<td align='left'><?php echo $row["username_dk"]; ?></td>
			<td><?php echo $row["id_praktek_dk"]; ?></td>
			<td><?php echo $row["no_ijin_dk"]; ?></td>
			<td><form method='post' action='proses_us/delete2.php'>
					<input type='submit' name='hapus' value='Hapus'>
					<input type='hidden' name='npm' value='<?php echo $row["ID_dk"]; ?>'>
				</form>
				
			</td></tr><?php
			;
			$no++;
		}
	}?>
	echo "</table>";
<?php // 	echo '<tr>
// 			<td>'.$row[0].'</td>
// 			<td>'.$row[1].'</td>
// 			<td>'.$row[2].'</td>
// 			<td class="right">'.$row[3].'</td>
// 			<td>
// 			<button class="btn btn-primary col-md-12" type="submit" name="pasien_submit">Hapus</button>
// 			</td>
// 		</tr>';
// }
// echo '
// 	</tbody>
// </table>';


        } 

?>        </div>
    </div>
    <script src="framework/js/jquery-3.3.1.min.js"></script>
    <script src="framework/js/bootstrap.min.js"></script>
</body>
</html>
