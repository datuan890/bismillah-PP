<?php  
include 'config.php';
$query = mysqli_query($db, "SELECT max(kode_pasien) as kodeTerbesar FROM pasien");
$data = mysqli_fetch_array($query);
$kode = $data['kodeTerbesar'];

// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($kode, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;

// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
$huruf = "P-";
$kode = $huruf . sprintf("%03s", $urutan);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulir Pendaftaran Pasien</title>
</head>

<body>
    <header>
        <h3>Formulir Pendaftaran Pasien</h3>
    </header>

    <form action="proses-pendaftaran.php" method="POST">

                    <fieldset>

                <p>
                    <label for="kode">Kode Pasien: </label>
                    <input type="text" name="kode_pasien"value="<?php echo $kode ?>" readonly>
                </p>
                <p>
                    <label for="nama">Nama Pasien: </label>
                    <input type="text" placeholder="Nama Pasien" name="nama_pasien">
                </p>
                <p>
                    <label for="alamat_pasien">Alamat: </label>
                    <textarea name="alamat_pasien"></textarea>
                </p>
                <p>
                    <label for="tempat_lahir">Tempat Lahir: </label>
                    <input type="text" placeholder="Tempat Lahir" name="tempat_lahir">
                </p>
                <p>
                    <label for="tanggal_lahir">Tanggal Lahir: </label>
                    <input type="text" placeholder="Tanggal Lahir" name="tanggal_lahir">
                </p>
                <p>
                    <label for="no_telepon">No Telepon: </label>
                    <input type="text" name="no_telepon" placeholder="No Telepon" />
                </p>
                <p>
                    <input type="submit" value="Daftar" name="daftar" />
                </p>

                </fieldset>
    </form>

    </body>
</html>