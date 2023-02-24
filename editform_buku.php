<?php 
require "db.php";
$id_buku = $_GET["id_buku"];
$sql = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)):
?>

<!DOCTYPE html> 
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Penjualan</title>
    <link rel="stylesheet" href="css/bootstrap-grid.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&family=Roboto+Condensed&display=swap"
      rel="stylesheet"
    />
</head>

<body>
<nav>
    <ul>
        <li><a href="welcome.php">Beranda</a></li>
        <li><a href="data_buku.php">Data Buku</a></li>
        <li><a href="data_pelanggan.php">Data Pelanggan</a></li>
        <li><a href="data_transaksi.php">Data Transaksi</a></li>
    </ul>
</nav>
    <h2> Edit Data Buku </h2>
    <form action="edit_bu`ku.php" method="post">
        <input type="hidden" name="id_buku" value="<?=$row['id_buku']?>" />
        <label for="nama_buku">Nama Buku</label>
        <input type="text" name="nama_buku" value="<?=$row['nama_buku']?>"/><br>
        <label for="pengarang">Pengarang</label>
        <input type="text" name="pengarang" value="<?=$row['pengarang']?>" /><br>
        <label for="harga">Harga</label>
        <input type="text" name="  " value="<?=$row['harga']?>"/><br>
        <input type="submit" value="Ubah"/>
    </form>
 <?php endwhile ?>
</body>
</html>
