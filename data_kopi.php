<?php 
require 'funcs.php';

?>

<!Doctype html>
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Penjualan</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap-grid.css" type="text/css" />
    <!-- Style -->
    <link rel="stylesheet" href="css/style-css.css" type="text/css" />
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
        <h1>Data Menu Kopi</h1>
        <a href="form_kopi.php" class="add-button">Tambah Data Kopi</a>
        <table>
            <thead>
                <tr>
                    
                    <th class="aksi">ID Kopi</th>
                    <th class="aksi">Aksi</th>
                    <th>Nama Kopi</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                </tr>  
            </thead>  
            <tbody> 
                <?php
                    foreach (queryKopi() as $row): ?>
                <tr>
                    
                    <td><?= $row['id_kopi'] ?></td>
                    <td class="center-action">
                        <a href="form_kopi.php?id_kopi=<?= $row['id_kopi']?>" class="edit-button">Edit</a>
                        <a href="action.php?id_kopi=<?= $row['id_kopi']?>&action=delete_kopi" class="del-button">Hapus</a>
                    </td>
                    <td><?= $row['nama_kopi'] ?></td>
                    
                    <td>IDR <?= $row['harga'] ?>K</td> 
                    <td><img src="img/menu/<?= $row['gambar'] ?>" alt="menu" width="200px"></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body> 
</html>