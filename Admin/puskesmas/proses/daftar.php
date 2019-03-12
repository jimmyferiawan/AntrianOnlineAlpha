<?php
    if(isset($_POST['pasien_submit'])) {
        require_once '../../koneksi.php';
$num1='0';

$ambil=$conn->query("SELECT * FROM pukesmas  ");
      WHILE ($unit1 =$ambil->fetch_assoc()){ 

    $num1++; }
    $oid =$num1 ;
    $hasilid ='A' .('00'. $oid);

        $name_ps = $conn->real_escape_string($_POST['Nama_ps']);
        $alm_ps = $conn->real_escape_string($_POST['Alamat_ps']);
        $jb_ps = $conn->real_escape_string($_POST['Jambuka_ps']);
        $jt_ps = $conn->real_escape_string($_POST['Jamtutup_ps']);
        $nmp_ps = $conn->real_escape_string($_POST['Namapemilik_ps']);
        $noop_ps = $conn->real_escape_string($_POST['Noop_ps']);
        $notpl_ps = $conn->real_escape_string($_POST['Notelp_ps']);
        $cuti_ps = $conn->real_escape_string($_POST['Cuti_ps']);
        



        $sql = "INSERT INTO pukesmas (ID_pukesmas, nama_pukesmas , alamat_pukesmas , jambuka_pukesmas, jamtutup_pukesmas, pemilik_pukesmas ,no_op_pukesmas , no_telp_pukesmas ,cuti_pukesmas) VALUES ('$hasilid', ' $name_ps', ' $alm_ps ', '$jb_ps', '$jt_ps', '$nmp_ps',' $noop_ps',' $notpl_ps','$cuti_ps')";

        $hasil = $conn->query($sql);

        if(!$hasil) {
            if($conn->errno == 1062) {
                // 1062 error kode duplicate primary key
                echo "<h1>ID Puskesmas sudah ada sudah digunakan</h1>";
            } else {
                echo "Maaf terjadi kesalahan ". $conn->error; // fungsi debug 
           
            }
        } else {
            echo "<script>
                alert('berhasil Input Data');
                window.location.replace('../user_regist_puskesmas.php');
            </script>";
        }
        
        $conn->close();
        
    }
?>