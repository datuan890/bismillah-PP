<?php

include("config.php");

if( isset($_GET['kode_pasien']) ){

    // ambil id dari query string
    $kode_pasien = $_GET['kode_pasien'];

    // buat query hapus
    $sql = "DELETE FROM pasien WHERE kode_pasien='$kode_pasien'";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: index.php');
    } else {
        header('Location: index.php?status=gagal&error=' . urlencode(mysqli_error($db)));
    }

} else {
    die("akses dilarang...");
}

?>