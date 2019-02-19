<?php include 'koneksi.php'; ?>

<?php 
$ambil = $koneksi->query("SELECT * FROM  pembelian WHERE  pembelian.id_pembelian ='$_GET[id]' ");
$detail = $ambil->fetch_assoc();
$idcss=$detail['id_cs'];
 ?>

<?php 
$ambil21 = $koneksi->query("SELECT * FROM  customer WHERE id_cs ='$idcss' ");
$detailcs = $ambil21->fetch_assoc();
 ?>



<body>
	

<div class="">
<section class="konten">
	<div class="">

<?php 
$ambil1= $koneksi->query ("SELECT * FROM pembelian JOIN customer ON pembelian.id_cs=customer.id_cs WHERE pembelian.id_pembelian='$_GET[id]'");
$detail=$ambil1->fetch_assoc();
 ?>

<!-- <pre><?php print_r($detail); ?></pre> -->
<h2>Detail Pembelian  </h2>

	</div>

	


	
<br>
<div class="">


 <table class="table table-bordered">
 	<thead>
 		<tr>
 			<th>no</th>
 			<th>Nama</th>
 			<th>Harga</th>
 			<th>Jumlah</th>
 			<th>Subtotal</th>

 		</tr>
 	</thead>
 	<?php  $nomor=1 ?>
 	<tbody>
 		<tr> 
 		<?php $ambil=$koneksi -> query("SELECT * FROM pembelian_produk  WHERE id_pembelian='$_GET[id]'"); ?>
 		<?php while ($pecah=$ambil->fetch_assoc()){ ?>
 		<td><?php echo  $nomor ?></td>
 		<td><?php echo  $pecah['nama']; ?></td>
 		<td>Rp.<?php echo number_format($pecah['harga'] );  ?></td>
 		<td><?php echo number_format($pecah['jumlah_prd']) ; ?></td>
 		<td>Rp.<?php echo number_format($pecah['subharga'] ) ; ?></td>
 		</tr>
 		<?php  $nomor++ ?>
<?php } ?>
 	</tbody>
 </table>

 <h3 class="col-md-offset-9">Total:  <?php echo number_format($detail['total_pembelian']) ; ?></h3>
<div class="row">
	<div class="col-md-7"> 
		
	</div>

</div>

		<div class="col-md-3 col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                          <h3> Pembelian </h3>
                        </div>
                        <div class="panel-body">
                           Tanggal: <?php echo $detail['tanggal_pembelian']; ?><br>
								
                        </div>
                        <div class="panel-footer">
                            Ongkos Kirim : <?php echo number_format($detail['tarif']) ; ?><br>
                        </div>
                    </div>
                </div>
<!-- batas -->
<div class="col-md-3 col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                        <h3>Pelanggan</h3>
                        </div>
                        <div class="panel-body">
                          Nama : <?php echo $detailcs['username_cs']; ?><br>
 							Telp  : <?php echo $detailcs['no_telp_cs']; ?> <br>
								
                        </div>
                        <div class="panel-footer">
                         E-mail : <?php echo $detailcs['email_cs']; ?>
                        </div>
                    </div>
                </div>
                <!-- batas -->
                <div class="col-md-3 col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                        <h3>Pengiriman </h3>
                        </div>
                        <div class="panel-body">
                          Tujuan : City :<?php echo $detail['nama_kota'];?> <br> Detail alamat : <?php echo $detail['alamat_cs_to']; ?>
                        </div>
                        </div>
                        <div class="panel-footer">
                        
                    </div>
                </div>
                <div class="col-md-3">
		<h3>STATUS</h3>
	<?php switch ($detail['status']) {
				case '0':
					$status="ERORR";
					$lampu="alert alert-danger";
					
					break;
				case '1':
					$status="M e n u n g g u";
					
					$lampu="alert alert-danger";
					break;
				case '2':
					$status="D i p r o s e s";
				
					$lampu="alert alert-info ";
					break;
				case '3':
					$status="D i k i r i m";
					
					$lampu="alert alert-warning ";
					break;
				case '4':

					$status="T e r k i r i m";
				
					$lampu="alert alert-success ";
					break;
				default:
					$status="Belum Di Proses";
					break;
			} ?>
<div class="<?php echo $lampu ?>">STATUS : <?php echo $status; ?>

		</div>
		
	</div>

</div>
</div>

	</div>

</section>


</body>
<br><br><br><br><br>
<footer>
<?php include 'submenu/foot.php'; ?>
</footer>
</html>















