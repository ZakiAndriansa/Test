<?php
require "db.php";

$id_pelanggan = $_GET['id_pelanggan'];

$result = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'");
while ($row=mysqli_fetch_array($result)): 
?>

<!DOCTYPE html>
<head>
</head>

<body>
    <h2> Edit Data Pelanggan </h2>
    <form action="edit_pelanggan.php" method="post">
        <input type="hidden" name="id_pelanggan" value="<?=$row['id_pelanggan']?>"/>
        <label for="nama_pelanggan">Nama Pelanggan</label>
        <input type="text" id="nama_pelanggan" name="nama_pelanggan" value="<?=$row['nama_pelanggan']?>"/><br>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?=$row['email']?>"/><br>
        <label for="no_hp">No. HP</label>
        <input type="text" id="no_hp" name="no_hp" value="<?=$row['no_hp']?>"/><br>
        <input type="submit" value="Ubah">
    </form>
</body>
</html>

<?php endwhile; ?>