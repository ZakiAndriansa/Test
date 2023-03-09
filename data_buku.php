<?php 
require 'db.php';

?>

<!Doctype html>
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Penjualan</title>
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
        <h2>Data Buku Toko ABCDE</h2>
        <a href="form_buku.php" class="add-button">Tambah Data Buku</a>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th class="aksi">ID Buku</th>
                    <th>Nama Buku</th>
                    <th>Pengarang</th>
                    <th>Harga</th>
                    <th class="aksi">Aksi</th>
                </tr>  
            </thead>  
            <tbody> 
                <?php 
                    $no = 1;
                    foreach (getBooks() as $row){ ?>
                <tr>
                    <td class="center-align"><?= $no++ ?></td>
                    <td class="center-align"><?= $row['id_buku'] ?></td>
                    <td><?= $row['nama_buku'] ?></td>
                    <td><?= $row['pengarang'] ?></td>
                    <td><?= $row['harga'] ?></td>
                    <td class="center-align">
                        <a href="form_buku.php?id_buku=<?= $row['id_buku']?>" class="edit-button">Edit</a>
                        <a href="action.php?id_buku=<?= $row['id_buku']?>&action=delete_book" class="del-button">Hapus</a>
                    </td>   
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body> 
</html>