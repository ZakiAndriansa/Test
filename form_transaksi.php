<?php
 require "db.php";
 require "fetch_data.php"
?>

<!DOCTYPE html> 
<head></head>
<body> 
    <form>
        <input type="hidden" name="id_transaksi">
        <label for="nama_pelanggan">Nama Pelanggan</label>
        <select name="nama_pelanggan" id="nama_pelanggan">
        <option>Pilih Nama Pelanggan</option>
            <?php foreach ($options1 as $option) { ?>
                <option><?=$option['nama_pelanggan'];?></option>
            <?php
            } ?>
        </select>
        <br>
        <label for="nama_buku">Nama Buku</label>
        <select name="nama_buku" id="nama_buku">
        <option>Pilih Nama Buku</option>
            <?php foreach ($options2 as $option) { ?>
                <option><?=$option['nama_buku'];?></option>
            <?php
            } ?>
        </select>
        <br>
        <label for="kuantitas">Jumlah Pembelian</label>
        <input type="number" id="kuantitas" name="kuantitas"><br>
        <label for="harga">Harga</label>
        <input type="number" id="harga" name="harga"> <br>
        <input type="submit" value="Simpan"/>
    </form>
</body>

</html