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
      <title>User Antri Sehat</title>
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
            padding: 15px 20px;
        }

        .navbar-default .navbar-nav>li>a:hover:not(#aw) {
            background-color: #36d7b7;
            color: white;
        }

        .mb-3 {
            margin-bottom: 10px;
        }

        .panel-success {
            border-radius: 0;
        }
    
        .panel-success>.panel-heading {
            background-image: linear-gradient(to top right, #11998e, #38ef7d);
            color: #fff;
            letter-spacing: 2px;
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>


    <div class="container">
        <div class="col-sm-12 col-md-4 col-lg-4" id="kolomkiri">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h5 class="panel-title">Pilih Tempat Berobat</h5>
                    </div>
                    <div class="panel-body">  
                        <select name ="jenis-antrian" id="jenis-antrian" class="form-control mb-3">
                              <option selected disabled>Jenis Berobat</option>
                            <option value="1">UMUM</option>
                            <option value="2">BPJS</option>
                         </select>
                        <select name="jenis-tempat" id="jenis-tempat" class="form-control mb-3">
                            <option selected disabled>Jenis tempat</option>
                            <option value="1">Rumah Sakit</option>
                            <option value="2">Puskesmas</option>
                            <option value="3">Klinik</option>
                            <option value="4">Dokter Umum</option>
                        </select>
                        <select name="daftar-nama" id="daftar-nama" class="form-control mb-3">
                            <option selected disabled value="">Nama Tempat</option>
                        </select>
                        <form action="output_antrian.php" method="post" id="form-ambil-antrian">
                            <input type="hidden" name="id_tempat" value="" id="form_id_tempat">
                            <input type="hidden" name="id_instansi" value="" id="form_id_instansi">
                            
                            <button class="btn btn-primary <?= $btn_antri_disabled ?>" id="btn-ambil-antrian" style="border-radius: 0px;">Ambil Antrian</button>
                            
                        </form>       
                    </div>
                </div>
            </div>
        <div class="col-lg-4"  id="kolomndelik">
                        <div class="row">
                        <div class="col-lg-12"><img id="foto1" src="img/usr.png" class="img-responsive" alt="" style=" width: 100%; height: 350px;"></div>
                        <div class="col-lg-12" style="padding: 10px 0px;">
                            <img id="foto2" src="img/logoas.png" class="img-responsive col-sm-3 col-lg-3" alt=""  onclick="myFunction(this);">
                            <img id="foto3" src="img/logoas.png" class="img-responsive col-sm-3 col-lg-3" alt=""  onclick="myFunction(this);">
                            <img id="foto4" src="img/logoas.png" class="img-responsive col-sm-3 col-lg-3" alt=""  onclick="myFunction(this);">
                            <img id="foto5" src="img/logoas.png" class="img-responsive col-sm-3 col-lg-3" alt=""  onclick="myFunction(this);">
                        </div>

                        </div>
                    </div>
                    <div class="col-lg-4" id="kolomndelik2">
                        <div class="jumbotron" style="padding-top: 10px; padding-bottom: 20px; margin-bottom: 10px; background-color: transparent; border: solid 1px DarkTurquoise;">
                            <div class="row text-center">
                                <div class="col-lg-8 col-lg-offset-2" style="background-color: #36d7b7; color: white;"><h4 style="letter-spacing: 2px;">info antrian</h4></div>
                                <div class="col-lg-6"><h1 id="nomor-antrian-sekarang">0</h1> <h4>SEKARANG</h4></div>
                                <div class="col-lg-6"><h1 id="nomor-antrian">0</h1> <h4>TOTAL</h4></div>
                                <hr>
                            </div>
                        </div>
                        <div class="panel panel-info" style="padding: 15px;">
                            <div class="list-group">
                            <h4 class="list-group-item-heading">Info Tempat</h4>
                            <p class="list-group-item-text">
                                 <table>
                                     <tr>
                                         <th colspan="1">Nama</th>
                                         <td id="info-nama">-</td>
                                     </tr>
                                      <tr>
                                         <th>Alamat</th>
                                         <td id="info-alamat">-</td>
                                     </tr>
                                <!--      <tr>
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
                                     </tr> -->
                                     <tr>
                                         <th>No Telepon  </th>
                                         <td id="info-notelp">-</td>
                                     </tr>
                                     <!-- update tabel sql=fst-->
                                        <tr>
                                         <th>poli  </th>
                                         <td id="info-poli">-</td>
                                     </tr>
                                         <tr>
                                         <th>R.Inap   </th>
                                         <td id="info-inap">-</td>
                                     </tr>
                                          <tr>
                                         <th>D.Sepesialis   </th>
                                         <td id="info-spesialis">-</td>
                                     </tr>
                                         <tr>
                                         <th>Ambulance   </th><br>
                                         <td id="info-ambulance">-</td>
                                     </tr>
                                     <tr>
                                         <th>Alat  </th>
                                         <td id="info-alat">-</td>
                                     </tr>
                                     <tr>
                                         <th>Kelebihan    </th>
                                         <td id="info-kelebihan">-</td>
                                     </tr>
                                     <!-- end -->
                                 </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-lg-offset-4" id="kolomndelik3">
        <div class="panel panel-success">
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
                            <b>Sulasri</b>
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
                    <i class="glyphicon glyphicon-star-empty"></i>
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
         var nomorbpjs = document.getElementById('jenis-antrian');
        var nomorAntrianSekarang = document.getElementById('nomor-antrian-sekarang');
        var btnAmbilAntrian = document.getElementById('btn-ambil-antrian');
        var inpAntrianTempat = document.getElementById('form_id_tempat');
        var inpAntrianInstansi = document.getElementById('form_id_instansi');
        var formAmbilAntrian = document.getElementById('form-ambil-antrian');
        var btnKonfirmasiAntri = document.getElementById('konfirmasi-antri');
        var isiTextModal = document.getElementById('isi-text-modal');
        var infoNama = document.getElementById('info-nama');
        var infoAlamat = document.getElementById('info-alamat');
        var infoNoTelp = document.getElementById('info-notelp');
        var infoPoli = document.getElementById('info-poli');
        var infoInap = document.getElementById('info-inap');
        var infoSpesialis = document.getElementById('info-spesialis');
        var infoAmbulance = document.getElementById('info-ambulance');
        var infoAlat = document.getElementById('info-alat');
        var infoKelebihan = document.getElementById('info-kelebihan');
        var fotoInstansi1 = document.getElementById('foto1');
        var fotoInstansi2 = document.getElementById('foto2');
        var fotoInstansi3 = document.getElementById('foto3');
        var fotoInstansi4 = document.getElementById('foto4');
        var fotoInstansi5 = document.getElementById('foto5');


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
                updateAntrian(response.data);
                // console.log(response.data);
            })
            .catch(function(error) {
                // console.log("error getAntrianSekarang(idInstansi, idTempat): " + error)
            });
        }

        function updateAntrian(data) {
            // ganti angka nomor antrian
            nomorAntrian.innerText = data.total;
            nomorAntrianSekarang.innerText = data.sekarang;
            infoNama.innerText = data.nama_instansi;
            infoAlamat.innerText = data.alamat_instansi;
            infoNoTelp.innerText = data.telp_instansi;
            infoPoli.innerText = data.poli;
            infoInap.innerText =data.R_inap;
            infoSpesialis.innerText =data.D_sps;
            infoAmbulance.innerText =data.ambulance;
            infoAlat.innerText =data.alat_k;
            infoKelebihan.innerText =data.kelebihan;
            fotoInstansi1.src = "img-tempat/" + data.foto1;
            fotoInstansi2.src = "img-tempat/" + data.foto2;
            fotoInstansi3.src = "img-tempat/" + data.foto3;
            fotoInstansi4.src = "img-tempat/" + data.foto4;
            fotoInstansi5.src = "img-tempat/" + data.foto5;
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
                var namaInstansi = this.options[this.selectedIndex].text;
                this.setAttribute('data-nama-tempat', namaInstansi);
                getAntrianSekarang(this.value, idTempat);
                inpAntrianInstansi.value = idInstansi;
            }
            
        });
        
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
                $("#isi-text-modal").text("Apakah anda yakin ingin mengantri di " + daftarNama.options[daftarNama.selectedIndex].text + " ?");
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
        });

        // script gallery foto

        function myFunction(imgs) {
  // Get the expanded image
  var expandImg = document.getElementById("foto1");
  // Get the image text
  // Use the same src in the expanded image as the image being clicked on from the grid
  expandImg.src = imgs.src;
  // Use the value of the alt attribute of the clickable image as text inside the expanded image
  imgText.innerHTML = imgs.id;
  // Show the container element (hidden with CSS)
  expandImg.parentElement.style.display = "block";
} 


        // script menyembunyikan kolom kanan 
        $(document).ready(function() {
            $("#kolomndelik").hide();
            $("#kolomndelik2").hide();
            $("#kolomndelik3").hide();

            $("#kolomkiri").removeClass("col-lg-4");
            $("#kolomkiri").addClass("col-lg-12");

            // $('#jenis-tempat').hide();
            // $('#daftar-nama').hide();
            document.getElementById("jenis-tempat").style.display = "none";
            
            document.getElementById("daftar-nama").style.display = "none";

            $('#jenis-antrian').on('change', function() {
                if ( this.value == '1')
                  {
                    $('#jenis-tempat').show();
                    $('#daftar-nama').show();  
                  }
                else if ( this.value == '2')
                  {
                    document.getElementById("jenis-tempat").style.display = "none";
                    document.getElementById("daftar-nama").style.display = "none";
                  }
             });
        });

        daftarNama.addEventListener('change',function(){
            $("#kolomndelik").show();
            $("#kolomndelik2").show();
            $("#kolomndelik3").show();

            $("#kolomkiri").addClass("col-lg-4");
            $("#kolomkiri").removeClass("col-lg-12");
        });


        // Akhir Script
    </script>
</body>
</html>