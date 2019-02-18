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
            background-color: white;
        }

        .row h2 {
            margin-top: 0px;
            padding-top: 0px;
            font-weight: bold;
            margin-bottom: 0px;
        }

        .row h4 {
            margin-top: 0px;
        }

        .row h5 {
            padding-top: 20px;
        }
        .row h2, h4, h5 {
            text-align: center;
            padding: 2px;
        }

        .row hr {
            margin-top: 15px;
            margin-bottom: 20px;
            border: 0;
            border-top: 3px solid #36d7b7;
            width: 10%;
            }

        
    </style>
</head>
<body>

    <nav class="navbar navbar-default navbar-fixed-top" style="margin-bottom: 0px; ">
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
                <li class="disabled"><a href="">Ambil Antrian</a></li>
                <li><a href="user_editbio.php">pengaturan</a></li>
                <li><a href="login.php">keluar</a></li>
            </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row" style="padding-top: 0px;">
            <div class="col-sm-12 col-lg-4 col-lg-offset-4">
                <div class="panel">
                    <div class="panel-body">
                        <h2>17 / 30</h2>
                            <h4>anda telah berhasil mengantri,<br>tunjukkan ini ke tempat anda berobat</h4>
                                <i class="glyphicon glyphicon-map-marker text-center col-xs-12 col-lg-12" style="margin-bottom: 5px;"></i>
                                <span><h5><i>di <u>Puskesmas Bakti Husada</u></i></h5></span>
                        <hr>
                            <img src="https://chart.googleapis.com/chart?chl=wolf.inc&chs=300x300&cht=qr&chld=H%7C0" class="img-responsive col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 20px;">
                        <h5>tidak bisa scan ? Coba masukkan kode secara manual</h5>
                        <p>
                        <h4 style="background-color: #36d7b7;">AER5 TYU8 IJH0 NMY7</h4>
                        <p>
                    </div>
                </div>
            </div>  
        </div>
    </div>

    <script src="framework/js/jquery-3.3.1.min.js"></script>
    <script src="framework/js/bootstrap.min.js"></script>
</body>
</html>