<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "tkk_crud";

// Buat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);

$query = "SELECT id, name, email, password FROM user";
$result = mysqli_query($conn, $query);


// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Tutup koneksi
mysqli_close($conn);
?>
