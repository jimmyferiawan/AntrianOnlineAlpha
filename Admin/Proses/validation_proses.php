
<?php include '../koneksi.php'; ?>

        <!-- 
    - format diganti .php kecil semua
    - bootstrap butuh jquery agar manipulasi seperti dropdown bisa bekerja
    - berasumsi bahwa file css dan js ada di root server
 -->
<!DOCTYPE html>


    
           <?php

 $sql = " SELECT ID_op, username_op  FROM oprator where  status_op ='2'  ";

        $hasil = $conn->query($sql);

        if(!$hasil) {
            if($conn->errno == 1062) {
                // 1062 error kode duplicate primary key
                echo "<h1>ID Puskesmas sudah ada sudah digunakan</h1>";
            } else {
                echo "Maaf terjadi kesalahan ". $conn->error; // fungsi debug 
           
            }
        } else {
            ?><table class="table table-bordered table-hover text-center" >
        <thead align="center">
            <tr>
                <th>NO</th>
                <th >ID Oprator</th>
                <th>Nama oprator</th>
                <th>Aksi</th>

            </tr>
        </thead>
        <tbody>';
        
<?php 
if ($hasil ->num_rows >=0){
        $no=1;
        while($row = $hasil->fetch_assoc()){
        ?>     
            <td align='center'><?php echo $no ; ?></td>
            <td><?php echo $row["ID_op"] ; ?></td>
            <td align='center'><?php echo   $row["username_op"]; ?></td>
            <td><form method='post' action='Proses/proses_valid.php'>
                    <input class="btn-success form-control" type='submit' name='hapus' value='Upgrade'>
                    <input type='hidden' name='npm' value='<?php echo $row["ID_op"]  ;?>'>
                </form>
                
            </td></tr><?php 
            ;
            $no++;
        }
    } ?>
     </table>";

<?php  

        } 


?>

