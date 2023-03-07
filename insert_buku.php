<?php 
require "db.php";

$nama_buku = $_POST['nama_buku'];
$pengarang = $_POST['pengarang'];
$harga = $_POST['harga'];
  
$result = insertBuku($nama_buku,$pengarang,$harga);
if ($result) {
    echo "<script>
            alert('Tambah Berhasil');
            location.href = 'data_buku.php';
    </script>";
} else {
    echo "<script>
            alert('Tambah Gagal');
            location.href = 'data_buku.php';
    </script>";
}
?>                               