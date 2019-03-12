<?php
    $tempat = [
        1 => "rumahsakit",
        2 => "pukesmas",
        3 => "klinik",
        4 => "dokterumum"
    ];

    if("GET" == $_SERVER["REQUEST_METHOD"]) {
        require_once "../koneksi.php";
        if(isset($_GET["id_tempat"])) {

            $idTempat = $conn->real_escape_string($_GET["id_tempat"]);
            $data = array();

            $idInstansi = "ID_".$tempat[$idTempat];
            $namaInstansi = "nama_".$tempat[$idTempat];
            $alamat = "alamat_".$tempat[$idTempat];
            $no_telp = "no_telp_".$tempat[$idTempat];

            $sql = "SELECT $idInstansi, $namaInstansi, $alamat, $no_telp FROM ". $tempat[$idTempat];
            $query = $conn->query($sql);

            if($query) {
                while($row = $query->fetch_assoc()) {
                    $_temp["id_instansi"] = $row[$idInstansi];
                    $_temp["nama"] = $row[$namaInstansi];
                    array_push($data, $_temp);
                }
            } else {
                $data["id_instansi"] = "";
                $data["nama"] = "";
            }
            
            echo json_encode($data);
           
        }

        if(isset($_GET["id_instansi"])) {
            $id_instansi = $conn->real_escape_string($_GET["id_instansi"]);
            $id_jenis_tempat = $conn->real_escape_string($_GET["id_jenis_tempat"]);
            $pref = $tempat[$id_jenis_tempat];
            // echo $id_jenis_tempat;
            // $where = "WHERE ID_".$tempat[$id_jenis_tempat]. "='$id_instansi'";
            // $sql = "SELECT antrian FROM ". $tempat[$id_jenis_tempat] . " $where";
            $where = "WHERE lokasi='$id_instansi'";
            $antri = "antri.sekarang,antri.total";
            $instansi = "$pref.nama_$pref as nama_instansi, alamat_$pref as alamat_instansi, $pref.no_telp_$pref as telp_instansi";
            $foto = "foto_lokasi.foto1, foto_lokasi.foto2, foto_lokasi.foto3, foto_lokasi.foto4, foto_lokasi.foto5";
            // SELECT antri.sekarang, antri.total,rumahsakit.nama_rumahsakit as nama_instansi, alamat_rumahsakit as alamat_instansi, rumahsakit.no_telp_rumahsakit as telp_instansi, foto_lokasi.foto1, foto_lokasi.foto2, foto_lokasi.foto3, foto_lokasi.foto4, foto_lokasi.foto5 FROM antri JOIN rumahsakit ON antri.lokasi = rumahsakit.ID_rumahsakit JOIN foto_lokasi ON rumahsakit.ID_rumahsakit=foto_lokasi.id_tempat WHERE antri.lokasi = "C001"
            $sql = "SELECT $antri, $instansi, $foto FROM antri JOIN $pref ON antri.lokasi =$pref.ID_$pref JOIN foto_lokasi ON $pref.ID_$pref=foto_lokasi.id_tempat $where";
            $query = $conn->query($sql);
            $data_antrian = [
                "sekarang" => 0,
                "total" => 0,
                "nama_instansi" => "",
                "alamat_instansi" => "",
                "telp_instansi" => "",
                "foto1" => "",
                "foto2" => "",
                "foto3" => "",
                "foto4" => "",
                "foto5" => ""
            ];
            if($query->num_rows > 0) {
                $data_antrian = "";
                while($row = $query->fetch_assoc()) {
                    $data_antrian = $row;
                }
                
            }
            echo json_encode($data_antrian);
        }
        
    }
?>