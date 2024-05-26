<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Rumah Sakit</title>
</head>

<body>
    <header>
        <h3>Nama Pasien</h3>
    </header>

    <nav>
        <a href="form-daftar.php">[+] Tambah Baru</a>
    </nav>

    <br>

    <table border="1">
    <thead>
        <tr>
            <th>Kode Pasien</th> 
            <th>Nama Pasien</th> 
            <th>Alamat Pasien</th> 
            <th>Tempat Lahir</th> 
            <th>Tanggal Lahir</th>
            <th>No Telepon</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT * FROM pasien";
        $query = mysqli_query($db, $sql);

        while($data_pasien = mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td>".$data_pasien['kode_pasien']."</td>";
            echo "<td>".$data_pasien['nama_pasien']."</td>";
            echo "<td>".$data_pasien['alamat_pasien']."</td>";
            echo "<td>".$data_pasien['tempat_lahir']."</td>";
            echo "<td>".$data_pasien['tanggal_lahir']."</td>";
            echo "<td>".$data_pasien['no_telepon']."</td>";    
            echo "<td>";
            echo "<a href='form-edit.php?kode_pasien=".$data_pasien['kode_pasien']."'>Edit</a> | ";
            echo "<a href='hapus.php?kode_pasien=".$data_pasien['kode_pasien']."'>Hapus</a>";
            echo "</td>";

            echo "</tr>";
        }
        ?>

    </tbody>
    </table>

    <p>Total: <?php echo mysqli_num_rows($query) ?></p>

    </body>
</html>