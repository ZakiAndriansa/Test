<?php 
require "db.php";

$nama_buku = $_POST['nama_buku'];
$pengarang = $_POST['pengarang'];
$harga = $_POST['harga'];
  
$sql = "INSERT INTO buku VALUES ('', '$nama_buku', '$pengarang', '$harga')";
// var_dump($sql);
mysqli_query($conn, $sql );
header("location: data_buku.php");
?>                               