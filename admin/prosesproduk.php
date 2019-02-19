
<div class="panel-body text-center">
		<div class="table-responsive">
	<?php
	$kode=7; 
	$item=0;
	$noob=1; ?>
	<?php  while ( $kode >= $noob) {
	
	
	?>
	<?php echo "Senjata Class  $noob" ?>


<table class="table table-bordered table-hover">

<thead>
<tr>
			<th class="text-center" >no</th>
			<th class="text-center">nama</th>
			<th class="text-center">harga</th>
			<th class="text-center">berat</th>
			<th class="text-center">foto</th>
			<th class="text-center">aksi</th>
		</tr>
                                    </thead>
                                    <tbody>
                                       <?php $nomor_prd=1 ?>
		<?php $ambil=$koneksi->query("SELECT * FROM product where class=$noob;"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){  ?>
		<tr>
			<td><?php echo $pecah['id_prd']; ?></td>
			<td><?php echo $pecah['nama_prd'] ; ?></td>
			<td><?php echo $pecah['harga_prd']; ?></td>
			<td><?php echo $pecah['berat_prd']; ?></td>
			<td><img src="../foto_produk/<?php echo $pecah['foto_prd']; ?>" width="100"></td>
			<td>
				<a href="adminindex.php?halaman=hapusproduk&id=<?php echo $pecah['id_prd'] ?>" class=" btn-danger btn">hapus</a>
				<a href="adminindex.php?halaman=ubahproduk&id=<?php echo $pecah['id_prd'] ?>" class=" btn btn-warning "  >ubah</a>


			</td>


		</tr>
		<?php $nomor_prd++ ?>
<?php } ?>
                                    </tbody>
        
        <?php $noob++ ?>                        </table>
               
<?php  } ?>



                        </div>
                    </div>
                     
                    <!-- End  Hover Rows  -->
           
