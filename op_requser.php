<!-- 
    - format diganti .php kecil semua
    - bootstrap butuh jquery agar manipulasi seperti dropdown bisa bekerja
    - berasumsi bahwa file css dan js ada di root server
 -->
 <?php session_start(); ?>
<?php include 'navbar.php'; ?>
<?php if (!isset( $_SESSION["id"]["id_op"])) 
 {
echo "<script> alret('LOGIN FIRST');</script>";
echo "<script> location='login_AD.php';</script>";
header('location:login_AD.php');
exit();
 } ?>
<!DOCTYPE html>

<html lang="id">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="framework/css/bootstrap.min.css">
    <title>Operator Antri Sehat</title>
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

        .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, 
    .navbar-default .navbar-nav>.active>a:hover {            
            background-color: transparent;
            color: #36d7b7;          
    }

    .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, 
    .navbar-default .navbar-nav>.open>a:hover {
            background-color: transparent;
            color: grey;
    }

    .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, 
    .navbar-default .navbar-nav>.open>a:hover {
            background-color: transparent;
    }

    .navbar-default .navbar-nav>.open>a:hover {
            border: none;
    }

    .navbar-default .navbar-nav>li>a:hover:not(#dropnot) {
        background-color: #36d7b7;
        color: white;
    }
    </style>
</head>
<body>
<?php
include "koneksi.php";

  if(isset($_REQUEST['daftar'])){
	  $oid = $_REQUEST['nik'];
	  $user = $_REQUEST['username'];
	  $nama = $_REQUEST['nama_lengkap'];
	  $alamat = $_REQUEST['alamat'];
	  $no_hp = $_REQUEST['no_hp'];
	  $jk = $_REQUEST['jenis_kelamin'];
	  $pass = $_REQUEST['password'];
	  $lokasi = $_REQUEST['lokasi'];
	  $sql = mysqli_query($conn, "INSERT INTO oprator VALUES('$oid','$user','$pass','2','$nama','$no_hp','$jk','$alamat','$lokasi','2')");
	  echo "<script>location='op_index.php';</script>";
  }
?>
<!-- <nav class="navbar navbar-default navbar-fixed-top" style="margin-bottom: 0px; ">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="">
                    LOGO
                </a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navheader-collapse" aria-expanded="false">
                    <span class="glyphicon glyphicon-menu-hamburger"></span>
                </button>

            </div>
            <div class="collapse navbar-collapse navheader-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="op_index.php">Info Antrian</a></li>
				<li  class="active"><a href="">request operator baru</a></li>
                <li><a href="op_editbio.php">pengaturan</a></li>               
                <li><a href="operator/logout.php">keluar</a></li>
            </ul>
            </div>
        </div>
    </nav>   -->

    <div class="container">
        <div class="row">
            <div>   
                <div id="profile">
                    <form id="regist" action="op_requser.php" method="post">
                                      
                             <div class="form-group col-lg-6">
                            <label for="username">Username</label>
                            <input type="text" name="username" onchange="<?php include 'operator/chek.php'; ?>" id="username" class="form-control" placeholder="username" required> 

                        </div>
                        <div class="form-group col-lg-6">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="nama lengkap">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="nik">NIK</label>
                            <input type="text" name="nik" id="nik" class="form-control" placeholder="nik" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="no_hp">Nomor Hp</label>
                            <input type="text" name="no_hp" id="no_hp" class="form-control">
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <div class="radio">
                                <label><input type="radio" name="jenis_kelamin" value="L" checked>Laki-laki</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" value="P" name="jenis_kelamin">Perempuan</label>
                            </div>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" rows="1" id="alamat"></textarea>
                        </div> 
                        <div class="form-group col-xs-6">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="password" required>
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="password_re">Konfirmasi Password</label>
                            <input type="password" name="password_re" id="password_re" class="form-control" placeholder="ketik ulang password" required>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="lokasi">Tempat Bertugas</label>
                            <input type="text" name="lokasi" id="lokasi" class="form-control">
                        </div>

                        <div class="col-lg-12">
                            <button class="btn btn-primary col-lg-4" type="submit" name="daftar">Daftar</button>
                            <button class="btn btn-danger col-lg-4" style="float: right;" type="reset">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="framework/js/jquery-3.3.1.min.js"></script>
    <script src="framework/js/bootstrap.min.js"></script>
</body>
<script type="text/javascript">
	$(document).ready(function() {
		$('#regist').submit(function() {
			var pass = $('#password').val();							
			var pass_re = $('#password_re').val();			
			if (pass != pass_re) {		
				alert('Password yang anda masukkan tidak sama !!');
				return false;
			}
			else{
				alert('Data berhasil disimpan');
				
			}
		});
	});
</script>
</html>