<?php
for($i=1; $i<=5; $i++){
  echo "$i";
}
?>

<!DOCTYPE html>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Penjualan</title>
    <!-- <link rel="stylesheet" href="css/bootstrap-grid.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" /> -->
    <link
      href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&family=Roboto+Condensed&display=swap"
      rel="stylesheet"
    />
</head>

<body>
<nav>
    <ul>
        <li><a href="">Beranda</a></li>
        <li><a href="data_buku.php">Data Buku</a></li>
        <li><a href="data_pelanggan.php">Data Pelanggan</a></li>
        <li><a href="data_transaksi.php">Data Transaksi</a></li>
    </ul>
</nav>
    <h2> Masukkan Data Pelanggan </h2>
    <form action="insert_pelanggan.php" method="post">
        <input type="hidden" name="id_pelanggan"><br>
        <!-- <label for="nama_pelanggan">Nama Pelanggan</label><br> -->
        Username
        <input type="text" id="nama_pelanggan" name="nama_pelanggan">
        <!-- <label for="email">Email Pelanggan</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="alamat">Alamat Pelanggan</label><br>
        <input type="alamat" id="alamat" name="alamat"><br>
        <label for="no_hp">No. HP</label><br>
        <input type="text" id="no_hp" name="no_hp"><br>  -->
        <input type="submit" value="kirim">

    </form>
</body>
<html>