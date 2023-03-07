<?php 
require "db.php";

$id_buku = $_POST['id_buku'];
$nama_buku = $_POST['nama_buku'];
$pengarang = $_POST['pengarang'];
$harga = $_POST['harga'];
$result = updateBook($id_buku, $nama_buku, $pengarang, $harga);

if ($result) {
    echo "<script>
            alert('Edit Berhasil');
            location.href = 'data_buku.php';
    </script>";
} else {
    echo "<script>
            alert('Edit Gagal');
            location.href = 'data_buku.php';
    </script>";
}
?>