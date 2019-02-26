<!DOCTYPE html>
<?php  session_start(); 
include "../../koneksi.php";
?>
<html>
<head>
    <title></title>
</head>
<body>

<?php  
$npm=$_POST['npm'];
$sql = 'SELECT * from pukesmas where ID_pukesmas="'.$npm.'"';
$Edit = $conn->query($sql);

 if($Edit->num_rows > 0) {
           
            while($row = $Edit->fetch_assoc()) {
                $data = $row;





            }
        }



echo $_SESSION['PK_id'] = $data['ID_pukesmas'];
echo $_SESSION['PK_NM'] = $data['nama_pukesmas'];
echo $_SESSION['PK_alamat'] = $data['alamat_pukesmas'];
echo $_SESSION['PK_JB'] = $data['jambuka_pukesmas'];
echo $_SESSION['PK_JT'] = $data['jamtutup_pukesmas'];
echo $_SESSION['PK_pemilik'] = $data['pemilik_pukesmas'];
echo $_SESSION['PK_noop'] = $data['no_op_pukesmas'];
echo $_SESSION['PK_notlp'] = $data['no_telp_pukesmas'];
echo $_SESSION['PK_cuti'] = $data['cuti_pukesmas'];
echo $_SESSION['PK_name1'] = $data['nama_pukesmas'];
 header("Location: ../user_edit_bio_fix.php");

?>


</body>
</html>