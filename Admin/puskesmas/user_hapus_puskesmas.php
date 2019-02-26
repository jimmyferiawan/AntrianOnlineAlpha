
<?php include '../../koneksi.php'; ?>
<?php include '../navbar_editor.php'; ?>
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
    <div class="container">
        <div class="row">
           <?php

 $sql = " SELECT ID_pukesmas, nama_pukesmas , alamat_pukesmas , pemilik_pukesmas FROM pukesmas ";

        $hasil = $conn->query($sql);

        if(!$hasil) {
            if($conn->errno == 1062) {
                // 1062 error kode duplicate primary key
                echo "<h1>ID Puskesmas sudah ada sudah digunakan</h1>";
            } else {
                echo "Maaf terjadi kesalahan ". $conn->error; // fungsi debug 
           
            }
        } else {
            echo '<table class="table table-bordered table-hover text-center" >
		<thead>
			<tr>
				<th>NO</th>
				<th >ID Puskesmas</th>
				<th>Nama Puskesmas</th>
				<th>Alamat Puskesmas</th>
				<th>Pemilik puskesmas</th>
				<th>Aksi</th>

			</tr>
		</thead>
		<tbody>';
		

if ($hasil ->num_rows >=0){
		$no=1;
		while($row = $hasil->fetch_assoc()){
			echo "
			<td align='right'>".$no."</td>
			<td>".$row["ID_pukesmas"]."</td>
			<td align='left'>".$row["nama_pukesmas"]."</td>
			<td>".$row["alamat_pukesmas"]."</td>
			<td>".$row["pemilik_pukesmas"]."</td>
			<td><form method='post' action='proses/delete.php'>
					<input type='submit' name='hapus' value='Hapus'>
					<input type='hidden' name='npm' value='".$row["ID_pukesmas"]."'>
				</form>
				
			</td></tr>"
			;
			$no++;
		}
	}
	echo "</table>";

// 	echo '<tr>
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
        </div>
    </div>
    <script src="framework/js/jquery-3.3.1.min.js"></script>
    <script src="framework/js/bootstrap.min.js"></script>
</body>
</html>