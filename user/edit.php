<?php

    if(isset($_POST["username"])) {
        require_once '../koneksi.php';

        $ID_pasien = $conn->real_escape_string($_POST['nik']);
        $username = $conn->real_escape_string($_POST['username']);
        $nama = $conn->real_escape_string($_POST['nama_lengkap']);
        $no_hp = $conn->real_escape_string($_POST['no_hp']);
        $jenis_kelamin = $conn->real_escape_string($_POST['jenis_kelamin']);
        $alamat = $conn->real_escape_string($_POST['alamat']);
        $pwd = $conn->real_escape_string($_POST['password']);
        $pwd_new = $conn->real_escape_string(trim($_POST['password_re']));
        $bpjs = $conn->real_escape_string($_POST['bpjs']);

        $pwd_verif = $pwd_new == "" ? "":",password_pasien='$pwd_new'";
        // verifikasi password

        $where = "WHERE ID_pasien='$ID_pasien' AND password_pasien='$pwd'";
        $sql = "UPDATE pasien SET username_pasien='$username', nama_pasien='$nama', no_hp_pasien='$no_hp', jenis_kelamin_pasien='$jenis_kelamin', alamat_pasien='$alamat', no_bpjs_pasien='$bpjs'$pwd_verif $where";
        
        $query = $conn->query($sql);
        $isSuksesUpdate = false;
        if($query) {
            $isSuksesUpdate = true;
            if($conn->affected_rows > 0) {
                // echo "berhasil update data";
                $isSuksesUpdate = true;
            } else {
                // echo 'Error: password salah';
                $isSuksesUpdate = false;
            }
        } else {
            // echo 'Error: '. $conn->error ."<br>";
            $isSuksesUpdate = false;
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        if($isSuksesUpdate==false) {
            echo '<span>Gagal update data! Kembali di halaman <a href="/AntrianOnlineAlpha/user_editbio.php">pengaturan antrian</a></span></body></html>';

            exit;
        }
    ?>
    <span>Berhasil update data! Menuju halaman <a href="../user_antrian.php">antrian</a> dalam <label id="countdown"></label></span>
    <script>
        var detik = 5;
        function countdown() {
            detik = detik - 1;

            if (detik <= 0) {
                window.location = '/AntrianOnlineAlpha/user_antrian.php'
            } else {
                document.getElementById('countdown').innerHTML = detik;
                setTimeout("countdown()", 1000);
            }
        }
        countdown();
    </script>
</body>
</html>