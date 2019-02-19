	<div class=""> 
<h2> New Customer</h2>
<form method="post" enctype="multipart/form-data">
<div class="form-group"> 
<label>nama</label>
<input type="text" class="form-control" name="nama" required>
</div>
<div class="form-group">
	<label>password</label><input class="form-control" type="password" name="password" required>
</div>
<div class="form-group">
	<label>email</label><input class="form-control" type="email" name="email" required>
</div>
<div class="form-group">
	<label>Telp</label><input class="form-control" type="number" name="telp" required>
</div>
<div class="form-group">
	<label>foto (png.file)</label>
	<input type="file" class="form-control-lg" name="foto">
</div>
<label>Alamat</label>
<textarea class="form-control" name="Alamat" rows="10" required></textarea>
<br>
<a href="adminindex.php?halaman=customer" class="btn btn-default">back </a>
<button class="btn btn-primary" name="cssave">simpan</button>
<?php  $ambil1=$koneksi->query("SELECT * FROM customer");
	$number=$ambil1->num_rows; ?>



</form>
</div>
<?php 
if(isset($_POST['cssave'])) 
{
	$kode=1;
$nama = $_FILES['foto']['name'];
$lokasi =$_FILES['foto']['tmp_name'];
move_uploaded_file($lokasi, "../foto_cs/".$nama);
$koneksi->query("INSERT INTO customer (username_cs,password_cs,email_cs,kode_akses_cs,no_telp_cs , 	alamat_cs ,foto_cs) VALUES('$_POST[nama]','$_POST[password]','$_POST[email]','$kode
	','$_POST[telp]','$_POST[Alamat]','$nama')");

echo "<div class='alret alret-info'>Data tersimpan  customer </div>";
echo "<meta http-equiv='refresh' content='1;url=adminindex.php?halaman=home'>" ;

}


?>	