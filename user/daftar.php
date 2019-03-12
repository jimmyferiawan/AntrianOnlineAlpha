<?php
    if(isset($_POST['pasien_submit'])) {
        require_once '../koneksi.php';
            

        $status='2';
        $uname = $conn->real_escape_string($_POST['username']);
        $nama = $conn->real_escape_string($_POST['nama_lengkap']);
        $nik = $conn->real_escape_string($_POST['nik']);
        $no_hp = $conn->real_escape_string($_POST['no_hp']);
        $jenis_kelamin = $conn->real_escape_string($_POST['jenis_kelamin']);
        $alamat = $conn->real_escape_string($_POST['alamat']);
        $pass = $conn->real_escape_string($_POST['password']);
        $bpjs = $conn->real_escape_string($_POST['bpjs']);

        $sql = "INSERT INTO pasien (ID_pasien, username_pasien, password_pasien, nama_pasien, jenis_kelamin_pasien, alamat_pasien, no_hp_pasien, no_bpjs_pasien, status_pasien ) VALUES ('$nik', '$uname', '$pass', '$nama', '$jenis_kelamin', '$alamat', '$no_hp', '$bpjs','$status')";

        $hasil = $conn->query($sql);

        if(!$hasil) {
            if($conn->errno == 1062) {
                // 1062 error kode duplicate primary key
                echo "<h1>NIK sudah digunakan</h1>";
            } else {
                echo "Maaf terjadi kesalahan ";//. $conn->error; // fungsi debug
            }
        } else {
            echo "<script>
                alert('berhasil klik ok untuk menuju halaman login');
                window.location.replace('/AntrianOnlineAlpha/login.php');
            </script>";
        }
        
        $conn->close();
        
    }
?>