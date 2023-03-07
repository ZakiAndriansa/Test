<?php 

/** fungsi untuk connect ke database */
function conn(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "toko_buku";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Koneksi Gagal: " . mysqli_connect_error());
    }
    return $conn;
}

/** fungsi untuk menampilkan data buku */
function getBooks() {
    $conn = conn();
    $sql = "SELECT * FROM buku";
    $result = mysqli_query($conn,$sql);
    //biar ketika data di table buku kosong, $rows tidak undefined
    $rows = [];
    while ($row = mysqli_fetch_array($result)){
        $rows[] = $row;
    }
    return $rows;
}

/** function untuk menampilkan data pelanggan */
function getCustomers() {
    $conn = conn();
    $sql = "SELECT * FROM pelanggan";
    $result = mysqli_query($conn,$sql);
    $rows = [];
    while($row = mysqli_fetch_array($result)){
        $rows[] = $row;
    }
    return $rows;
}

/** fungsi untuk menampilkan data transaksi */
function getTransaction(){
    $conn = conn();
    $sql = "SELECT transaksi.id_transaksi, transaksi.kuantitas, transaksi.harga, transaksi.total_pembayaran, pelanggan.id_pelanggan, pelanggan.nama_pelanggan, buku.id_buku, buku.nama_buku FROM pelanggan INNER JOIN transaksi on pelanggan.id_pelanggan = transaksi.id_pelanggan INNER JOIN buku ON buku.id_buku = transaksi.id_buku ORDER by id_transaksi";
    $result = mysqli_query($conn,$sql);
    $rows = [];
    while($row = mysqli_fetch_array($result)){
        $rows[] = $row;
    }
    return $rows;
}

/** fungsi untuk menampilkan data buku berdasarkan id_buku tertentu */
function getBookbyID($id_buku){
    $conn = conn();
    $sql = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    return $row;
}


/** fungsi untuk query insert data buku */
function insertBuku($nama_buku, $pengarang, $harga){
    $conn = conn();
    $sql = "INSERT INTO buku (nama_buku, pengarang, harga) VALUES ('$nama_buku','$pengarang','$harga')";
    $result = mysqli_query($conn, $sql);
    return $result;
}

/** fungsi untuk query edit data buku*/
function updateBook($id_buku, $nama_buku, $pengarang, $harga){
    $conn = conn();
    $sql = "UPDATE buku SET nama_buku ='$nama_buku', pengarang ='$pengarang', harga ='$harga' WHERE id_buku ='$id_buku'";
    $result = mysqli_query($conn, $sql); 
    return $result;
}

/** fungsi untuk query hapus data buku */
function deleteBuku($id_buku){
    $conn = conn();
    $sql = "DELETE FROM buku where id_buku = '$id_buku'";
    $result = mysqli_query($conn,$sql);
    return $result;
}

?> 