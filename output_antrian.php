<?php
    
    session_start();
    // ini_set('display_errors', 1);
    // error_reporting(E_ALL);
    require_once "koneksi.php";

    // mengembalikan total nomor antrian dari suatu instansi
    function cek_antrian($conn, $id_instansi) {
        $tempat = [
            'A' => "pukesmas",                
            'B' => "klinik",
            'C' => "rumahsakit",
            'D' => "dokterumum"
        ];
        $jenis_tempat = $tempat[$id_instansi[0]];
        $kolom_nama_instansi = "nama_".$jenis_tempat;
        // contoh query sql yang diharapkan untuk mendapatkan nama instansi dan total antrian
        // SELECT antri.total,rumahsakit.nama_rumahsakit as lokasi FROM antri inner JOIN rumahsakit ON antri.lokasi=rumahsakit.ID_rumahsakit
        $sql = "SELECT antri.sekarang as sekarang, antri.total as total,$jenis_tempat.$kolom_nama_instansi as nama_lokasi FROM antri inner JOIN $jenis_tempat ON antri.lokasi=$jenis_tempat.ID_$jenis_tempat WHERE lokasi='$id_instansi'";
        $query = $conn->query($sql);
        $antrian = "";
        if($query) {
            while($row = $query->fetch_assoc()) {
                $antrian = $row;
            }
        }

        return $antrian;
    }
    
    if(!isset($_SESSION['u'])) {
        header('Location: login.php');
    }

    if(isset($_SESSION['u_antrian_nomor']) && isset($_SESSION['u_antrian_pin']) && isset($_SESSION['u_antrian_lokasi'])) {
        
        $lokasi = $_SESSION['u_antrian_lokasi'];
        // todo jangan ambil antrian user dari user
        $no_antrian = $_SESSION['u_antrian_nomor'];
        $pin = $_SESSION['u_antrian_pin'];
        $status_temp = "";
        $sql = "SELECT status_temp FROM temp WHERE pin_temp='$pin'";
        $hasil = $conn->query($sql);
        if($hasil) {
            while($row = $hasil->fetch_assoc()) {
                $status_temp = $row['status_temp'];
            }
        }
       
        if($status_temp == 0) {
            unset($_SESSION['u_antrian_nomor']);
            unset($_SESSION['u_antrian_pin']);
            unset($_SESSION['u_antrian_lokasi']);
            header('Location: /AntrianOnlineAlpha/user_antrian.php');
            exit;
        }
        $antrian = cek_antrian($conn, $lokasi);
        $sekarang = $antrian['sekarang'];
        $nama_instansi = $antrian['nama_lokasi'];
        $total = $antrian['total'];
        $conn->close();
    }

    if(isset($_POST['id_tempat']) && isset($_POST['id_instansi']) && !isset($_SESSION['u_antrian_nomor'])) {
        
        function generate_pin() {
            $angka1 = (rand(1, 1000000) );
            $angka2 = (rand(1, 1000000));
            $length = 2;
            $randomBytes = openssl_random_pseudo_bytes($length);
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            $charactersLength = strlen($characters);
            $result = '';
            for ($i = 0; $i < $length; $i++)
            $result .= ($characters[ord($randomBytes[$i]) % $charactersLength]);
        
            $h1= ( $angka1);
            $h2= ( $result);
            $h3= ( $angka2 );
        
            return $h1.$h2.$h3;
        }

        // menmbahka jumlah antrian
        function update_total_antrian($conn, $id_instansi, $total_baru) {

            $sql = "UPDATE antri SET total=$total_baru WHERE lokasi='$id_instansi'";
            $query = $conn->query($sql);
            if($query) {
                return true;
            } else {
                return false;
            }
        }
        
        $id_tempat = $conn->real_escape_string($_POST['id_tempat']);
        $id_instansi = $conn->real_escape_string($_POST['id_instansi']);
        $id_user_temp = $_SESSION['u_id_pasien'];
        $antrian = cek_antrian($conn, $id_instansi);
        $nama_instansi = $antrian['nama_lokasi'];
        $no_antrian = (int)$antrian['total'] + 1;
        $jam_ambil_antrian = date("H:i:s");
        $tgl = date("d/m/Y");
        $pin = generate_pin();
        $sql_cek = "SELECT id_user_temp FROM temp WHERE id_user_temp='$id_user_temp'";
        $query_cek = $conn->query($sql_cek);
        if($query_cek->num_rows > 0) { // jika sudah pernah antri maka hanya update saja
            $sql = "UPDATE temp SET no_antrian='$no_antrian', jam_ambil_antrian='$jam_ambil_antrian', lokasi='$id_instansi', tgl='$tgl', pin_temp='$pin', status_temp=2 WHERE id_user_temp='$id_user_temp'";
            $query_update = $conn->query($sql);
            if($query_update) {
                $hasil = update_total_antrian($conn, $id_instansi, $no_antrian);
                $_SESSION['u_antrian_nomor'] = $no_antrian;
                $_SESSION['u_antrian_lokasi'] = $id_instansi;
                $_SESSION['u_antrian_pin'] = $pin;
            }
            
        } else {
            $sql = "INSERT INTO temp (id_user_temp, no_antrian, jam_ambil_antrian, lokasi, tgl, pin_temp, status_temp) VALUES ('$id_user_temp', '$no_antrian', '$jam_ambil_antrian', '$id_instansi', '$tgl', '$pin', 2)";
            $query = $conn->query($sql);
            if($query) {
                // echo "berhasil";
                $hasil = update_total_antrian($conn, $id_instansi, $no_antrian);
                if(!$hasil) {
                    $pin = "Gagal menghasilkan pin silahkan ulangi kembali";
                } else if($conn->error) {
                    $pin = $conn->error;
                }else {
                    // var_dump($hasil);
                    $_SESSION['u_antrian_nomor'] = $no_antrian;
                    $_SESSION['u_antrian_lokasi'] = $id_instansi;
                    $_SESSION['u_antrian_pin'] = $pin;
                }
                
            }
        }
        
        $antrian = cek_antrian($conn, $id_instansi);
        $sekarang = $antrian['sekarang'];
        $total = $antrian['total'];
        // echo "sekarang: $sekarang<br>";
        // echo "total: $total";
        $conn->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="framework/css/bootstrap.min.css">
      <title>Nomer Antri </title>
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
                     <img src="img/logoas.png" alt="" width="auto" height="30px">
                </a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navheader-collapse" aria-expanded="false">
                    <span class="glyphicon glyphicon-menu-hamburger"></span>
                </button>

            </div>
            <div class="collapse navbar-collapse navheader-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="disabled"><a href="">Ambil Antrian</a></li>
                <li><a href="user_editbio.php">pengaturan</a></li>
                <li><a href="user/logout.php">keluar</a></li>
            </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row" style="padding-top: 0px;">
            <div class="col-sm-12 col-lg-4 col-lg-offset-4">
                <div class="panel">
                    <div class="panel-body "  ">
                        <h2><?= $sekarang ?> / <?= $total ?></h2>
                        <h4>anda telah berhasil mengantri,<br>tunjukkan ini ke tempat anda berobat</h4>
                            <i class="glyphicon glyphicon-map-marker text-center col-xs-12 col-lg-12" style="margin-bottom: 5px;"></i>
                            <span><h5><i>di <u><?= $nama_instansi ?></u></i></h5></span>
                        <h5>No antrian anda : <?= $no_antrian ?></h5>
                        
                        <div class="row">
                            <div id="qrcode" class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2"></div>
                        </div>
                        <h5>tidak bisa scan ? Coba masukkan kode secara manual</h5>
                        <p>
                        <h4 style="background-color: #36d7b7;" id="pin-antrian">
                            <?php
                                $pin_antrian = isset($pin) ? $pin : "";
                                echo $pin_antrian;
                            ?>
                        </h4>
                        <p>
                    </div>
                </div>
            </div>  
        </div>
    </div>

    <script src="framework/js/jquery-3.3.1.min.js"></script>
    <script src="framework/js/bootstrap.min.js"></script>
    <script src="framework/js/qrcode.min.js"></script>
    <script>
        var qrText = document.getElementById('pin-antrian').innerText.trim();
            
        var qrcode = new QRCode(document.getElementById('qrcode'), {
            text: qrText,
            width: 256,
            height: 256,
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H,
            idImage: "my-qr",
            imageWidth: "100%"
        });
    </script>
</body>
</html>