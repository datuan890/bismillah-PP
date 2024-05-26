<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){

    // ambil data dari formulir
    $kode_pasien = $_POST['kode_pasien'];
    $nama_pasien = $_POST['nama_pasien'];
    $alamat_pasien = $_POST['alamat_pasien'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $no_telepon = $_POST['no_telepon'];
    // buat query
    $sql = "INSERT INTO pasien (kode_pasien, nama_pasien, alamat_pasien, tempat_lahir, tanggal_lahir, no_telepon) VALUE ('$kode_pasien', '$nama_pasien', '$alamat_pasien', '$tempat_lahir', '$tanggal_lahir', '$no_telepon')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>