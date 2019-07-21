<?php session_unset(); ?>
<?php session_start(); ?>

<?php
    if(isset($_POST['admin_submit'])){
        require_once '../koneksi.php';
        // proses pengambilan data opreator 
        $uname = $conn->real_escape_string($_POST['username_op']);
        $pass = $conn->real_escape_string($_POST['password_op']);
        $kolom = "ID_op, username_op, tingkat_op ,status_op,  lokasi_op  ";
        $where = "WHERE username_op='$uname' AND password_op='$pass'";
        
        $sql = "SELECT $kolom FROM oprator $where";

        $hasil = $conn->query($sql);
        $data = array();
     
        $is_login_op = false;
        $is_login_dk = false;
       $is_login_nimda = false;
    
        // SESIION yang di pakai 
        // $_SESSION["id"]["id_op"] untuk oprator
        // $_SESSION["id"]["id_dk"] untuk dokter

        if($hasil->num_rows > 0) {
        
            
            while($row = $hasil->fetch_assoc()) {
                $data = $row;
                $sekarang=$data['status_op'];

       
                if ( $sekarang == 2  ) {
                   echo "<script>alert('Pasword / username salah !');history.go(-1);</script>";
                } else {
                 $is_login_op = true;
                }
                
           

          
        }


        }

        // jika login oprator salah maka otomatis mencob login dokter 
        elseif ($is_login_op == false) {
        $uname = $conn->real_escape_string($_POST['username_op']);
        $pass = $conn->real_escape_string($_POST['password_op']);
        $kolom = "  ID_nimda, username_nimda ,password_nimda ";
        $where = "WHERE username_nimda='$uname' AND password_nimda='$pass'";
        
        
        
      $sql = "SELECT $kolom FROM nimda $where";
        $hasil = $conn->query($sql);
        $data = array();

        if($hasil->num_rows > 0) {
          
            while($row = $hasil->fetch_assoc()) {
                $data = $row;
                  $is_login_nimda = true;
            }
        }

          
          elseif ($is_login_nimda==false) 
                 
              {
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
                  $is_login_dk  = true;
            }
        }
                 }



        }
 
       // jika login oprator benar
        if($is_login_op == true) {
         $_SESSION["id"]["id_op"] = $data['ID_op'];
                 $_SESSION["loc"]["lokasi"] =  $data['lokasi_op'];
                $loct=$data['lokasi_op'];
               ($_SESSION["id"]["id_op"]);


                 $newantri = " lokasi  ";
                 $newantri2 = "WHERE lokasi  = '$loct'";



                $sql2 = "SELECT $newantri FROM antri $newantri2";

                $hasil2 = $conn->query($sql2);
                $data2 = array();


                 if($hasil2->num_rows > 0) {
                       echo "<script>location='../op_index.php'; </script>";

               
                    }
                    else{

                       $sql3 = "INSERT INTO antri(lokasi, sekarang) values('$loct','0')";
                        $hasil3 = $conn->query($sql3);
                        echo "<script>location='../op_index.php'; </script>";

                    }

                         















               
            
            } else {}

        // jika login dokter benar 
        if ($is_login_dk == true) {
         $_SESSION["id"]["id_dk"] = $data['ID_dk'];
         echo($_SESSION["id"]["id_dk"]);
                echo "<script>location='../dok_index.php'; </script>";
                // jika semua proses salah 
            } else {        }

         if ($is_login_nimda == true) {
         $_SESSION["id"]["id_nimda"] = $data['ID_nimda'];
        
        ;        echo "<script>location='../Admin/index.php'; </script>";
                // jika semua proses salah 
            } else {
           echo "<script>alert('Pasword / username salah !');history.go(-1);</script>";
        }



    }
    
?>