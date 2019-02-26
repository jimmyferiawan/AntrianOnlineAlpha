<!-- 
    - format diganti .php kecil semua
    - bootstrap butuh jquery agar manipulasi seperti dropdown bisa bekerja
    - berasumsi bahwa file css dan js ada di root server
 -->
 <?php include '../koneksi.php'; ?>
 <?php session_start(); ?>
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
            </div> <?php include 'proses/back.php'; ?>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div>   
                <div id="profile">
                    <form action="proses/edit2.php" method="post">
                        <div class="form-group col-lg-6">
                            <label for="ID_ps">ID Puskesmas</label>
                            <input type="text" name="ID_ps1" value="<?php echo($_SESSION['PK_id']) ?>" id="ID_ps1" class="form-control" placeholder=" "  disabled="" >
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="Nama_ps">Nama Puskesmas</label>
                            <input type="text" name="Nama_ps" id="Nama_ps" value="<?php echo ($_SESSION['PK_NM'] ) ?>" class="form-control" placeholder="nama Puskesmas"required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="Alamat_ps">Alamat Puskesmas</label>
                            <input type="text" name="Alamat_ps" id="Alamat_ps" value="<?php echo ($_SESSION['PK_alamat'] ) ?>"  class="form-control" placeholder="Alamat Puskesmas"required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="Jambuka_ps">Jam buka</label>
                            <input type="text" name="Jambuka_ps"  value="<?php echo ($_SESSION['PK_JB'] ) ?>" id="Jambuka_ps" class="form-control" placeholder="Jam Buka"required>
                        </div>
                             <div class="form-group col-lg-6">
                            <label for="jamtutup_ps">Jam Tutup</label>
                            <input type="text" name="Jamtutup_ps"  value="<?php echo ($_SESSION['PK_JT'] ) ?>" id="jamtutup_ps" class="form-control" placeholder="jam Tutup"required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="Namapemilik_ps">Pemilik Puskesmas</label>
                            <input type="text" name="Namapemilik_ps"  value="<?php echo ($_SESSION['PK_pemilik'] ) ?>" id="Namapemilik_ps" class="form-control" placeholder="nama lengkap Pemilik Puskesmas"required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="Noop_ps">No Operator puskesmas</label>
                            <input type="text" name="Noop_ps" value="<?php echo ($_SESSION['PK_noop'] ) ?>" id="Noop_ps" class="form-control" placeholder="No Opreator"required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="Notelp_ps">no Telpon Pukesmas</label>
                            <input type="text"  value="<?php echo ($_SESSION['PK_notlp']) ?>" name="Notelp_ps" id="Notelp_ps" class="form-control" placeholder="No telon Puskesmas"required>
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="Cuti_ps">Cuti Puskesmas</label>
                            <input type="text" name="Cuti_ps"  value="<?php echo ($_SESSION['PK_cuti'] ) ?>" id="Cuti_ps" class="form-control" placeholder="Cuti puskesmas"required>
                        </div>

                        <div class="col-lg-12">
                            <button class="btn btn-primary col-lg-4" type="ubah" name="ubah">Edit Profil</button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="framework/js/jquery-3.3.1.min.js"></script>
    <script src="framework/js/bootstrap.min.js"></script>




    </script>
</body>
</html>
</body>
</html>