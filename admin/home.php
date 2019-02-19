<?php include 'koneksi.php'; ?>
<!-- proses -->
<?php include 'hitung.php'; ?>
 <!-- end proses -->
 
<div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           Pesanan Customer
                        </div>
                       
                        <div class="panel-body">
                        	<label>Wait Order</label>
                       <div class="progress progress-striped">

  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" 
  aria-valuemax="100" style="width: <?php echo $tab1; ?>%"><label><?php echo $num1; ?></label>
  </div>
</div>
<label> Proses Order</label>
<div class="progress progress-striped">
  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $tab2; ?>%"><label><?php echo $num2; ?></label>
  </div>
</div>
<label>Send Order</label>
<div class="progress progress-striped">
  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $tab3; ?>%"><label><?php echo $num3; ?></label>
  </div>
</div>
<label>Success order</label>
<div class="progress progress-striped">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $tab4; ?>%"><label><?php echo $num4; ?></label>
  </div>
</div>
                            </div>
                            </div>
<!-- batas -->

<!-- batas -->

                    </div>
                    <div class="col-md-3 col-sm-3">
                    <div class="well well-sm">
                        <h4 class="text-center" >Jumlah user </h4>
                        <p ><h1 class="text-center"> <?php  echo $num5; ?></h1></p>
                    </div>

                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="well well-sm">
                        <h4 class="text-center" >Jumlah Order </h4>
                        <p ><h1 class="text-center"> <?php  echo $jumlah; ?></h1></p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="well well-sm">
                        <h4 class="text-center" >Jumlah Barang </h4>
                        <p ><h1 class="text-center"> <?php  echo $num6; ?></h1></p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="well well-sm">
                        <h4 class="text-center" >Massage E-mail </h4>
                        <p ><h1 class="text-center"> <?php  echo $num7; ?></h1></p>
                    </div>
                </div>
                <?php  include 'promo.php'; ?>

                