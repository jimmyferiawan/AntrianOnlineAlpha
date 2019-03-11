 <!-- /. ROW  -->
                 
                  <?php include 'Proses/count.php'; ?>               
            <div class="row text-center">
                <div class="col-md-4 col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Pasien / User 
                            <!-- script -->


                            <!-- secript -->
                        </div>
                        <div class="panel-body">
                            <h1>  <?php echo $_SESSION['ct_pasien']  ?></h1>
                        </div>
                        <div class="panel-footer">
                   <a href="us_hapus/hapus_ps.php">Show Data</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           Opreator Valid
                        </div>
                        <div class="panel-body">
                           <h1><?php echo $_SESSION['ct_op_yes'] ?> </h1>
                        </div>
                        <div class="panel-footer">
                            <a href="us_hapus/hapus_op.php">Show Data</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Dokter
                        </div>
                        <div class="panel-body">
                            <h1> <?php echo $_SESSION['ct_dokter']  ?></h1>
                        </div>
                        <div class="panel-footer">
                              <a href="us_hapus/hapus_dk.php">Show Data</a>
                        </div>
                    </div>
                </div>
              

            </div>
               <div class="row text-center">
                 <div class="col-md-4 col-sm-4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Foto tempat
                        </div>
                        <div class="panel-body">
                            <h1> <?php echo $_SESSION['ct_temp']  ?></h1>
                        </div>
                        <div class="panel-footer">
                              <a href="us_hapus/tambah_gambar.php">Show Data</a>
                        </div>
                    </div>
                </div>
                </div>