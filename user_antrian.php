<?php 
    session_start();
    if(isset($_SESSION['u_antrian_pin']) && isset($_SESSION['u_antrian_lokasi']) && isset($_SESSION['u_antrian_nomor'])) {
        echo "sudah antri";
        header("Location: output_antrian.php");
    }
    
    $is_login = isset($_SESSION['u']);
    $btn_antri_disabled = $is_login ? "" : "disabled";
?> 

<?php if (!isset( $_SESSION['u'])) 
 {
echo "<script> alret('LOGIN FIRST');</script>";
echo "<script> location='login.php';</script>";
header('location:login.php');
exit();
 } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="framework/css/bootstrap.min.css">
    <title>Document</title>
    <style>
        .clearfix {
            content: "";
            clear: both;
            display: table;
        }
        body{
            padding-top: 70px;
            padding-bottom: 24px;
        }

        .btn-primary {
            color: #fff;
            background-color: #36d7b7;
            border-color: #36d7b7;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #16a085;
            border-color: #16a085
        }

        .navbar-default .navbar-toggle:hover {
            border-color: #36d7b7;
            color: #36d7b7;
        }

        .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover {
            
            background-color: transparent;

            border-bottom: 2px solid #36d7b7;          
        }
        
        .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover {
            background-color: transparent;
            color: grey;
        }
      
        #form-ambil-antrian {
            display: inline-block;
        }

        .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover {
            background-color: transparent;
            }

        .navbar-default .navbar-nav>.open>a:hover {
            border: none;
        }

        .navbar-default .navbar-nav>li>a {
            font-size: 13px;

            padding: 15px 20px;
        }

        .navbar-default .navbar-nav>li>a:hover:not(#aw) {
            border-bottom: 2px solid #36d7b7;
        }
    

    </style>
</head>
<body>

    <!-- navbar hemat script -->
    <!-- <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="">
                    LOGO
                </a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navheader-collapse" aria-expanded="false">
                    <span class="glyphicon glyphicon-menu-hamburger"></span>
                </button>

            </div>
            <div class="collapse navbar-collapse navheader-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="">Ambil Antrian</a></li>
                <li class="<?= $btn_antri_disabled ?>"><a href="user_editbio.php" >pengaturan</a></li>
                <li class="<?= $btn_antri_disabled ?>"><a href="user/logout.php" >keluar</a></li>
            </ul>
            </div>
        </div>
    </nav> -->
    <?php include 'navbar.php'; ?>


    <div class="container">
        <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h5 class="panel-title">Pilih Tempat Berobat</h5>
                    </div>
                    <div class="panel-body">  
                        <select name="jenis-tempat" id="jenis-tempat" class="form-control">
                            <option selected disabled>Jenis tempat</option>
                            <option value="1">Rumah Sakit</option>
                            <option value="2">Puskesmas</option>
                            <option value="3">Klinik</option>
                            <option value="4">Dokter Umum</option>
                        </select>
                        <br>
                        <select name="daftar-nama" id="daftar-nama" class="form-control">
                            <option selected disabled value="">Nama Tempat</option>
                        </select>
                        <br>
                        <form action="output_antrian.php" method="post" id="form-ambil-antrian">
                            <input type="hidden" name="id_tempat" value="" id="form_id_tempat">
                            <input type="hidden" name="id_instansi" value="" id="form_id_instansi">
                            
                                <button class="btn btn-primary <?= $btn_antri_disabled ?>" id="btn-ambil-antrian" style="border-radius: 0px;">Ambil Antrian</button>
                            
                        </form>       
                    </div>
                </div>
            </div>
        <div class="col-lg-4">
                        <div class="row">
                        <div class="col-lg-12"><img src="img/bgad2.jpg" class="img-responsive" alt="" style=" width: 100%; height: 350px;"></div>
                        <div class="col-lg-12" style="padding: 10px 0px;">
                            <img src="img/bgad2.jpg" class="img-responsive col-sm-3 col-lg-3" alt="">
                            <img src="img/bgad2.jpg" class="img-responsive col-sm-3 col-lg-3" alt="">
                            <img src="img/bgad2.jpg" class="img-responsive col-sm-3 col-lg-3" alt="">
                            <img src="img/bgad2.jpg" class="img-responsive col-sm-3 col-lg-3" alt="">
                        </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="jumbotron" style="padding-top: 10px;">
                            <div class="row text-center">
                                <div class="col-lg-12 col-lg-offset-6"><button type="button" class="btn btn-default btn-md" id="refresh-antrian" alt="refresh antrian" style="background-color: transparent; border: none;">
                            <span class="glyphicon glyphicon-refresh" aria-hidden="true" ></span>
                        </button>     </div>
                                <div class="col-lg-6"><h5 id="nomor-antrian-sekarang">0</h5> <h4>sekarang</h4></div>
                                <div class="col-lg-6"><h5 id="nomor-antrian">0</h5> <h4>total</h4></div>
                            </div>
                        </div>
                        <div class="panel panel-default" style="padding: 15px;">
                            <div class="list-group">
                            <h4 class="list-group-item-heading">Info Tempat</h4>
                            <p class="list-group-item-text">
                                 <table>
                                     <tr>
                                         <th colspan="1">Nama</th>
                                         <td>Dinas Kesehatan Kota Surabaya</td>
                                     </tr>
                                      <tr>
                                         <th>Alamat</th>
                                         <td>Jl. Raya Jemursari No.197, Sidosermo, Wonocolo, Kota SBY, Jawa Timur 60239</td>
                                     </tr>
                                     <tr>
                                         <th>Jam Buka</th>
                                         <td>Selasa 07.30–16.00
Rabu    07.30–16.00
Kamis   07.30–16.00
Jumat   07.30–16.00
Sabtu   Tutup
Minggu  Tutup
Senin   07.30–16.00</td>
                                     </tr>
                                     <tr>
                                         <th>Provinsi</th>
                                         <td>Jawa Timur</td>
                                     </tr>
                                     <tr>
                                         <th>No Telepon</th>
                                         <td>(031) 8439473</td>
                                     </tr>
                                 </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-lg-offset-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">Ulasan Mengenai Tempat</div>
            </div>
            <div class="panel-body">
                <div class="col-lg-1" style="padding-right: 0; padding-top: 5px;">
                    <img src="img/usr.png" class="img-circle" alt="" width="25" height="25">
                </div><!--kolom image user-->
                <div class="col-lg-8" style="padding-left: 0;">
                    <div class="row">
                        <div class="col-lg-6">
                            <b>Noob User</b>
                        </div>
                        <div class="col-lg-12">
                            Pelayanan Cepat Memuaskan....Terima Kasih Banyak.....
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <i class="glyphicon glyphicon-star"></i>
                    <i class="glyphicon glyphicon-star"></i>
                    <i class="glyphicon glyphicon-star"></i>
                    <i class="glyphicon glyphicon-star"></i>
                    <i class="glyphicon glyphicon-star"></i>
                </div>
            </div>
        </div>
    </div>
                </div>
                
            </div>
        </div>
    
    <div class="container">        
        <!-- Modal -->
        <div class="modal fade" id="modal-konfirmasi-ambil-antrian" role="dialog">
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Konfirmasi Antrian</h4>
                </div>
                <div class="modal-body">
                    <p id="isi-text-modal">Apakah anda yakin ingin mengantri di ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="konfirmasi-antri">Ya</button>
                </div>
            </div>
            
            </div>
        </div>
        
    </div>
    <script src="framework/js/jquery-3.3.1.min.js"></script>
    <script src="framework/js/bootstrap.min.js"></script>
    <script src="framework/js/axios.min.js"></script>
    <script>
        var jenisTempat = document.getElementById('jenis-tempat');
        var daftarNama = document.getElementById('daftar-nama');
        var nomorAntrian = document.getElementById('nomor-antrian');
        var nomorAntrianSekarang = document.getElementById('nomor-antrian-sekarang');
        var btnRefreshAntrian = document.getElementById('refresh-antrian');
        var btnAmbilAntrian = document.getElementById('btn-ambil-antrian');
        var inpAntrianTempat = document.getElementById('form_id_tempat');
        var inpAntrianInstansi = document.getElementById('form_id_instansi');
        var formAmbilAntrian = document.getElementById('form-ambil-antrian');
        var btnKonfirmasiAntri = document.getElementById('konfirmasi-antri');

        function updateDaftarnama(listNamaTempat, idJenisTempat) {
            // update daftar instansi ketika jenis tempat diubah
            daftarNama.options.length = 0;
            var defaultOption = '<option selected disabled value="">Nama Tempat</option>';
            daftarNama.innerHTML = defaultOption;
            daftarNama.setAttribute('data-id-tempat', idJenisTempat);
            inpAntrianTempat.value = idJenisTempat;
            // console.log(listNamaTempat);
            for(var i of listNamaTempat) {
                var select = new Option(i.nama, i.id_instansi);
                daftarNama.add(select);
            }
        }

        function getAntrianSekarang(idInstansi, idTempat) {
            // mendapatkan antrian sekarang per instansi
            axios.get('/AntrianOnlineAlpha/user/pilih-tempat.php', {
                params: {
                    id_instansi: idInstansi,
                    id_jenis_tempat: idTempat
                }
            })
            .then(function(response) {
                updateAntrian(response.data.total, response.data.sekarang);
                // console.log(response.data);
            })
            .catch(function(error) {
                // console.log("error getAntrianSekarang(idInstansi, idTempat): " + error)
            });
        }

        function updateAntrian(nomorAntrianTotal, antrianSekarang) {
            // ganti angka nomor antrian
            nomorAntrian.innerText = nomorAntrianTotal;
            nomorAntrianSekarang.innerText =  antrianSekarang;
            
        }
        
        function refreshAntrian() {
            // tombol refresh
            if (daftarNama.hasAttribute('data-id-tempat')) {
                var idInstansi = daftarNama.value;
                var idTempat = daftarNama.getAttribute('data-id-tempat');

                getAntrianSekarang(idInstansi, idTempat);
            }
        }

        // pilih jenis tempat berobat
        jenisTempat.addEventListener('change', function() {
            var idLokasi = this.value;

            axios.get('/AntrianOnlineAlpha/user/pilih-tempat.php', {
                    params: {
                        id_tempat: idLokasi
                    }
                })
                .then(function(response) {
                    updateDaftarnama(response.data, idLokasi);
                    // consoloe.log(response);
                })
                .catch(function(error) {
                    // TODO: lakukan sesuatu ketika error ambil data
                    // contoh: tampil alert error atau modal dialog error
                });
        });

        daftarNama.addEventListener('change', function() {
            if (this.hasAttribute("data-id-tempat")) {
                var idTempat = this.getAttribute('data-id-tempat');
                var idInstansi = this.value;

                getAntrianSekarang(this.value, idTempat);
                inpAntrianInstansi.value = idInstansi;
            }
            
        });
        btnRefreshAntrian.addEventListener('click', refreshAntrian);
        
        btnAmbilAntrian.addEventListener('click', function(e) {
            e.preventDefault();
            var k = inpAntrianTempat.value.trim();
            var l = inpAntrianInstansi.value.trim();
            if(k === "" && l === "") {
                // console.log(`tempat: ${inpAntrianTempat.value}, instansi: ${ inpAntrianInstansi.value}`);
                alert("tolong pilih jenis tempat dan nama tempat!");
            } else if(k === "") {
                alert("tolong pilih jenis tempat!");
            } else if(l === "") {
                alert("tolong pilih nama tempat!");
            } else {
                $('#modal-konfirmasi-ambil-antrian').modal();
            }
            
        });
        
        formAmbilAntrian.addEventListener('submit', function(e) {
            e.preventDefault();
            var k = inpAntrianTempat.value.trim();
            var l = inpAntrianInstansi.value.trim();
            if(k === "" && l === "") {
                // console.log(`tempat: ${inpAntrianTempat.value}, instansi: ${ inpAntrianInstansi.value}`);
                alert("tolong pilih jenis tempat dan nama tempat!");
                return false;
            } else if(k === "") {
                alert("tolong pilih jenis tempat!");
                return false;
            } else if(l === "") {
                alert("tolong pilih nama tempat!");
                return false;
            } else {
                // console.log(`tempat: ${inpAntrianTempat.value}, instansi: ${ inpAntrianInstansi.value}`);
                this.submit();
            }
        });

        btnKonfirmasiAntri.addEventListener('click', function(e) {
            e.preventDefault();
            formAmbilAntrian.submit();
        })
    </script>
</body>
</html>