<!-- 
    - format diganti .php kecil semua
    - bootstrap butuh jquery agar manipulasi seperti dropdown bisa bekerja
    - berasumsi bahwa file css dan js ada di root server
 -->
<!DOCTYPE html>
<?php session_start() ?>

<?php if (!isset( $_SESSION["id"]["id_dk"])) 
 {
echo "<script> alret('LOGIN FIRST');</script>";
echo "<script> location='login_AD.php';</script>";
header('location:login_AD.php');
exit();
 } ?>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="framework/css/bootstrap.min.css">
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
                <a class="navbar-brand" href="">
                        LOGO
                </a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navheader-collapse" aria-expanded="false">
                    <span class="glyphicon glyphicon-menu-hamburger"></span>
                </button>

            </div>
            <div class="collapse navbar-collapse navheader-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="operator/logout.php">keluar</a></li>
            </ul>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-4" style="margin-top: 80px;">
            <div class="container-fluid">
            <img src="image/2.png" class="img-responsive col-xs-12 col-lg-10 col-lg-offset-2">
            </div>
        </div>
        <div class="col-xs-12 col-lg-8">
    <div class="container-fluid">
    <form class="form-horizontal" action="">
    <h1 class="text-center"><b>Data Pasien</h1>
    <hr>
    <div class="form-group col-lg-12">
        <label for="username">No Antrian</label>
        <input type="text" name="username" id="username" class="form-control" placeholder="17">
    </div>
    <div class="form-group col-lg-12">
        <label for="username">Nama Lengkap</label>
        <input type="text" name="username" id="username" class="form-control" placeholder="Riko Setiaji">
    </div>
    <div class="form-group col-lg-12">
        <label for="alamat">Alamat</label>
        <textarea class="form-control" name="alamat" rows="3" id="alamat">Desa Krangrejo Kec Boyolangu Tulungagung Jawa Timur</textarea>
    </div> 
    <div class="form-group col-lg-12">
        <label for="username">Jenis Kelamin</label>
        <input type="text" name="username" id="username" class="form-control" placeholder="Laki - Laki">
    </div>
    <div class="form-group col-lg-12">
        <label for="username">No KIS/BPJS</label>
        <input type="text" name="username" id="username" class="form-control" placeholder="32525325350000">
    </div>
    <div class="form-group col-lg-12">
        <label for="alamat">Keluhan</label>
        <textarea class="form-control" name="alamat" rows="5" id="alamat"></textarea>
    </div>
    <div class="form-group col-lg-12">
          <button class="btn btn-primary col-lg-12" type="submit" name="pasien_submit">Selesai</button>
    </div>
</form>
</div>
        </div>
    </div>
    <script src="framework/js/jquery-3.3.1.min.js"></script>
    <script src="framework/js/bootstrap.min.js"></script>
</body>
</html>