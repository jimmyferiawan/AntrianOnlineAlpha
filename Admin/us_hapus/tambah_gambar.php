<?php
    require_once "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/AntrianOnlineAlpha/framework/css/jquery.dataTables.css">
    <link rel="stylesheet" href="/AntrianOnlineAlpha/framework/css/bootstrap.min.css">
    <link rel="stylesheet" href="/AntrianOnlineAlpha/framework/css/dataTables.bootstrap.min.css">
    
    <title>Document</title>
    <style>

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
            background-color: white;
        }
        .img-thumbnail {
            width: 64px;
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../user_control.php" style="padding-top: 8px;">
                   <img src="../../img/logoas.png" class="user-image img-responsive" style="width: 115px; height: 35px; padding-top: 0px; ">
                </a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#form-login" aria-expanded="false">Login</button>

            </div>
            <?php include 'proses_us/back.php'; ?>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <?php
                // $sql = "SELECT id_tempat ,foto1,foto2,foto3,foto4,foto5 FROM foto_lokasi ";
                // $hasil = $conn->query($sql);

                // if(!$hasil) {

                // } else {

                // }
            ?>
            <table class="table table-hover text-center table-striped tbale-bordered table-paginate display nowrap" id="tabel-insert-gambar">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th >ID Puskesmas</th>
                        <th>Foto 1</th>
                        <th>Foto 2</th>
                        <th>Foto 3</th>
                        <th>Foto 4</th>
                        <th>Foto 5</th>
                        <th>Update </th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $sql = "SELECT id_tempat ,foto1,foto2,foto3,foto4,foto5 FROM foto_lokasi ";
                        $hasil = $conn->query($sql);
                        $no = 1;
                        if($hasil->num_rows > 0) { // 1
                            while($row = $hasil->fetch_assoc()) { // 2
                    ?>
                    <tr>
                        <form method='post' action='proses_us/tambah_tempatps.php' enctype="multipart/form-data">
                        <td> <?= $no ?> </td>
                        <td> <?= $row["id_tempat"] ?> </td>
                        <td> 
                            <img src="../../img-tempat/<?= $row["foto1"] ?>" class="img-responsive img-thumbnail col-sm-3 col-lg-3" alt="">
                            <input class="col-md btn-sm" type="file" name="file1" id="user-profile" class="form-control col-lg-4" placeholder="user1" >
                        </td>
                        <td> 
                            <img src="../../img-tempat/<?= $row["foto2"] ?>" class="img-responsive img-thumbnail col-sm-3 col-lg-3" alt="">
                            <input class="col-md btn-sm" type="file" name="file2" id="user-profile" class="form-control col-lg-4" placeholder="user1" >
                        </td>
                        <td> 
                            <img src="../../img-tempat/<?= $row["foto3"] ?>" class="img-responsive img-thumbnail col-sm-3 col-lg-3" alt="">
                            <input class="col-md btn-sm" type="file" name="file3" id="user-profile" class="form-control col-lg-4" placeholder="user1" >
                        </td>
                        <td> 
                            <img src="../../img-tempat/<?= $row["foto4"] ?>" class="img-responsive img-thumbnail col-sm-3 col-lg-3" alt="">
                            <input class="col-md btn-sm" type="file" name="file4" id="user-profile" class="form-control col-lg-4" placeholder="user1" >
                        </td>
                        <td> 
                            <img src="../../img-tempat/<?= $row["foto5"] ?>" class="img-responsive img-thumbnail col-sm-3 col-lg-3" alt="">
                            <input class="col-md btn-sm" type="file" name="file5" id="user-profile" class="form-control col-lg-4" placeholder="user1" >
                        </td>
                        <td>
                                <input class="btn-danger form-control" type='submit' name='hapus' value='Update'>
                                <input type='hidden' name='id_tempat' value='<?php echo $row["id_tempat"] ?>'>
                        </td>
                        </form>
                    </tr>
                    <?php   
                                $no++;
                            } // 2.end while($row = $hasil->fetch_assoc())
                        } // 1.end if($hasil->num_rows > 0) {
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="/AntrianOnlineAlpha/framework/js/jquery-3.3.1.min.js"></script>
    <script src="/AntrianOnlineAlpha/framework/js/jquery.dataTables.js"></script>
    <script src="/AntrianOnlineAlpha/framework/js/bootstrap.min.js"></script>
    <script src="/AntrianOnlineAlpha/framework/js/dataTables.bootstrap.min.js"></script>
    <script>
        
        $(document).ready(function() {
            $('#tabel-insert-gambar').DataTable({
                scrollX: true
            });
        });
    </script>
</body>
</html>