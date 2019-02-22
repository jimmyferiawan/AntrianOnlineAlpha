<?php
if( empty( $_SESSION['uid'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

if(isset($_REQUEST['submit'])){

    $uid = $_REQUEST['uid'];

    if($uid == 1){
        header("location: ./admin.php?hlm=user");
        die();
    }

    $sql = mysqli_query($conn, "DELETE FROM user WHERE uid='$uid'");
    if($sql == true){
        header("Location: ./admin.php?hlm=user");
        die();
    }
    }
}
?>
