<?php
session_start();

// Jika form login disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lakukan validasi dan autentikasi pengguna di sini
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Jika valid, simpan sesi
    if ($username == 'admin' && $password == 'password') {
        $_SESSION['sesi'] = true;
        header("Location: index.php");
        exit();
    } else {
        $error = "Username atau password salah.";
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Halaman Login</title>
    <link rel="stylesheet" href="css/loginstyles.css">
</head>
<body>
    <div class="container">
        <h1>RevMaster Login</h1>
        <form method="post" action="ceklogin.php">
            <label>Username</label><br>
            <input type="text" name="user"><br>
            <label>Password</label><br>
            <input type="password" name="pass"><br>
            <button type="submit" name="submit">Log in</button>
        </form>
    </div>
</body>
</html>