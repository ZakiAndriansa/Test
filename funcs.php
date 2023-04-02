<?php 

/** fungsi untuk connect ke database */
function conn(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kafe";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Koneksi Gagal: " . mysqli_connect_error());
    }
    return $conn;
}

// Fungsi kopi
/** fungsi untuk menampilkan data kopi */
function queryKopi() {
    $conn = conn();
    $sql = "SELECT * FROM kopi";
    $result = mysqli_query($conn, $sql);
    //biar ketika data di table kopi kosong, $rows tidak undefined
    $rows = [];
    while ($row = mysqli_fetch_array($result)){
        $rows[] = $row;
    }
    return $rows;
}

function upload(){
        
    // Mengambil data dari tiap key dari array associative yang dihasilkan dari atribut enctype
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];


    // Cek apakah tidak ada gambar yang diupload
    if( $error === 4 ){
        echo "<script>
            alert('Pilih gambar terlebih dahulu!')
        </script>";

        // Menggagalkan function
        return false;
    }

    // Cek apakah gambar atau bukan yang di upload

    // Membuat array untuk menentukan ekstensi file apa saja yang diizinkan untuk diupload
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'jfif'];

    // Memecah string untuk mendapatkan ekstensi filenya
    $ekstensiGambar = explode('.', $namaFile);

    // Mengambil array paling belakang untuk memastikan yang didapat benar-benar ekstensi filenya
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
        echo "<script>
            alert('Yang anda upload bukan gambar!')
        </script>";

        return false;
    }

    // Cek jika ukurannya terlalu besar
    if( $ukuranFile > 20000000 ){
        echo "<script>
            alert('Ukuran gambar terlalu besar!')
        </script>";

        return false;
    }


    // Membuat nama file baru untuk menghindari kejadian penamaan yang sama
    $namaFileBaru = uniqid() . $ekstensiGambar;

    // Kondisi
    $aksi = $_GET['action'];

    switch ($aksi){
        case 'insert_kopi' : 
        case 'update_kopi' :
            move_uploaded_file($tmpName, 'img/menu/' . $namaFileBaru);
            break;

        case 'insert_customer' : 
        case 'update_customer' :
            move_uploaded_file($tmpName, 'img/customer/' . $namaFileBaru);
            break;

    }

    // Mengembalikan nama filenya beserta dengan ekstensi filenya
    return $namaFileBaru;

}

/** fungsi untuk query insert data kopi */
function insertKopi($nama_kopi, $harga){
    $gambar = upload();
    $conn = conn();
    $sql = "INSERT INTO kopi VALUES ('', '$nama_kopi','$harga', '$gambar')";
    $result = mysqli_query($conn, $sql);
    return $result;
}

/** fungsi untuk menampilkan data kopi berdasarkan id_kopi tertentu */
function queryIDKopi($id_kopi){
    $conn = conn();
    $sql = "SELECT * FROM kopi WHERE id_kopi = '$id_kopi'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    return $row;
}

/** fungsi untuk query edit data kopi*/
function updateKopi($id_kopi, $nama_kopi, $harga){
    $conn = conn();

    // Cek apakah user meng-upload gambar baru
    if( $_FILES["gambar"]["error"] === 4 ){
        $gambar_baru = $gambar;
    } else {
        $gambar_baru = upload();
    }

    $sql = "UPDATE kopi SET nama_kopi ='$nama_kopi', harga ='$harga', gambar='$gambar_baru' WHERE id_kopi ='$id_kopi'";
    $result = mysqli_query($conn, $sql); 

    return $result;
}

/** fungsi untuk query hapus data kopi */
function deleteKopi($id_kopi){
    $conn = conn();
    $sql = "DELETE FROM kopi where id_kopi = '$id_kopi'";
    $result = mysqli_query($conn,$sql);
    return $result;
}




// Fungsi Pelanggan
/** fungsi untuk menampilkan data pelanggan */
function queryPelanggan() {
    $conn = conn();
    $sql = "SELECT * FROM pelanggan";
    $result = mysqli_query($conn,$sql);
    $rows = [];
    while($row = mysqli_fetch_array($result)){
        $rows[] = $row;
    }
    return $rows;
}

/** fungsi untuk query insert data pelanggan */
function insertPelanggan($nama_pelanggan, $email, $no_tlp){
    $conn = conn();
    $gambar = upload();
    $sql = "INSERT INTO pelanggan VALUES ('', '$nama_pelanggan', '$email', '$no_tlp', '$gambar')";
    $result = mysqli_query($conn,$sql);
    return $result;
}

/** fungsi untuk menampilkan data pelanggan berdasarkan id_pelanggan tertentu */
function queryIDPelanggan($id_pelanggan){
    $conn = conn();
    $sql = "SELECT * from pelanggan WHERE id_pelanggan = '$id_pelanggan'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    return $row;
}

/** fungsi untuk query edit data pelanggan */
function updatePelanggan($id_pelanggan, $nama_pelanggan, $email, $no_tlp){
    $conn = conn();

    // Cek apakah user meng-upload gambar baru
    if( $_FILES["gambar"]["error"] === 4 ){
        $gambar_baru = $gambar;
    } else {
        $gambar_baru = upload();
    }

    $sql = "UPDATE pelanggan SET nama_pelanggan = '$nama_pelanggan', email = '$email', no_tlp = '$no_tlp', gambar = '$gambar_baru' WHERE id_pelanggan = '$id_pelanggan'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

/**fungsi untuk query hapus data pelanggan */
function deletePelanggan($id_pelanggan) {
    $conn = conn();
    $sql = "DELETE FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

/** fungsi untuk mendapatkan nilai id_kopi, nama_kopi dan harga dari tabel kopi untuk digunakan sebagai option di form*/
function fetchKopi(){
    $conn = conn();
    $sql = "SELECT id_kopi, nama_kopi, harga FROM kopi";
    $result = mysqli_query($conn, $sql);
    $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $options;
}

/** fungsi untuk mendapatkan nilai id_pelanggan, nama_pelanggan dan harga dari tabel pelanggan untuk digunakan sebagai option di form*/
function fetchPelanggan(){
    $conn = conn();
    $sql = "SELECT id_pelanggan, nama_pelanggan FROM pelanggan";
    $result = mysqli_query($conn, $sql);
    $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $options;
}

/** fungsi untuk menampilkan data transaksi berdasarkan id_transaksi tertentu */
function queryIDTransaksi($id_transaksi){
    $conn = conn();
    $sql = "SELECT transaksi.id_transaksi, pelanggan.id_pelanggan, kopi.id_kopi, pelanggan.nama_pelanggan, kopi.nama_kopi, transaksi.jumlah, transaksi.harga, transaksi.total FROM pelanggan INNER JOIN transaksi ON pelanggan.id_pelanggan = transaksi.id_pelanggan INNER JOIN kopi ON kopi.id_kopi = transaksi.id_kopi WHERE transaksi.id_transaksi = '$id_transaksi'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    return $row;
}



// Fungsi untuk transaksi
/** fungsi untuk menampilkan data transaksi */
function queryTransaksi(){
    $conn = conn();
    $sql = "SELECT transaksi.id_transaksi, transaksi.jumlah, transaksi.harga, transaksi.total, pelanggan.id_pelanggan, pelanggan.nama_pelanggan, kopi.id_kopi, kopi.nama_kopi FROM pelanggan INNER JOIN transaksi on pelanggan.id_pelanggan = transaksi.id_pelanggan INNER JOIN kopi ON kopi.id_kopi = transaksi.id_kopi ORDER by id_transaksi";
    $result = mysqli_query($conn,$sql);
    $rows = [];
    while($row = mysqli_fetch_array($result)){
        $rows[] = $row;
    }
    return $rows;
}

/** fungsi untuk mendapat harga kopi */
function queryHargaKopi($id_kopi){
    $conn = conn();
    $sql = "SELECT harga FROM kopi WHERE id_kopi = '$id_kopi'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    return $row;
}

/** fungsi untuk query insert data transaksi */
function insertTransaksi($id_pelanggan, $id_kopi, $jumlah, $tanggal, $harga, $total_harga){
    $conn = conn();
    $sql = "INSERT INTO transaksi VALUES ('','$id_kopi','$id_pelanggan', $tanggal, $harga, $jumlah, $total_harga)";
    $result = mysqli_query($conn, $sql);
    return $result;
}

/** fungsi untuk query edit data transaksi */
function updateTransaksi($id_transaksi, $id_pelanggan, $id_kopi, $jumlah, $harga, $total_harga){
    $conn = conn();
    $sql = "UPDATE transaksi SET id_pelanggan = '$id_pelanggan', id_kopi = '$id_kopi', jumlah = '$jumlah', harga = '$harga', total = '$total_harga' WHERE id_transaksi = '$id_transaksi'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

/** fungsi untuk query hapus data transaksi */
function deleteTransaksi($id_transaksi){
    $conn = conn();
    $sql = "DELETE FROM transaksi WHERE id_transaksi = '$id_transaksi'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

/** fungsi untuk query cek email dan password ada atau tidak di database */
function cekLogin($email, $password){
    $conn = conn();
    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

?> 