<!DOCTYPE html>
<head><meta charset="utf-8" />
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
<h2> Daftar Akun </h2>
<body>
    <?php 
    if (isset ($_GET['error_msg'])) {
        echo $_GET['error_msg'];
    }
    ?>
    <form action = "insert_user.php" method = "post" style="width:500px">
        <input type="hidden" name="id_user"/>
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" id="nama_lengkap" name="nama_lengkap" required/><br>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required/><br>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required/><br>
        <label for="password-repeat">Ulang Password</label>
        <input type="password" id="password-repeat" name="password-repeat" required/><br>
        <input type="submit" value="Daftar" />
        <p>Sudah punya akun? <a href="login_form.php">Login.</a></p>
    </form>
   
</body>

</html>