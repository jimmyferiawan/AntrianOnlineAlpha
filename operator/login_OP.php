<?php
    if(isset($_POST['pasien_submit'])){
        require_once '../koneksi.php';

        $uname = $conn->real_escape_string($_POST['username_pasien']);
        $pass = $conn->real_escape_string($_POST['password_pasien']);

        $kolom = "ID_op, username_op, tingkat_op ";
        $where = "WHERE username_op='$uname' AND password_op='$pass'";
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
            echo "ID_OP: ". $data['ID_op'] ."<br>";
            echo "username: ". $data['username_op'] ."<br>";
            echo "tingkat : ". $data['Tingkat_op'] ."<br>";  
            if($data)_
            } else {
            echo "<h1>username atau password salah</h1>";
        }

    }
    
?>