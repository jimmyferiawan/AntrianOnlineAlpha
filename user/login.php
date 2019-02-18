<?php
    if(isset($_POST['pasien_submit'])){
        require_once '../koneksi.php';

        $uname = $conn->real_escape_string($_POST['username_pasien']);
        $pass = $conn->real_escape_string($_POST['password_pasien']);

        $kolom = "ID_pasien, username_pasien, nama_pasien, jenis_kelamin_pasien, alamat_pasien, no_hp_pasien, foto_profil_pasien, no_bpjs_pasien";
        $where = "WHERE username_pasien='$uname' AND password_pasien='$pass'";
        $sql = "SELECT $kolom FROM pasien $where";

        $hasil = $conn->query($sql);
        $data = array();
        $is_login = false;

        if($hasil->num_rows > 0) {
            $is_login = true;
            while($row = $hasil->fetch_assoc()) {
                $data = $row;
            }
        }
        if($is_login == true) {
            echo "id(NIK): ". $data['ID_pasien'] ."<br>";
            echo "username: ". $data['username_pasien'] ."<br>";
            echo "nama: ". $data['nama_pasien'] ."<br>";
            echo "jenis kelamin: ". $data['jenis_kelamin_pasien'] ."<br>";
            echo "alamat: ". $data['alamat_pasien'] ."<br>";
            echo "no telepon: ". $data['no_hp_pasien'] ."<br>";
            echo "no bpjs: ". $data['no_bpjs_pasien'] ."<br>"; 
        } else {
            echo "<h1>username atau password salah</h1>";
        }

    }
    
?>