<?php session_start(); ?>
<?php
    if(isset($_POST['admin_submit'])){
        require_once '../koneksi.php';
        // proses pengambilan data opreator 
        $uname = $conn->real_escape_string($_POST['username_op']);
        $pass = $conn->real_escape_string($_POST['password_op']);
        $kolom = "ID_op, username_op, tingkat_op ";
        $where = "WHERE username_op='$uname' AND password_op='$pass'";
        
        $sql = "SELECT $kolom FROM oprator $where";

        $hasil = $conn->query($sql);
        $data = array();

        $is_login_op = false;
        $is_login_dk = false;

        // SESIION yang di pakai 
        // $_SESSION["id"]["id_op"] untuk oprator
        // $_SESSION["id"]["id_dk"] untuk dokter

        if($hasil->num_rows > 0) {
            $is_login_op = true;
            while($row = $hasil->fetch_assoc()) {
                $data = $row;
            }
        }

        // jika login oprator salah maka otomatis mencob login dokter 
        else  {
        
        $uname = $conn->real_escape_string($_POST['username_op']);
        $pass = $conn->real_escape_string($_POST['password_op']);
        $kolom = "ID_dk, username_dk ,pasword_dk ";
        $where = "WHERE username_dk='$uname' AND pasword_dk='$pass'";
        
        $sql = "SELECT $kolom FROM dokter $where";

        $hasil = $conn->query($sql);
        $data = array();

        if($hasil->num_rows > 0) {
          
            while($row = $hasil->fetch_assoc()) {
                $data = $row;
                  $is_login_dk = true;
            }
        }
        }

        // jika login oprator benar
        if($is_login_op == true) {
         $_SESSION["id"]["id_op"] = $data['ID_op'];

                echo($_SESSION["id"]["id_op"]);
                echo "<script>location='../OP_index.php'; </script>";
            
            } else {
       
        }

        // jika login dokter benar 
        if ($is_login_dk == true) {
         $_SESSION["id"]["id_dk"] = $data['ID_dk'];
         echo($_SESSION["id"]["id_dk"]);
                echo "<script>location='../dok_index.php'; </script>";
                // jika semua proses salah 
            } else {
           echo "<script>alert('Pasword / username salah !');history.go(-1);</script>";
        }




    }
    
?>