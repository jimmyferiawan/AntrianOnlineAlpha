<?php 
$ambil1=$koneksi->query("SELECT * FROM pembelian WHERE id_pembelian ='$_GET[id]'");
$detail=$ambil1->fetch_assoc();
$new=$detail['status']+1;
echo "<br>";
if ($new==5) {
	$koneksi->query("DELETE FROM pembelian WHERE id_pembelian='$_GET[id] '");
	$koneksi->query("DELETE FROM pembelian_produk WHERE id_pembelian='$_GET[id] '");
echo "<script > alert('Telah DI Hapus');</script>";
 echo "<script > location='adminindex.php?halaman=buy';</script>";
}else{

 $koneksi->query("UPDATE pembelian SET status='$new'
 	 				WHERE id_pembelian ='$_GET[id]'");
 echo "<script > alert('Telah DI Update Status');</script>";
 echo "<script > location='adminindex.php?halaman=buy';</script>";
}

 ?>