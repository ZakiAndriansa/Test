<?php 
require "funcs.php";

?>

<!DOCTYPE html>
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Penjualan</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap-grid.css" type="text/css" />
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Roboto:wght@500&family=Work+Sans:wght@300&display=swap" rel="stylesheet">
</head>

<body>
<nav>
    <ul>
        <li><a href="welcome.php">Beranda</a></li>
        <li><a href="data_kopi.php">Data Kopi</a></li>
        <li><a href="data_pelanggan.php">Data Pelanggan</a></li>
        <li><a href="data_transaksi.php">Data Transaksi</a></li>
    </ul>
</nav>
<div class="container">
    <h1>Data Transaksi</h1>
    <a href="form_transaksi.php?" class="add-button">Tambah Data Transaksi</a>
    <table>
        <tr>
            <th class="aksi">Id</th>
            <th class="aksi3">Aksi</th>
            <th>Nama Pelanggan</th>
            <th>Nama Kopi</th>
            <th>Total Pembelian</th>
            <th>Harga</th>
            <th>Total Harga</th>
        </tr>
        <?php foreach (queryTransaksi() as $row){ 
            $total_pembayaran = $row['jumlah'] * $row['harga'] 
        ?> 
        <tr>
            <td class="center-align"><?=$row['id_transaksi']?></td>
            <td class="center-align">
                <a href="form_transaksi.php?id_transaksi=<?=$row['id_transaksi']?>" class="edit-button">Edit</a>
                <a href="action.php?id_transaksi=<?=$row['id_transaksi']?>&action=delete_transaction" class="del-button">Hapus</a>
            </td>
            <td><?=$row['nama_pelanggan']?></td>
            <td><?=$row['nama_kopi']?></td>
            <td><?=$row['jumlah']?></td>
            <td>IDR <?=$row['harga']?>K</td>
            <td >IDR <?=$total_pembayaran ?>K</td>
        </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>