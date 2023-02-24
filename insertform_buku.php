<!DOCTYPE html>
<html>
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
        <li><a href="">Beranda</a></li>
        <li><a href="data_buku.php">Data Buku</a></li>
        <li><a href="data_pelanggan.php">Data Pelanggan</a></li>
        <li><a href="data_transaksi.php">Data Transaksi</a></li>
    </ul>
</nav>
    <h2> Masukkan Data Buku </h2>
    <form action="insert_buku.php" method="post">
        <input type="hidden" name="id_buku" >
        <label for="nama_buku">Nama Buku</label>
        <input type="text" id="nama_buku" name="nama_buku" placeholder="Nama buku..">
        <label for="pengarang">Nama Pengarang</label>
        <input type="text" id="pengarang" name="pengarang" placeholder="Nama pengarang..">
        <label for="harga">Harga</label>
        <input type="number" id="harga" name="harga" placeholder="harga buku..">
        <input type="submit" value="tambah">
    </form>
</body>
</html>