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
            border-radius: 0px;
        }

        .btn-danger {
            border-radius: 0px;
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

        .form-control {
            border-radius: 0;
            border: none;
            border-bottom: 2px solid #beebd6;
            box-shadow: none;
        }

        .form-control:focus {
            box-shadow: none;
            border: none;
            border-bottom: 2px solid #36d7b7;
        }

        .navbar-default {
            background-color: white;
        }

        input[type=text] {
            color: #7f8c8d;
        }
        
        input[type=radio] {
            background-color: #36d7b7;
        }

        .commentform {
            font-weight: lighter;
            padding-top: 7px;
            position: absolute;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="login.php">
                    Logo
                </a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#form-login" aria-expanded="false">Login</button>
            </div>
        </div>
    </nav>
    <div class="container" style="width: 85%;">
        <div class="row">
            <div>   
                <div id="profile">
                    <form action="/AntrianOnlineAlpha/user/daftar.php" method="post">
                        <div class="form-group col-lg-6">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" id="nama-lengkap" class="form-control">
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                            <label for="password_re">Konfirmasi Password</label>
                            <input type="password" name="password_re" id="password_re" class="form-control">
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                            <label>Jenis Kelamin</label>
                            <div class="radio">
                                <label><input type="radio" name="jenis_kelamin" value="L" checked>Laki-laki</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="jenis_kelamin" value="P">Perempuan</label>
                            </div>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" rows="4" id="alamat"></textarea>
                        </div> 
                        <div class="form-group col-lg-6">
                            <label for="nik">NIK</label>
                            <input type="text" name="nik" id="nik" class="form-control">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="no_hp">Nomor Hp</label>
                            <input type="text" name="no_hp" id="no_hp" class="form-control">
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="bpjs">Nomor BPJS</label>
                            <input type="text" name="bpjs" id="bpjs" class="form-control">
                        </div>

                        <div class="col-lg-12">
                            <button class="btn btn-primary col-lg-3" type="submit" name="pasien_submit">Daftar</button>
                            <button class="btn btn-danger col-lg-3" style="float: right;" type="reset">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="framework/js/jquery-3.3.1.min.js"></script>
    <script src="framework/js/bootstrap.min.js"></script>
</body>
</html>