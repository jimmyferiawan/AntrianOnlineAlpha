
	<div class=""> 
<h2> New Admin</h2>
<form method="post" enctype="multipart/form-data">
<div class="form-group"> 
<label>nama</label>
<input type="text" class="form-control" name="nama" required>
</div>
<div class="form-group">
	<label>password</label><input class="form-control" type="password" name="password" required>
</div>
<div class="form-group">
	<label>nama lengkap</label><input class="form-control" type="text" name="namalengkap" required>
</div>

<br><a href="adminindex.php?halaman=customer" class="btn btn-default">back </a>
<button class="btn btn-primary" name="adminsave">simpan</button>
</form>
</div>
<?php 
if(isset($_POST['adminsave'])) 
{
	$kode=1;
$koneksi->query("INSERT INTO admin (username,password,nama_lengkap,kode_akses) VALUES('$_POST[nama]','$_POST[password]','$_POST[namalengkap]','$kode
	')");

echo "<div class='alret alret-info'>Data tersimpan </div>";
echo "<meta http-equiv='refresh' content='1;url=adminindex.php?halaman=home'>" ;

}


?>	

	
