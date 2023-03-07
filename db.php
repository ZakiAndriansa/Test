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

/** fungsi untuk menampilkan data pelanggan */
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


/** fungsi untuk query insert data buku */
function insertBook($nama_buku, $pengarang, $harga){
    $conn = conn();
    $sql = "INSERT INTO buku (nama_buku, pengarang, harga) VALUES ('$nama_buku','$pengarang','$harga')";
    $result = mysqli_query($conn, $sql);
    return $result;
}

/** fungsi untuk menampilkan data buku berdasarkan id_buku tertentu */
function getBookbyID($id_buku){
    $conn = conn();
    $sql = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    return $row;
}

/** fungsi untuk query edit data buku*/
function updateBook($id_buku, $nama_buku, $pengarang, $harga){
    $conn = conn();
    $sql = "UPDATE buku SET nama_buku ='$nama_buku', pengarang ='$pengarang', harga ='$harga' WHERE id_buku ='$id_buku'";
    $result = mysqli_query($conn, $sql); 
    return $result;
}

/** fungsi untuk query hapus data buku */
function deleteBook($id_buku){
    $conn = conn();
    $sql = "DELETE FROM buku where id_buku = '$id_buku'";
    $result = mysqli_query($conn,$sql);
    return $result;
}

/** fungsi untuk query insert data pelanggan */
function insertCustomers($nama_pelanggan, $email, $no_hp){
    $conn = conn();
    $sql = "INSERT INTO pelanggan (nama_pelanggan, email, no_hp) VALUES ('$nama_pelanggan', '$email', $no_hp)";
    $result = mysqli_query($conn,$sql);
    return $result;
}

/** fungsi untuk menampilkan data pelanggan berdasarkan id_pelanggan tertentu */
function getCustomerbyID($id_pelanggan){
    $conn = conn();
    $sql = "SELECT * from pelanggan WHERE id_pelanggan = '$id_pelanggan'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    return $row;
}

/** fungsi untuk query edit data pelanggan */
function updateCustomer($id_pelanggan, $nama_pelanggan, $email, $no_hp){
    $conn = conn();
    $sql = "UPDATE pelanggan SET nama_pelanggan = '$nama_pelanggan', email = '$email', no_hp = '$no_hp' WHERE id_pelanggan = '$id_pelanggan'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

/**fungsi untuk query hapus data pelanggan */
function deleteCustomer($id_pelanggan) {
    $conn = conn();
    $sql = "DELETE FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

/** fungsi untuk mendapatkan nilai id_buku, nama_buku dan harga dari tabel buku untuk digunakan sebagai option di form*/
function fetchBooks(){
    $conn = conn();
    $sql = "SELECT id_buku, nama_buku, harga FROM buku";
    $result = mysqli_query($conn, $sql);
    $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $options;
}

/** fungsi untuk mendapatkan nilai id_pelanggan, nama_pelanggan dan harga dari tabel pelanggan untuk digunakan sebagai option di form*/
function fetchCustomers(){
    $conn = conn();
    $sql = "SELECT id_pelanggan, nama_pelanggan FROM pelanggan";
    $result = mysqli_query($conn, $sql);
    $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $options;
}

/** fungsi untuk menampilkan data transaksi berdasarkan id_transaksi tertentu */
function getTransactionbyID($id_transaksi){
    $conn = conn();
    $sql = "SELECT transaksi.id_transaksi, pelanggan.id_pelanggan, buku.id_buku, pelanggan.nama_pelanggan, buku.nama_buku, transaksi.kuantitas, transaksi.harga, transaksi.total_pembayaran FROM pelanggan INNER JOIN transaksi ON pelanggan.id_pelanggan = transaksi.id_pelanggan INNER JOIN buku ON buku.id_buku = transaksi.id_buku WHERE transaksi.id_transaksi = '$id_transaksi'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    return $row;
}

/** fungsi untuk mendapat harga buku */
function getHargaBuku($id_buku){
    $conn = conn();
    $sql = "SELECT harga FROM buku WHERE id_buku = '$id_buku'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    return $row;
}

/** fungsi untuk query insert data transaksi */
function insertTransaction($id_pelanggan, $id_buku, $kuantitas, $harga, $total_harga){
    $conn = conn();
    $sql = "INSERT INTO transaksi VALUE ('','$id_pelanggan','$id_buku','$kuantitas','$harga', '$total_harga')";
    $result = mysqli_query($conn, $sql);
    return $result;
}

/** fungsi untuk query edit data transaksi */
function updateTransaction($id_transaksi, $id_pelanggan, $id_buku, $kuantitas, $harga, $total_harga){
    $conn = conn();
    $sql = "UPDATE transaksi SET id_pelanggan = '$id_pelanggan', id_buku = '$id_buku', kuantitas = '$kuantitas', harga = '$harga', total_pembayaran = '$total_harga' WHERE id_transaksi = '$id_transaksi'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

/** fungsi untuk query hapus data transaksi */
function deleteTransaction($id_transaksi){
    $conn = conn();
    $sql = "DELETE FROM transaksi WHERE id_transaksi = '$id_transaksi'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

?> 