<?php 
require "db.php";

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
<div class="container">
    <h2>Data Transaksi Toko ABCDE</h2>
    <a href="insertform_transaksi.php?" class="button3">Tambah Data Transaksi</a>
    <table>
        <tr>
            <th class="aksi">Id Transaksi</th>
            <th>Nama Pelanggan</th>
            <th>Nama Buku</th>
            <th>Qty</th>
            <th>Harga</th>
            <th>Total Harga</th>
            <th class="aksi">Aksi</th>
        </tr>
        <?php foreach (getTransaction() as $row){ 
            $total_pembayaran = $row['kuantitas']*$row['harga'] 
        ?> 
        <tr>
            <td class="center-align"><?=$row['id_transaksi']?></td>
            <td><?=$row['nama_pelanggan']?></td>
            <td><?=$row['nama_buku']?></td>
            <td><?=$row['kuantitas']?></td>
            <td><?=$row['harga']?></td>
            <td ><?=$total_pembayaran ?></td>
            <td class="center-align">
                <a href="editform1_transaksi.php?id_transaksi=<?=$row['id_transaksi']?>" class="button1">Edit</a>
                <a href="delete_transaksi.php?id_transaksi=<?=$row['id_transaksi']?>" class="button2">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>