<?php
    require "db.php";

    $result_pelanggan = mysqli_query($conn, "SELECT id_pelanggan, nama_pelanggan FROM pelanggan");
    $result_buku = mysqli_query($conn, "SELECT id_buku, nama_buku, harga FROM buku");

    $options_pelanggan = mysqli_fetch_all($result_pelanggan, MYSQLI_ASSOC );
    $options_buku = mysqli_fetch_all($result_buku, MYSQLI_ASSOC);

    $id_transaksi = $_GET["id_transaksi"];
    $sql = "SELECT transaksi.id_transaksi, pelanggan.id_pelanggan, buku.id_buku, pelanggan.nama_pelanggan, buku.nama_buku, transaksi.kuantitas, transaksi.harga, transaksi.total_pembayaran FROM pelanggan INNER JOIN transaksi ON pelanggan.id_pelanggan = transaksi.id_pelanggan INNER JOIN buku ON buku.id_buku = transaksi.id_buku WHERE transaksi.id_transaksi = '$id_transaksi'";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)):
?>

<!DOCTYPE html>
    <head>
</head>
    <body>
        <form action="edit_transaksi.php"  method="post">
            <input type="hidden" name="id_transaksi" value="<?=$row['id_transaksi']?>">
            <label for="nama_pelanggan">Nama Pelanggan</label>
            <input type="text" id="username" name="username"  value="<?=$row['username']?>">
            
            <label for="nama_buku">Nama Buku</label>
            <input type="text" id="nama_buku" name="nama_buku"  value="<?=$row['nama_buku']?>">

            <label for="harga">Harga</label>
            <input type="number" id="harga" name="harga"  value="<?=$row['harga']?>">

            <label for="kuantitas">kuantitas</label>
            <input type="number" id="kuantitas" name="kuantitas"  value="<?=$row['kuantitas']?>">

            <label for="total_pembayaran">total_pembayaran</label>
            <input type="number" id="total_pembayaran" name="total_pembayaran"  value="<?=$row['total_pembayaran']?>">
            <input type="submit" value="Ubah">

<?php endwhile; ?>
    </form>
    </body>
    </html>