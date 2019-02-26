
<!DOCTYPE html>
<?php  session_start(); 
include "../../koneksi.php";?>

<html>

<head>
	<title></title>
</head>
<body>

   <?php

    if(isset($_POST["ubah"])) {

 $ps_id= ($_SESSION['PK_id']);
 $ps_nama= ($_POST['Nama_ps']);
 $ps_alamat=($_POST['Alamat_ps']);
 $ps_jb=($_POST['Jambuka_ps']);
 $ps_jt= ($_POST['Jamtutup_ps']);
 $ps_pemilik=($_POST['Namapemilik_ps']);
 $ps_noop= ($_POST['Noop_ps']);
 $ps_notelp= ($_POST['Notelp_ps']);
 $ps_cuti= ($_POST['Cuti_ps']);



        // verifikasi password

        $kolom = "ID_pukesmas, nama_pukesmas, alamat_pukesmas, jambuka_pukesmas, jamtutup_pukesmas, pemilik_pukesmas, no_op_pukesmas,no_telp_pukesmas,cuti_pukesmas";
        $where = "WHERE ID_pukesmas ='$ps_id' ";
        $sql = "UPDATE pukesmas SET ID_pukesmas='$ps_id', nama_pukesmas='$ps_nama', alamat_pukesmas='$ps_alamat', jambuka_pukesmas='$ps_jb', jamtutup_pukesmas='$ps_jt', pemilik_pukesmas='$ps_pemilik', no_op_pukesmas='$ps_noop', no_telp_pukesmas='$ps_notelp' , cuti_pukesmas='$ps_cuti' $where";
        // echo $sql. "<br>";
        $query = $conn->query($sql);
        $isSuksesUpdate = false;
        if($query) {
            if($conn->affected_rows > 0) {
                // echo "berhasil update data";
            

  echo "<script>alert('Data Terupdate !!');history.go(-1);</script>";
	echo "<script> location='../user_editbio_puskesmas.php';</script>";

            }
        } else {
            echo 'Error: '. $conn->error ."<br>";
            $isSuksesUpdate = false;
        }

    }
?>



</body>
</html>