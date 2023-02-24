<?php 
include "db.php";
$id_buku = $_GET['id_buku'];
$sql = "SELECT * FROM buku WHERE id_buku = $id_buku";
$result= mysqli_query($conn, $sql);
while ( $row = mysqli_fetch_array($result)) : 
?>

<!DOCTYPE html>
<head></head>
<body>
    <form method="post" action="update_buku.php">
        <input type="hidden" name="id_buku" value="<?=$row['id_buku'] ?>">
        <label for = "nama_buku">Nama Buku</label>
        <input type="text" id="nama_buku" name="nama_buku" value="<?=$row['nama_buku'] ?>"></br>
        <label for="pengarang">Pengarang</label>
        <input type="text" id="pengarang" name="pengarang" value="<?=$row['pengarang'] ?>"></br>
        <label for="harga">Harga</label>
        <input type="number" id="harga" name="harga" value="<?=$row['harga'] ?>">
        <input type="submit" value="Simpan">
    </form>
</body>
</html>

<?php endwhile ?>