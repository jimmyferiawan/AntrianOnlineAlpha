<?php
    session_start();

    // tidak bisa edit jika belum login
    $disable_input = isset($_SESSION["u"]) ? "" : "disabled";

    $username = "";
    $nama_lengkap = "";
    $nik = "";
    $no_hp = "";
    $jenis_kelamin = "";
    $alamat = "";
    $bpjs ="";

    if(isset($_SESSION["u"])) {
        require_once "../../koneksi.php";
        $id = $_SESSION["u_id_pasien"];
        $kolom = "ID_pasien, username_pasien, nama_pasien, jenis_kelamin_pasien, alamat_pasien, no_hp_pasien, foto_profil_pasien, no_bpjs_pasien";
        $where = "WHERE ID_pasien = $id";
        $sql = "SELECT $kolom FROM pasien $where";
        $data = array();

        $query = $conn->query($sql);
        if($query) {
            while($row = $query->fetch_assoc()) {
                $data = $row;
                $username = $row['username_pasien'];
                $nama_lengkap = $row['nama_pasien'];
                $nik = $row['ID_pasien'];
                $no_hp = $row['no_hp_pasien'];
                $jenis_kelamin = $row['jenis_kelamin_pasien'];
                $alamat = $row['alamat_pasien'];
                $bpjs = $row['no_bpjs_pasien'];
            }
        }
    }

?>
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

        .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus {
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
                <li><a href="user_antrian.php">Ambil Antrian</a></li>
                <li  class="active"><a href="user_editbio.php">pengaturan</a></li>
                <li><a href="user/logout.php">keluar</a></li>
            </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div>   
                <div id="profile">
                    <form action="user/edit.php" method="post" enctype="multipart/form-data">
                        <div class="form-group col-lg-12">
                            <label for="user-profile">Foto</label>
                            <input type="file" name="user_profile" id="user-profile" class="form-control col-lg-4" placeholder="user1" <?= $disable_input ?>>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="user1" value="<?= $username ?>" <?= $disable_input ?> >
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="nama-lengkap">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" id="nama-lengkap" class="form-control" placeholder="test Riko Setiaji" value="<?= $nama_lengkap ?>" <?= $disable_input ?>>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="nik">NIK</label>
                            <input type="text" name="nik" id="nik" class="form-control" placeholder="3240427292424243" value="<?= $nik ?>" <?= $disable_input ?>>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="no_hp">Nomor Hp</label>
                            <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="081333203801" value="<?= $no_hp ?>" <?= $disable_input ?> >
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Jenis Kelamin</label>
                            <?php
                                $perempuan = $jenis_kelamin == "P" ? "checked" : "salah";
                                $laki2 = $jenis_kelamin == "L" ? "checked" : "salah";

                                echo '<div class="radio">
                                    <label><input type="radio" name="jenis_kelamin" value="L" '. $laki2 .'>Laki-laki</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="jenis_kelamin" value="P" '. $perempuan .' >Perempuan</label>
                                </div>';
                            ?>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" rows="1" id="alamat" <?= $disable_input ?>><?= $alamat ?></textarea>
                        </div> 
                        <div class="form-group col-xs-6">
                            <label for="password">Password Lama</label>
                            <input type="text" name="password" id="password" class="form-control" placeholder="user12345" <?= $disable_input ?>>
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="password_re">Password Baru</label>
                            <input type="text" name="password_re" id="password_re" class="form-control" placeholder="user12345" <?= $disable_input ?>>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="bpjs">Nomor BPJS</label>
                            <input type="text" name="bpjs" id="bpjs" class="form-control" placeholder="0000121316323625300" value="<?= $bpjs ?>" <?= $disable_input ?>>
                        </div>

                        <div class="col-lg-12">
                            <button class="btn btn-primary col-lg-4 <?= $disable_input ?>" type="submit" name="pasien_edit">Update</button>
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