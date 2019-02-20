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

    .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover {
            color: #36d7b7;
        }

        .navbar-default .navbar-nav li>a:hover {
            color: #36d7b7;
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
                <li><a href="op_index.php">Info Antrian</a></li>
                <li class="active"><a href="op_editbio.php">pengaturan</a></li>
                <li><a href="op_requser.php">request operator baru</a></li>
                <li><a href="operator/logout.php">keluar</a></li>
            </ul>
            </div>
        </div>
    </nav>  

    <div class="container">
        <div class="row">
            <div>   
                <div id="profile">
                    <form action="user/user-daftar.php" method="post">
                        <div class="form-group col-lg-12">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="user1">
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="user12345">
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="password_re">Konfirmasi Password</label>
                            <input type="password" name="password_re" id="password_re" class="form-control" placeholder="user12345">
                        </div>

                        <div class="col-lg-12">
                            <button class="btn btn-primary col-lg-4" type="submit" name="pasien_submit">Update</button>
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
</html>