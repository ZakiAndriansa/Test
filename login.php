<?php
include "db.php";

error_reporting(E_ALL);
session_start();

// if (isset($_SESSION['email'])) {
//     echo "Berhasil login";
// }

if (!empty($_POST)){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)> 0){    
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $row['email'];
        echo "<script>
            alert('Login berhasil');
            location.href = 'welcome.php';
        </script>";
    } else {
        echo "<script>
        alert('Email atau password Anda salah. Silahkan coba lagi!');
        location.href = 'login_form.php';
    </script>";
    }
}

?>