<?php 
$ambil = $koneksi->query("SELECT * FROM product WHERE id_prd ='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotoproduk = $pecah ['foto_prd'];
if (file_exists("../foto_produk/$fotoproduk")) 
{
unlink("../foto_produk/$fotoproduk");
}

$koneksi->query("DELETE FROM product WHERE id_prd='$_GET[id]'");
echo "<script > alert('produk terhapus');</script>";
echo "<script > location='adminindex.php?halaman=product';</script>";

 ?>
 