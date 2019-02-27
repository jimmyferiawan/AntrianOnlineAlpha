<?php
    if(isset($_POST['pasien_login'])){
        require_once '../koneksi.php';

        $uname = $conn->real_escape_string($_POST['username_pasien']);
        $pass = $conn->real_escape_string($_POST['password_pasien']);
        
        // query mysql
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
        $conn->close();
        
        if($is_login == true) {
            session_start();
            $_SESSION['u'] = 'pasien';
            $_SESSION['u_id_pasien'] = $data['ID_pasien'];
            $_SESSION['u_username'] = $data['username_pasien']; 
            $_SESSION['u_nama'] = $data['nama_pasien'];
            header("Location: /AntrianOnlineAlpha/user_antrian.php");

        } else {
            echo "<script>alert('Password / Username  salah  !!');history.go(-1);</script>";


    }
    
?>