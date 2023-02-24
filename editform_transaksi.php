<?php 
require "db.php";
$result_pelanggan = mysqli_query($conn, "SELECT id_pelanggan, nama_pelanggan FROM pelanggan");
$result_buku = mysqli_query($conn, "SELECT id_buku, nama_buku, harga FROM buku");

$options_pelanggan = mysqli_fetch_all($result_pelanggan, MYSQLI_ASSOC );
$options_buku = mysqli_fetch_all($result_buku, MYSQLI_ASSOC );

$id_transaksi = $_GET['id_transaksi'];
$sql = "SELECT transaksi.id_transaksi, pelanggan.id_pelanggan, buku.id_buku, pelanggan.nama_pelanggan, buku.nama_buku, transaksi.kuantitas, transaksi.harga, transaksi.total_pembayaran FROM pelanggan INNER JOIN transaksi ON pelanggan.id_pelanggan = transaksi.id_pelanggan INNER JOIN buku ON buku.id_buku = transaksi.id_buku WHERE transaksi.id_transaksi = '$id_transaksi'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)): 
?>
<!DOCTYPE html>
<head>
</head>

<body>
<form action="edit_transaksi.php" method="post">
    <input type="hidden" name="id_transaksi" value="<?=$row['id_transaksi']?>" />

    <label for="nama_pelanggan">Nama Pelanggan</label>
    <select name="id_pelanggan" id="nama_pelanggan"><?=$row['nama_pelanggan']?>
        <?php foreach ($options_pelanggan as $option) { 
            $selected = $option['id_pelanggan']==$row['id_pelanggan'] ? 'selected' : '';
        ?>
        <option value="<?=$option['id_pelanggan']?>" <?= $selected ?>><?=$option['nama_pelanggan']?></option>
        <?php } ?>
    </select><br>

    <label for="nama_buku">Nama Buku</label>
    <select name="id_buku" id="nama_buku"><?=$row['nama_buku']?>
        <?php foreach ($options_buku as $option) {
            $selected = $option['id_buku']==$row['id_buku'] ? 'selected' : ''; 
        ?>
        <option value="<?=$option['id_buku']?>" 
            <?= $selected?>><?=$option['nama_buku'] . ' - Rp ' .  $option['harga']?>
        </option>
        <?php } ?> 
    </select><br>

    <label for="kuantitas">Qty</label>
    <input type="text" name="kuantitas" id="kuantitas" value="<?=$row['kuantitas']?>"></input><br>
    <input type="submit" value="Ubah">
    <?php endwhile; ?>

</form>
</body>


