<?php
require "db.php";


$aksi = $_GET['action'];

switch ($aksi) {
    case 'insert_book':
        $result = insertBook($_POST['nama_buku'], $_POST['pengarang'], $_POST['harga']);
        if ($result) {
            $msg = "Tambah Buku Berhasil";
            $loc = "data_buku.php";
        } else {
            $msg = "Tambah Buku Gagal";
            $loc = "data_buku.php";
        }
        break;
    case 'update_book':
        // $id_buku = $_POST['id_buku'];
        // $nama_buku = $_POST['nama_buku'];
        // $pengarang = $_POST['pengarang'];
        // $harga = $_POST['harga'];
        // $result = updateBook($id_buku, $nama_buku, $pengarang, $harga);
        $result = updateBook($_POST['id_buku'], $_POST['nama_buku'], $_POST['pengarang'], $_POST['harga']);
        if ($result) {
            $msg = "Edit Buku Berhasil";
            $loc = "data_buku.php";
        } else {
            $msg = "Edit Buku Gagal";
            $loc = "data_buku.php";
        }
        break;
    case 'delete_book':
        $result = deleteBook($_GET['id_buku']);
        if ($result) {
            $msg = "Hapus Buku Berhasil";
            $loc = "data_buku.php";
        } else {
            $msg = "Hapus Buku Gagal";
            $loc = "data_buku.php";
        }
        break;
    case 'insert_customer':
        $result = insertCustomers($_POST['nama_pelanggan'], $_POST['email'], $_POST['no_hp']);
        if ($result) {
            $msg = "Tambah Pelanggan Berhasil";
            $loc = "data_pelanggan.php";
        } else {
            $msg = "Tambah Pelanggan Gagal";
            $loc = "data_pelanggan.php";
        }
        break;
    case 'update_customer':
        $result = updateCustomer($_POST['id_pelanggan'], $_POST['nama_pelanggan'], $_POST['email'], $_POST['no_hp']);
        if ($result) {
            $msg = "Edit Pelanggan Berhasil";
            $loc = "data_pelanggan.php";
        } else {
            $msg = "Edit Pelanggan Gagal";
            $loc = "data_pelanggan.php";
        }
        break;
    case 'delete_customer':
        $result = deleteCustomer($_GET['id_pelanggan']);
        if ($result) {
            $msg = "Hapus Pelanggan Berhasil";
            $loc = "data_pelanggan.php";
        } else {
            $msg = "Hapus Pelanggan Gagal";
            $loc = "data_pelanggan.php";
        }
        break;
    case 'insert_transaction':
        $id_buku = $_POST['id_buku'];
        $row = getHargaBuku($id_buku);
        $harga = $row['harga'];
        $total_harga = $harga * $_POST['kuantitas'];
        $result = insertTransaction($_POST['id_pelanggan'], $_POST['id_buku'], $_POST['kuantitas'], $harga, $total_harga);
        if ($result) {
            $msg = "Tambah Transaksi Berhasil";
            $loc = "data_transaksi.php";
        } else {
            $msg = "Tambah Transaksi Gagal";
            $loc = "data_transaksi.php";
        }
        break;
    case 'update_transaction':
        $id_buku = $_POST['id_buku'];
        $row = getHargaBuku($id_buku);
        $harga = $row['harga'];
        $total_harga = $harga * $_POST['kuantitas'];
        $result = updateTransaction($_POST['id_transaksi'], $_POST['id_pelanggan'], $_POST['id_buku'], $_POST['kuantitas'], $harga, $total_harga);
        if ($result) {
            $msg = "Edit Transaksi Berhasil";
            $loc = "data_transaksi.php";
        } else {
            $msg = "Edit Transaksi Gagal";
            $loc = "data_transaksi.php";
        }
        break;       
    case 'delete_transaction':
        $result = deleteTransaction($_GET['id_transaksi']);
        if ($result) {
            $msg = "Hapus Transaksi Berhasil";
            $loc = "data_transaksi.php";
        } else {
            $msg = "Hapus Transaksi Gagal";
            $loc = "data_transaksi.php";
        }
        break; 
 }

if (!empty($msg)){
    echo "<script>
        alert('$msg');
        location.href = '$loc';
    </script>";
}

?>