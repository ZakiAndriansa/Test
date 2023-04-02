<?php
 require "funcs.php";

 $id_transaksi = $_GET['id_transaksi'] ?? 0 ;

 if($id_transaksi > 0) {
    $row = queryIDTransaksi($id_transaksi);
    $id_transaksi = $row['id_transaksi'];
    $id_pelanggan = $row['id_pelanggan'];
    $id_kopi = $row['id_kopi'];
    $nama_pelanggan = $row['nama_pelanggan'];
    $nama_kopi = $row['nama_kopi'];
    $jumlah = $row['jumlah'];

    $form_action = "action.php?action=update_transaction";
    $title = "Edit Data Transaksi";
 } else {
    $id_transaksi = '';
    $id_pelanggan = '';
    $id_kopi = '';
    $nama_pelanggan = '';
    $nama_kopi = '';
    $jumlah = '';

    $form_action = "action.php?action=insert_transaction";
    $title = "Tambah Data Transaksi";
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
    <div class="container">

    <section class='sect'>
        <table>
            <h1 style="margin-bottom:20px"><?=$title; ?></h1>
            <form action="<?=$form_action?>" method="post">
            <input type="hidden" name="id_transaksi" value="<?=$id_transaksi?>">
            <tr>
                <td>
                    <!-- pilih nama pelanggan -->
                    <label for="nama_pelanggan">Nama Pelanggan : </label>

                    <select name="id_pelanggan" id="nama_pelanggan">
                        <option disabled selected>Pilih nama pelanggan...</option>
                        <?php foreach (queryPelanggan() as $options) {
                            //tanda (?) untuk if, tanda (:) untuk else
                            $selected = $options['id_pelanggan']==$id_pelanggan ? 'selected': '';
                        ?>
                        <option value = "<?=$options['id_pelanggan']?>" <?=$selected?>>
                            <?=$options['nama_pelanggan'] . ' ~ ' . $options['email'] . ' ~ ' . $options['no_tlp']?>
                        </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <!-- pilih nama buku -->
                    <label for="nama_kopi">Nama Buku : </label>

                    <select name="id_kopi" id="nama_kopi">
                        <option disabled selected>Pilih nama kopi...</option>
                        <?php foreach (queryKopi() as $options) { 
                            $selected = $options['id_kopi']==$id_kopi ? 'selected' : '';
                        ?>
                        <option value="<?=$options['id_kopi']?>" <?=$selected?>>
                            <?=$options['nama_kopi'] . ' ~ IDR ' . $options['harga'] .'K ~'?>
                        </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="tanggal">Tanggal : </label>
                    <input type="date" name="tanggal" id="tanggal">
                </td>
            </tr>

            <tr>
                <td>
                    <!-- input jumlah -->
                    <label for="jumlah">jumlah : </label>

                    <input type="number" id="jumlah" name="jumlah" value="<?=$jumlah?>">
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
</html