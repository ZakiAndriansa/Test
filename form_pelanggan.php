<?php
require "funcs.php";

// $id_pelanggan = $_GET['id_pelanggan'];
$id_pelanggan = $_GET['id_pelanggan'] ?? 0;
// $id_pelanggan = !empty($_GET['id_pelanggan']) ? $_GET['id_pelanggan'] : 0;

if ($id_pelanggan > 0 ) {
    $row = queryIDPelanggan($id_pelanggan);
    $id_pelanggan = $row['id_pelanggan'];
    $nama_pelanggan = $row['nama_pelanggan'];
    $email = $row['email'];
    $no_tlp = $row['no_tlp'];
    $gambar_lama = $row['gambar'];

    $form_action = "action.php?action=update_customer";
    $title = "Edit Data Pelanggan";
} else {
    $id_pelanggan = '';
    $nama_pelanggan = '';
    $email = '';
    $no_tlp = '';
    $gambar_lama = '';
    
    $form_action = "action.php?action=insert_customer";
    $title = "Tambah Data Pelanggan";
}
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
            <li><a href="data_kopi.php">Data Kopi</a></li>
            <li><a href="data_pelanggan.php">Data Pelanggan</a></li>
            <li><a href="data_transaksi.php">Data Transaksi</a></li>
        </ul>
    </nav>

    <section>
        <table>
            <h1> Edit Data Pelanggan </h1>
            <br>
            <form action="<?=$form_action?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_pelanggan" value="<?=$id_pelanggan?>" required/>
            <input type="hidden" name="gambarLama" id="gambarLama" value="<?=$gambar_lama?>">
            <tr>
                <td>
                    <label for="nama_pelanggan">Nama Pelanggan : </label>
                    <input type="text" id="nama_pelanggan" name="nama_pelanggan" value="<?=$nama_pelanggan?>" required/>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="email">Email : </label>
                    <input type="email" id="email" name="email" value="<?=$email?>" required/><br>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="no_tlp">No. HP : </label>
                    <input type="text" id="no_tlp" name="no_tlp" value="<?=$no_tlp?>" required/><br>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="gambar">Gambar : </label>
                    <img src="img/customer/<?=$gambar_lama?>" width="400" alt="customer">
                    <input type="file" name="gambar" id="gambar"><br>
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" value="Simpan">
                </td>
            </tr>
            </form>
        </table>
    </section>
</body>
</html> 