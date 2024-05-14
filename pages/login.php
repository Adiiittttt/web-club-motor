<?php
include 'koneksi.php';

// Proses login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Ganti kondisi ini sesuai dengan logika autentikasi pengguna Anda
    // Contoh sederhana, menggunakan username "user" dan password "password"
    if ($username === "user" && $password === "password") {
        $_SESSION["username"] = $username;
        header("Location: index.php");
        exit();
    } else {
        $error = "Username atau password salah";
    }
}

// Proses logout
if (isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="loginstyles.css">
</head>
<body>
    <?php if (isset($_SESSION['username'])): ?>
    <div class="logout-container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="logout">
            <button type="submit">Sign Out</button>
        </form>
    </div>
    <?php else: ?>
    <div class="login-container">
        <h2>Sign In</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="login">Sign In</button>
            <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>
        </form>
    </div>
    <?php endif; ?>
</body>
</html>
