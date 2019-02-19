<h2>Ubah produk </h2>
<br>
<?php 

$ambil=$koneksi->query("SELECT * FROM product WHERE id_prd ='$_GET[id]'"); 
$pecah=$ambil->fetch_assoc();
?>
<form  method="post" enctype="multipart/from-data">

	<div class="from-group">
		<img class="img-responsive" src="../foto_produk/<?php echo $pecah ['foto_prd'] ?>" >
</div>

	<div class="from-group">
		<label>Nama Prduk</label>
			<input type="text" name="namaproduk" class="form-control" value="<?php echo $pecah['nama_prd'] ?>">
</div>
	
<div class="from-group">
		<label>Harga Produk</label>
			<input type="number" name="harga" class="form-control" value="<?php echo $pecah['harga_prd'] ?>">
</div>
<div class="from-group">
		<label>Berat</label>
			<input type="number" name="berat" class="form-control" value="<?php echo$pecah['berat_prd'] ?>">
</div>

<div class="from-group">
		<label>Deskripsi</label>
			<textarea name="deskripsi" rows="10" class="form-control"> <?php echo $pecah['deskripsi_prd']; ?></textarea>
	
</div><br>
	<button class="btn btn-primary" name="ubah">Ubah</button> 
</form>
<?php 
if (isset($_POST['ubah'])) 
{
	$nama = $_FILES['foto']['name'];
	$lokasi =$_FILES['foto']['tmp_name'];
	// jika foto Dirubah
echo"<script > alret($nama);</script>";

	if (!empty($lokasifoto))
	 {

	move_uploaded_file($lokasi, "../foto_produk/".$nama);
echo"<script > alret($nama);</script>";

	 	$koneksi->query("UPDATE product SET nama_prd='$_POST[namaproduk]',harga_prd='$_POST[harga]'
	 		,berat_prd='$_POST[berat]',deskripsi_prd='$_POST[deskripsi]'
	 		WHERE id_prd='$_GET[id]'");
		
	}
	else  {
	$nama = $_FILES['foto']['name'];
	$lokasi =$_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../foto_produk/".$nama);
echo"<script > alret($nama);</script>";
	 	$koneksi->query("UPDATE product SET nama_prd='$_POST[namaproduk]',harga_prd='$_POST[harga]'
	 		,berat_prd='$_POST[berat]',deskripsi_prd='$_POST[deskripsi]'
	 		WHERE id_prd='$_GET[id]'");
	}
	echo"<script > alret('Data produk telah di ubayh');</script>";
	echo "
<script > location ='adminindex.php?halaman=product';</script>";
} 
?>
