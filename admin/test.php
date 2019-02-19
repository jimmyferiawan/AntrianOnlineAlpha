<a href="adminindex.php?halaman=tambahproduk" class="btn btn-primary">Tambah Data</a><br><br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>no</th>
            <th>nama</th>
            <th>harga</th>
            <th>berat</th>
            <th>foto</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor_prd=1 ?>
        <?php $ambil=$koneksi->query("SELECT * FROM product"); ?>
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
</table>
<br>

