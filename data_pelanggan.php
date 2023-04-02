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
<h1>Data Pelanggan</h1>
    <a href="form_pelanggan.php" class="add-button">Tambah Data Pelanggan</a>
    <table>
        <tr>
            <th class="aksi">ID</th>
            <th class="aksi2">Aksi</th>
            <th>Nama Pelanggan</th>
            <th>Email</th>
            <th>No Handphone</th>
            <th>Foto</th>
        </tr>
        <?php foreach (queryPelanggan() as $row) { ?>
        <tr>
            <td ><?=$row['id_pelanggan']?></td>
            <td class="center-align">
                <a href="form_pelanggan.php?id_pelanggan=<?=$row['id_pelanggan']?>" class="edit-button">Edit</a>
                <a href="action.php?id_pelanggan=<?=$row['id_pelanggan']?>&action=delete_customer" class="del-button">Hapus</a>
            </td>
            <td><?=$row['nama_pelanggan']?></td>
            <td><?=$row['email']?></td>
            <td><?=$row['no_tlp']?></td>
            <td><img src="img/customer/<?=$row['gambar']?>" alt="customer" width="200px"></td>
        </tr>
        <?php } ?>
    </table>
</div>
 </body>
 </html>