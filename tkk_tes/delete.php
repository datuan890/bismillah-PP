<?php
 include ('./head.php');
  
  if (isset($_GET['id'])){
    $userId = $_GET['id'];
// database
     $servername = "localhost";
     $username = "root";
     $password = "";
      $database = "tkk_crud";

 // Buat koneksi
  $conn = mysqli_connect($servername, $username, $password, $database);

 // Periksa koneksi
 if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
 }
   // preper sql stetment ke delete
   $sql = "DELETE FROM user WHERE id = ?";

   //preper stetmen
   if ($stmt = $conn ->prepare($sql)){

    //parameter id

    $stmt->bind_param("i",$userId);

    //execute the statement

    if($stmt->execute()){
        header("location: listUser.php");
        exit();
    }else{
        echo "error deleting rcord:". $stmt ->error;
    }
    // tutup stetamen

    $stmt ->close();
   } else {
    echo "error preparing statement: " . $conn -> error;
   }
   $conn -> close();
  } else {
    echo "No user ID provided.";
  }
 ?>

 