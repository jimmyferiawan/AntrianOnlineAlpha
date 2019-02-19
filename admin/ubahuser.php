<h2>Ubah User </h2>
<br>
<?php 

if (!empty($_GET['id'])) {
	?>
<?php 
	# code...

$ambil=$koneksi->query("SELECT * FROM customer WHERE id_cs ='$_GET[id]'"); 
$pecah=$ambil->fetch_assoc();

?>
<form  method="post" enctype="multipart/from-data">

	<div class="from-group">
		<img class="img-responsive" src="../foto_cs/<?php echo $pecah ['foto_cs'] ?>" width="200px" height="200px" >
</div>


	<div class="from-group">
		<label>Nama </label>
			<input type="text" name="username" class="form-control" value="<?php echo $pecah['username_cs'] ?>">
</div>
	
<div class="from-group">
		<label>Password</label>
			<input type="text" name="password" class="form-control" value="<?php echo
			 $pecah['password_cs'] ?>">
</div>
<div class="from-group">
		<label>E-mail</label>
			<input type="email" name="email" class="form-control" value="<?php echo$pecah['email_cs'] ?>">
</div>
<div class="from-group">
		<label>telp</label>
			<input type="number" name="telp" class="form-control" value="<?php echo$pecah['no_telp_cs'] ?>">
</div>

<div class="from-group">
		<label>Alamat</label>
			<textarea name="alamat" rows="10" class="form-control"> <?php echo $pecah['alamat_cs']; ?></textarea>
	
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

	move_uploaded_file($lokasi, "../foto_cs/".$nama);
echo"<script > alret($nama);</script>";

	 	$koneksi->query("UPDATE customer SET username_cs='$_POST[username]',password_cs='$_POST[password]'
	 		,email_cs='$_POST[email]',no_telp_cs='$_POST[telp]',alamat_cs='$_POST[alamat]'
	 		WHERE id_cs='$_GET[id]'");
		
	}
	else  {
	$nama = $_FILES['foto']['name'];
	$lokasi =$_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../foto_produk/".$nama);
echo"<script > alret($nama);</script>";
	 	$koneksi->query("UPDATE customer SET username_cs='$_POST[username]',password_cs='$_POST[password]'
	 		,email_cs='$_POST[email]',no_telp_cs='$_POST[telp]',alamat_cs='$_POST[alamat]'
	 		WHERE id_cs='$_GET[id]'");
	}
	echo"<script > alret('Data produk telah di ubah');</script>";
	echo "
<script > location ='adminindex.php?halaman=customer';</script>";
}
} else{
	?>
<?php 
	# code...

$ambil=$koneksi->query("SELECT * FROM admin WHERE id_admin ='$_GET[id2]'"); 
$pecah=$ambil->fetch_assoc();

?>
<form  method="post" enctype="multipart/from-data">

	<div class="from-group">
		<label>Nama Admin</label>
			<input type="text" name="username" class="form-control" value="<?php echo $pecah['username'] ?>">
</div>
	
<div class="from-group">
		<label>Password</label>
			<input type="text" name="password" class="form-control" value="<?php echo
			 $pecah['password'] ?>">
</div>
<div class="from-group">
		<label>Nama Lengkap</label>
			<input type="text" name="email" class="form-control" value="<?php echo$pecah['nama_lengkap'] ?>">
</div>
<br>
	<button class="btn btn-primary" name="ubah">Ubah</button> 
</form>
<?php 
if (isset($_POST['ubah'])) 
{
	



	 	$koneksi->query("UPDATE admin SET username='$_POST[username]',password='$_POST[password]'
	 		,nama_lengkap='$_POST[email]'
	 		WHERE id_admin='$_GET[id2]'");
		
	
	echo"<script > alret('Data admin telah di ubah');</script>";
	echo "
<script > location ='adminindex.php?halaman=customer';</script>";
}
}
?>
