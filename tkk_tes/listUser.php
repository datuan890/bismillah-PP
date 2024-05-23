<?php

include('./koneksi.php');
include('./head.php');

?>

<table class="table table-striped mt-4">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Aksi</th> 
    </tr>
  </thead>
  <tbody>
    <?php
        if ($result && mysqli_num_rows($result) > 0) {
            // Menampilkan setiap baris data dalam tabel HTML
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "<td> , <a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger'>DELETE</a>
                <a href='update.php?id=" . $row['id'] ."' class='btn btn-primary'>UPDATE</a>
                </tr>";
            }
            echo "</table>";
        } else {
            echo "Tidak ada data ditemukan.";
        }
    ?>
  </tbody>
</table>