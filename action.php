<?php
require "funcs.php";
$aksi = $_GET['action'];

switch ($aksi) {
    // Aksi untuk kopi
    // aksi untuk insert ke data kopi
    case 'insert_kopi':
        $nama_kopi = $_POST['nama_kopi'];
        $harga = $_POST['harga'];
        $result = insertKopi($nama_kopi, $harga);
        if ($result) {
            $msg = "Tambah Kopi Berhasil";
            $loc = "data_kopi.php";
        } else {
            $msg = "Tambah Kopi Gagal";
            $loc = "data_kopi.php";
        }
        break;

    // aksi untuk edit data kopi
    case 'update_kopi':
        $id_kopi = $_POST["id_kopi"];
        $nama_kopi = $_POST['nama_kopi'];
        $harga = $_POST['harga'];
        $result = updateKopi($id_kopi, $nama_kopi, $harga);
        if ($result) {
            $msg = "Edit Kopi Berhasil";
            $loc = "data_kopi.php";
        } else {
            $msg = "Edit Kopi Gagal";
            $loc = "data_kopi.php";
        }
        break;
    //aksi untuk delete data kopi
    case 'delete_kopi':
        $result = deleteKopi($_GET['id_kopi']);
        if ($result) {
            $msg = "Hapus Kopi Berhasil";
            $loc = "data_kopi.php";
        } else {
            $msg = "Hapus Kopi Gagal";
            $loc = "data_kopi.php";
        }
        break;

    
    // Aksi Pelanggan
    //aksi untuk insert data pelanggan
    case 'insert_customer':
        $result = insertPelanggan($_POST['nama_pelanggan'], $_POST['email'], $_POST['no_hp'], $_POST['gambar_lama']);
        if ($result) {
            $msg = "Tambah Pelanggan Berhasil";
            $loc = "data_pelanggan.php";
        } else {
            $msg = "Tambah Pelanggan Gagal";
            $loc = "data_pelanggan.php";
        }
        break;
    //aksi untuk edit data pelanggan
    case 'update_customer':
        $result = updatePelanggan($_POST['id_pelanggan'], $_POST['nama_pelanggan'], $_POST['email'], $_POST['no_tlp']);
        if ($result) {
            $msg = "Edit Pelanggan Berhasil";
            $loc = "data_pelanggan.php";
        } else {
            $msg = "Edit Pelanggan Gagal";
            $loc = "data_pelanggan.php";
        }
        break;
    //aksi untuk delete data pelanggan
    case 'delete_customer':
        $result = deletePelanggan($_GET['id_pelanggan']);
        if ($result) {
            $msg = "Hapus Pelanggan Berhasil";
            $loc = "data_pelanggan.php";
        } else {
            $msg = "Hapus Pelanggan Gagal";
            $loc = "data_pelanggan.php";
        }
        break;
    //aksi untuk insert data transaksi
    case 'insert_transaction':
        $id_kopi = $_POST['id_kopi'];
        $row = queryHargaKopi($id_kopi);
        $harga = $row['harga'];
        $total_harga = $harga * $_POST['jumlah'];
        $result = insertTransaksi($_POST['id_pelanggan'], $_POST['id_kopi'], $_POST['jumlah'], $_POST['tanggal'], $harga, $total_harga);
        if ($result) {
            $msg = "Tambah Transaksi Berhasil";
            $loc = "data_transaksi.php";
        } else {
            $msg = "Tambah Transaksi Gagal";
            $loc = "data_transaksi.php";
        }
        break;
    //aksi untuk edit data transaksi
    case 'update_transaction':
        $id_kopi = $_POST['id_kopi'];
        $row = queryHargaKopi($id_kopi);
        $harga = $row['harga'];
        $total_harga = $harga * $_POST['jumlah'];
        $result = updateTransaksi($_POST['id_transaksi'], $_POST['id_pelanggan'], $_POST['id_kopi'], $_POST['jumlah'], $harga, $total_harga);
        if ($result) {
            $msg = "Edit Transaksi Berhasil";
            $loc = "data_transaksi.php";
        } else {
            $msg = "Edit Transaksi Gagal";
            $loc = "data_transaksi.php";
        }
        break;       
    //aksi untuk delete data transaksi
    case 'delete_transaction':
        $result = deleteTransaksi($_GET['id_transaksi']);
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