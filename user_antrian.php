<?php 
    session_start();
    $is_login = isset($_SESSION['u']) ? true : false;
    $btn_antri_disabled = $is_login ? "" : "disabled";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="framework/css/bootstrap.min.css">
    <title>Document</title>
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
        }

        .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover {
            color: #36d7b7;
        }

        .navbar-default .navbar-nav li>a:hover {
            color: #36d7b7;
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
                <li class="active"><a href="">Ambil Antrian</a></li>
                <li class="<?= $btn_antri_disabled ?>"><a href="user_editbio.php" >pengaturan</a></li>
                <li class="<?= $btn_antri_disabled ?>"><a href="user/logout.php" >keluar</a></li>
            </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h5 class="panel-title">Pilih Tempat Berobat</h5>
                    </div>
                    <div class="panel-body">
                        
                        <select name="jenis-tempat" id="jenis-tempat" class="form-control">
                            <option selected disabled>Jenis tempat</option>
                            <option value="1">Rumah Sakit</option>
                            <option value="2">Puskesmas</option>
                            <option value="3">Klinik</option>
                            <option value="4">Dokter Umum</option>
                        </select>
                        <br>
                        <select name="daftar-nama" id="daftar-nama" class="form-control">
                            <option selected disabled>Nama Tempat</option>
                            <option value="1">RS a</option>
                            <option value="2">RS b</option>
                            <option value="3">RS c</option>
                            <option value="4">RS d</option>
                        </select>

                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d32656920.102451846!2d117.88880000000002!3d-2.357836599999986!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de681b4659a3d67%3A0xf9c1001731bf6113!2sPuskesmas+Martapura!5e0!3m2!1sen!2sid!4v1546747816789" width="325" height="350" frameborder="0" style="border:0; margin-top: 10px;" allowfullscreen class="img-responsive col-xs-12 col-md-12 col-lg-12"></iframe>                        
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-8">
                <div class="panel panel-success text-center">
                    <div class="panel-heading">
                        <h5 class="panel-title">Nomor antrian sekarang</h5>
                    </div>
                    <div class="panel-body">
                        <h1 style="font-weight: 30px; font-size: 200px; padding-top: 0px; margin-top: 0px; text-shadow: 1px 1px 5px; ">17</h1>
                        <a href="output_antrian.php"><button class="btn btn-primary <?= $btn_antri_disabled ?>">Ambil Antrian</button></a>
                        <button type="button" class="btn btn-default btn-md">
                        <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="framework/js/jquery-3.3.1.min.js"></script>
    <script src="framework/js/bootstrap.min.js"></script>
</body>
</html>