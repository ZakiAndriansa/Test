<?php 
require "db.php";

$id_pelanggan = $_POST['id_pelanggan'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];

mysqli_query($conn, "UPDATE pelanggan SET nama_pelanggan = '$nama_pelanggan', email = '$email', no_hp = '$no_hp' WHERE id_pelanggan = '$id_pelanggan'") ;
header("location:data_pelanggan.php");

?>