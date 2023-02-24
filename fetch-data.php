<?php

$result_pelanggan = mysqli_query($conn, "SELECT id_pelanggan, nama_pelanggan FROM pelanggan");
$result_buku = mysqli_query($conn, "SELECT id_buku, nama_buku, harga FROM buku");

$options_pelanggan = mysqli_fetch_all($result_pelanggan, MYSQLI_ASSOC );
$options_buku = mysqli_fetch_all($result_buku, MYSQLI_ASSOC );

?>