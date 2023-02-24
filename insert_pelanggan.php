<?php 
require "db.php";

$id_pelanggan = $_POST['id_pelanggan'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];

mysqli_query($conn, "INSERT INTO pelanggan VALUES ('', '$nama_pelanggan', '$email','$alamat','$no_hp')");
header("location: data_pelanggan.php");
?>