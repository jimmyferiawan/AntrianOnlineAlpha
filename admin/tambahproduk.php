<h2> tambah produk</h2>
<form method="post" enctype="multipart/form-data">
<div class="form-group"> 
<label>nama</label>
<input type="text" class="form-control" name="nama">
</div>
<div class="form-group">
	<label>harga</label><input class="form-control" type="number" name="harga">
</div>
<div class="form-group">
	<label>berat</label><input class="form-control" type="text" name="berat">
</div>

<div class="form-group">
	<div class="form-group">
		<label>class</label><br>
		<label>min input = 1 <br> max input = 7</label><br>
	<input class="form-control" type="number" name="class" max="7" min="1" value="7" >
</div>
<div class="form-group">
	<div class="form-group">
	
</div>

<div class="form-group">




<div class="form-group">
	<label>Foto (Tidak lebih dari 10Mb)</label>
	<input type="file" class="form-control-lg" name="foto">
</div>
<textarea  class="form-control" name="deskripsi" rows="2" ></textarea>
<br>
<button class="btn btn-primary" name="save">simpan</button>
<?php  $ambil1=$koneksi->query("SELECT * FROM product");
	$number=$ambil1->num_rows; ?>



</form>

<?php 
if(isset($_POST['save'])) 
{
$nama = $_FILES['foto']['name'];
$lokasi =$_FILES['foto']['tmp_name'];
move_uploaded_file($lokasi, "../foto_produk/".$nama);
$koneksi->query("INSERT INTO product (nama_prd,harga_prd,berat_prd,foto_prd,deskripsi_prd,class) VALUES('$_POST[nama]','$_POST[harga])','$_POST[berat]','$nama','$_POST[deskripsi]','$_POST[class]')");

echo "<div class='alret alret-info'>Data tersimpan </div>";
echo "<meta http-equiv='refresh' content='1;url=adminindex.php?halaman=tambahproduk'>" ;

}


?>