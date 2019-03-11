
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
    <!-- Bootstrap DataTables CSS -->
<!-- Jquery -->
<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<!-- Jquery DataTables -->
<script type="text/javascript" language="javascript" src="http:////cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap dataTables Javascript -->
<script type="text/javascript" language="javascript" src="http://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.js"></script>
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

 $sql = " SELECT    id_tempat ,foto1,foto2,foto3,foto4,foto5 FROM foto_lokasi ";

        $hasil = $conn->query($sql);

        if(!$hasil) {
            if($conn->errno == 1062) {
                // 1062 error kode duplicate primary key
                echo "<h1>ID Pasien sudah ada sudah digunakan</h1>";
            } else {
                echo "Maaf terjadi kesalahan ". $conn->error; // fungsi debug 
           
            }
        } else {
             ?><table class="table table-hover text-center  table-striped table-bordered table-paginate" cellspacing="0" width="100%" >
		<thead>
			<tr>
				<th>NO</th>
				<th >ID Puskesmas</th>
				<th>Foto 1</th>
				<th>Foto 2</th>
				<th>Foto 3</th>
                <th>Foto 4</th>
				<th>Foto 5</th>
                <th>Update </th>

			</tr>
		</thead>
		<tbody>
<?php  
if ($hasil ->num_rows >=0){
		$no=1;
		while($row = $hasil->fetch_assoc()){
			?>
			<td align='right'><?php echo $no  ;?></td>
			<td><?php echo $row["id_tempat"];?></td>
			<td align='left'>
                 <img src="../../img-tempat/<?php echo $row["foto1"]; ?>" class="img-responsive img-thumbnail col-sm-3 col-lg-3" alt="">
                 <input class="col-md btn-sm" type="file" name="file" id="user-profile" class="form-control col-lg-4" placeholder="user1" >
                 </td>
			     <td> 
                 <img src="../../img-tempat/<?php echo $row["foto2"]; ?>" class="img-responsive img-thumbnail col-sm-3 col-lg-3" alt="">
                <br>
                <input class="col-sm btn-sm" type="file" name="file" id="user-profile" class="form-control col-lg-4" placeholder="user1"></td>
            <td> <img src="../../img-tempat/<?php echo $row["foto3"]; ?>" class="img-responsive img-thumbnail col-sm-3 col-lg-3" alt="">
                <br> 
                <input class="col-md btn-sm"  type="file" name="file" id="user-profile" class="form-control col-lg-4" placeholder="user1" ></td>
			<td> <img src="../../img-tempat/<?php echo $row["foto4"]; ?>" class="img-responsive img-thumbnail col-sm-3 col-lg-3" alt="">
                <br>file
                 <input class="col-md btn-sm"  type="file" name="file" id="user-profile" class="form-control col-lg-4" placeholder="user1"></td>
			<td> 
                <img src="../../img-tempat/<?php echo $row["foto5"]; ?>" class="img-responsive img-thumbnail col-sm-3 col-lg-3" alt="">
                <br>
             <input class="col-md btn-sm"  type="file" name="file" id="user-profile" class="form-control col-lg-4" placeholder="user1" >
            <td>     
                <form method='post' action='proses_us/tambah_tempatps.php' enctype="multipart/form-data">
                    <input class="btn-danger form-control" type='submit' name='hapus' value='Update'>
                    <input type='hidden' name='npm' value='<?php echo $row["id_tempat"] ?>'>
                </form>
                  </td>

             
				
			</td></tr><?php
			;
			$no++;
		}
	}?>
 </table>;
<?php  

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
<!-- Panggil Fungsi -->
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
 $('.table-paginate').dataTable();
 } );
</script>
</body>
</html>
      