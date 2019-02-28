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

            $sql = "SELECT $idInstansi, $namaInstansi, antrian FROM ". $tempat[$idTempat]; 
            
            $query = $conn->query($sql);

            if($query) {
                while($row = $query->fetch_assoc()) {
                    $_temp["id_instansi"] = $row[$idInstansi];
                    $_temp["nama"] = $row[$namaInstansi];
                    array_push($data, $_temp);
                }
            }
            
            echo json_encode($data);
           
        }

        if(isset($_GET["id_instansi"])) {
            $id_instansi = $conn->real_escape_string($_GET["id_instansi"]);
            $id_jenis_tempat = $conn->real_escape_string($_GET["id_jenis_tempat"]);
            // echo $id_jenis_tempat;
            // $where = "WHERE ID_".$tempat[$id_jenis_tempat]. "='$id_instansi'";
            // $sql = "SELECT antrian FROM ". $tempat[$id_jenis_tempat] . " $where";
            $where = "WHERE lokasi='$id_instansi'";
            $sql = "SELECT sekarang,total FROM antri $where";
            $query = $conn->query($sql);

            if($query->num_rows > 0) {
                $data_antrian = "";
                while($row = $query->fetch_assoc()) {
                    $data_antrian = $row;
                }
                echo json_encode($data_antrian);
            } else {
                echo "0";
            }
            
        }
        
    }