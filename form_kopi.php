<?php 
require "funcs.php";

$id_kopi = $_GET["id_kopi"] ?? 0 ; 

if ($id_kopi > 0) {
    $row = queryIDKopi($id_kopi);
    $id_kopi = $row['id_kopi'];
    $nama_kopi = $row['nama_kopi'];
    $harga = $row['harga'];
    $gambar_lama = $row['gambar'];

    $form_action = "action.php?action=update_kopi";
    $title = "Edit Data Kopi";
    $button = "Edit";
}
else {
    $id_kopi = '';
    $nama_kopi = '';
    $harga = '';
    $gambar_lama = '';
    $form_action = 'action.php?action=insert_kopi';
    $title = "Tambah Data Kopi";
    $button = "Tambah";
}
?>

<!DOCTYPE html> 
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

<section>
    <h1><?=$title; ?></h1>
    <br>
    <table>
    <form action="<?=$form_action?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_kopi" value="<?=$id_kopi?>" />
        <input type="hidden" name="gambarLama" id="gambarLama" value="<?=$gambar_lama?>">

        <tr>
            <td>
                <label for="nama_kopi">Nama Kopi : </label>
                <input type="text" name="nama_kopi" value="<?=$nama_kopi?>"/><br>
            </td>
        </tr>

        <tr>
            <td>
                <label for="harga">Harga : </label>
                <input type="number" name="harga" value="<?=$harga?>"/><br>
            </td>
        </tr>

        <tr>
            <td>
                <label for="gambar">Gambar : </label>
                <img src="img/menu/<?=$gambar_lama?>" width="400" alt="menu">
                <input type="file" name="gambar" id="gambar"><br>
            </td>
        </tr>
        <tr>
            <td>
                <button type="submit"><?= $button ?></button>
            </td>
        </tr>
        
    </form>
    </table>
    </section>
</body>
</html>
