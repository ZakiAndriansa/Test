<?php 
require "db.php";

$id_buku = $_GET["id_buku"];
$result = deleteBuku($id_buku);

if(!$result) {
    echo "<script>    
        alert('gagal hapus');
        location.href = 'data_buku.php';
    </script>";
} else {
    echo "<script>
        alert('berhasil hapus');     
        location.href = 'data_buku.php';
    </script>";
}
?>