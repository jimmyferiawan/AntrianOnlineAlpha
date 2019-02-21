<?php
    $tempat = [
        1 => "rumahsakit",
        2 => "pukesmas",
        3 => "klinik",
        4 => "dokterumum"
    ];

    if("GET" == $_SERVER["REQUEST_METHOD"]) {
        if(isset($_GET["id"])) {
            require_once "../koneksi.php";

            $idTempat = $_GET["id"];
            $data = array();

            $idInstansi = "ID_".$tempat[$idTempat];
            $namaInstansi = "nama_".$tempat[$idTempat];
            $sql = "SELECT $idInstansi, $namaInstansi FROM ". $tempat[$idTempat]; 
            
            $query = $conn->query($sql);

            if($query) {
                while($row = $query->fetch_assoc()) {
                    $_temp["id"] = $row[$idInstansi];
                    $_temp["nama"] = $row[$namaInstansi];
                    array_push($data, $_temp);
                }
            }
            
            echo json_encode($data);
           
        }
        
    }