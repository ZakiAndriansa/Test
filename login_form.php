<!DOCTYPE html>
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
<h2> Login </h2>

    <form action="login.php" method="post" style="width:500px">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required /><br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required /><br>
        <input type="submit" value="Login" />
        <p>Belum punya akun? <a href="register_form.php">Register.</a></p>
    </form>
</body>
</html>