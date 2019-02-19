<?php include '../koneksi.php';
session_start();
 ?>
<?php 
$idsementara;
if (empty($idsementara)) {
	$idsementara= $_GET['id'];
$koneksi->query("DELETE FROM customer WHERE id_cs='$idsementara '");
// echo "<script > alert('$idsementara');</script>";
echo "<script > location='adminindex.php?halaman=customer';</script>";
}else{
	$idsementara2= $_GET['id2'];
	$koneksi->query("DELETE FROM admin WHERE id_admin='$idsementara2 '");
echo "<script > location='adminindex.php?halaman=customer';</script>";
	
}
 ?>