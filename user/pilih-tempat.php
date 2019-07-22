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
            $fst = "fst.poli, fst.R_inap, fst.D_sps, fst.ambulance, fst.kelebihan, fst.alat_k";
            // SELECT antri.sekarang, antri.total,rumahsakit.nama_rumahsakit as nama_instansi, alamat_rumahsakit as alamat_instansi, rumahsakit.no_telp_rumahsakit as telp_instansi, foto_lokasi.foto1, foto_lokasi.foto2, foto_lokasi.foto3, foto_lokasi.foto4, foto_lokasi.foto5 FROM antri JOIN rumahsakit ON antri.lokasi = rumahsakit.ID_rumahsakit JOIN foto_lokasi ON rumahsakit.ID_rumahsakit=foto_lokasi.id_tempat WHERE antri.lokasi = "C001"
            $sql = "SELECT $antri, $instansi, $foto FROM antri JOIN $pref ON antri.lokasi =$pref.ID_$pref JOIN foto_lokasi ON $pref.ID_$pref=foto_lokasi.id_tempat $where";
            $sql2 = "SELECT $fst FROM fst WHERE ID_ins='$id_instansi'";
            $query = $conn->query($sql);
            $query2 = $conn->query($sql2);
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
                "foto5" => "",
                "poli" => "",
                "R_inap" => "",
                "D_sps" => "",
                "ambulance" => "",
                "kelebihan" => "",
                "alat_k" => ""
            ];
            if($query->num_rows > 0) {
                while($row = $query->fetch_assoc()) {
                    $data_antrian['sekarang'] = $row['sekarang'];
                    $data_antrian['total'] = $row['total'];
                    $data_antrian['nama_instansi'] = $row['nama_instansi'];
                    $data_antrian['alamat_instansi'] = $row['alamat_instansi'];
                    $data_antrian['telp_instansi'] = $row['telp_instansi'];
                    $data_antrian['foto1'] = $row['foto1'];
                    $data_antrian['foto2'] = $row['foto2'];
                    $data_antrian['foto3'] = $row['foto3'];
                    $data_antrian['foto4'] = $row['foto4'];
                    $data_antrian['foto5'] = $row['foto5'];
                }
                
            }
            if($query2->num_rows > 0) {
                while($row = $query->fetch_assoc()) {
                    $data_antrian['poli'] = $row['poli'];
                    $data_antrian['R_inap'] = $row['R_inap'];
                    $data_antrian['D_sps'] = $row['D_sps'];
                    $data_antrian['ambulance'] = $row['ambulance'];
                    $data_antrian['kelebihan'] = $row['kelebihan'];
                    $data_antrian['alat_k'] = $row['alat_k'];
                }
            }
            echo json_encode($data_antrian);
        }
        
    }
?>