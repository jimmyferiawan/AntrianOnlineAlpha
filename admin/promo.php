 <div class="row">
                <div class="col-md-12 col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Customer Service
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">Customer</a>
                                </li>
                                
                               
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="home">
                                    <h4></h4>
                                   
<form method="post">
<div> <button  class="btn btn-primary "  name="Customer" >Daftar New Customer </button>
<?php if ($_SESSION['admin']['kode_akses']==2): ?>
    <button class="btn btn-primary" name="admin" >Daftar New Admin </button></div>
<?php endif ?>


</form>
<?php if (isset($_POST['Customer'])): ?>
echo "<script > location='adminindex.php?halaman=savecs';</script>";
<?php endif ?>

<!-- ADMIN  -->

<?php if (isset($_POST['admin'])): ?>
    echo "<script > location='adminindex.php?halaman=saveadmin';</script>";
<?php endif ?>
    
<br>    <div class="form-group">
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>E-Mail</th>
            <th>Telepone</th>
            <th>aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php $ambil=$koneksi->query("SELECT * FROM customer"); ?>
        <?php while($pecah=$ambil->fetch_assoc()){; ?>
        <tr>
            <?php $_SESSION['idcs']['id']=$pecah['id_cs']; ?>
            <th><?php echo $pecah['id_cs']; ?></th>
            <th><?php echo $pecah['username_cs']; ?></th>
            <th><?php echo $pecah['email_cs']; ?></th>
            <th><?php echo $pecah['no_telp_cs']; ?></th>
            <th>
                <a href="hapususer.php?id=<?php echo $pecah['id_cs'] ?>" class="btn btn-danger" >Hapus</a>
                <a href="adminindex.php?halaman=ubahuser&id=<?php echo $pecah['id_cs'] ?>" class=" btn btn-warning "  >ubah</a>

            </th>
        </tr>
        
        <?php } ?>
    </tbody>
    <br>
    <?php if ($_SESSION['admin']['kode_akses']==2): ?>
        <h3>Customer</h3>
        <table class="table table-bordered">
    <thead>
        <h3>admin</h3>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>E-Mail</th>
            <th>aksi</th>
        
        </tr>
    </thead>
    <tfoot>
        
        <?php $ambil=$koneksi->query("SELECT * FROM admin Where kode_akses=1"); ?>
        <?php while($pecah=$ambil->fetch_assoc()){; ?>
        <tr>
            <?php $_SESSION['idadmin']['id']=$pecah['id_admin']; ?>
            <th><?php echo $pecah['id_admin']; ?></th>
            <th><?php echo $pecah['username']; ?></th>
            <th><?php echo $pecah['nama_lengkap']; ?></th>
            <th>
                <a href="hapususer.php?id2=<?php echo $pecah['id_admin'] ?>" class="btn btn-danger" >Hapus</a>
                <a href="adminindex.php?halaman=ubahuser&id2=<?php echo $pecah['id_admin'] ?>" class=" btn btn-warning "  >ubah</a>

            </th>
        </tr>
        
        <?php } ?>
    </tfoot>
    </table> 
<?php endif ?>
</table> 


</div>

                           
                            </div>
                        </div>
                    </div>
                </div>
                <!-- batass -->
              
                    <div class="panel panel-default" id="#massage">
                        <div class="panel-heading">
                           Massage E-mail
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">Customer</a>
                                </li>
                                
                               
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="home">
                                    <h4></h4>
                                   
<form method="post">
<div> <button  class="btn btn-primary "  name="Customer" >Daftar New Customer </button>
<?php if ($_SESSION['admin']['kode_akses']==2): ?>
    <button class="btn btn-primary" name="admin" >Daftar New Admin </button></div>
<?php endif ?>


</form>
<?php if (isset($_POST['Customer'])): ?>
echo "<script > location='adminindex.php?halaman=savecs';</script>";
<?php endif ?>

<!-- ADMIN  -->

<?php if (isset($_POST['admin'])): ?>
    echo "<script > location='adminindex.php?halaman=saveadmin';</script>";
<?php endif ?>
    
<br>    <div class="form-group">
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>E-Mail</th>
            <th>Telepone</th>
            <th>aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php $ambil=$koneksi->query("SELECT * FROM customer"); ?>
        <?php while($pecah=$ambil->fetch_assoc()){; ?>
        <tr>
            <?php $_SESSION['idcs']['id']=$pecah['id_cs']; ?>
            <th><?php echo $pecah['id_cs']; ?></th>
            <th><?php echo $pecah['username_cs']; ?></th>
            <th><?php echo $pecah['email_cs']; ?></th>
            <th><?php echo $pecah['no_telp_cs']; ?></th>
            <th>
                <a href="hapususer.php?id=<?php echo $pecah['id_cs'] ?>" class="btn btn-danger" >Hapus</a>
                <a href="adminindex.php?halaman=ubahuser&id=<?php echo $pecah['id_cs'] ?>" class=" btn btn-warning "  >ubah</a>

            </th>
        </tr>
        
        <?php } ?>
    </tbody>
    <br>
    <?php if ($_SESSION['admin']['kode_akses']==2): ?>
        <h3>Customer</h3>
        <table class="table table-bordered">
    <thead>
        <h3>admin</h3>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>E-Mail</th>
            <th>aksi</th>
        
        </tr>
    </thead>
    <tfoot>
        
        <?php $ambil=$koneksi->query("SELECT * FROM admin Where kode_akses=1"); ?>
        <?php while($pecah=$ambil->fetch_assoc()){; ?>
        <tr>
            <?php $_SESSION['idadmin']['id']=$pecah['id_admin']; ?>
            <th><?php echo $pecah['id_admin']; ?></th>
            <th><?php echo $pecah['username']; ?></th>
            <th><?php echo $pecah['nama_lengkap']; ?></th>
            <th>
                <a href="hapususer.php?id2=<?php echo $pecah['id_admin'] ?>" class="btn btn-danger" >Hapus</a>
                <a href="adminindex.php?halaman=ubahuser&id2=<?php echo $pecah['id_admin'] ?>" class=" btn btn-warning "  >ubah</a>

            </th>
        </tr>
        
        <?php } ?>
    </tfoot>
    </table> 
<?php endif ?>
</table> 


</div>

                           
                            </div>
                        </div>
                    </div>
                </div>
