<?php

include("config.php");

// kalau tidak ada id di query string
if( !isset($_GET['kode_pasien']) ){
    header('Location: index.php');
}

//ambil id dari query string
$kode_pasien = $_GET['kode_pasien'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM pasien WHERE kode_pasien='$kode_pasien' ";
$query = mysqli_query($db, $sql);
$data_pasien = mysqli_fetch_assoc($query);
// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Formulir Edit Pasien</title>
</head>

<body>
    <header>
        <h3>Formulir Edit Pasien</h3>
    </header>

    <form action="proses-edit.php" method="POST">

    <fieldset>

<p>
    <label for="kode">Kode Pasien: </label>
    <input type="text" name="kode_pasien"value="<?php echo $data_pasien['kode_pasien'] ?>" readonly>
</p>
<p>
    <label for="nama">Nama Pasien: </label>
    <input type="text" name="nama_pasien"value="<?php echo $data_pasien['nama_pasien'] ?>">
</p>
<p>
    <label for="alamat_pasien">Alamat: </label>
    <textarea name="alamat_pasien"><?php echo $data_pasien['alamat_pasien'] ?></textarea>
</p>
<p>
    <label for="tempat_lahir">Tempat Lahir: </label>
    <input type="text" name="tempat_lahir"value="<?php echo $data_pasien['tempat_lahir'] ?>">
</p>
<p>
    <label for="tanggal_lahir">Tanggal Lahir: </label>
    <input type="text" name="tanggal_lahir"value="<?php echo $data_pasien['tanggal_lahir'] ?>">
</p>
<p>
    <label for="no_telepon">No Telepon: </label>
    <input type="text" name="no_telepon" placeholder="No Telepon" value="<?php echo $data_pasien['no_telepon'] ?>"/>
</p>
<p>
    <input type="submit" value="Simpan" name="simpan" />
</p>

</fieldset>

    </form>

    </body>
</html>