<?php
include 'koneksi.php';
$tgl = date('Y-m-d');
session_start();
if(isset($_SESSION['sesi'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RevMasters - Club Motor Terdepan</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <header>
    <nav>
      <div class="logo">
        <a href="#"><img src="images/logorev.png" alt="RevMaster Logo"></a>
      </div>
      <div class="nav-links">
        <ul>
            <li><a href="index.php?p=beranda">Beranda</a></li>
            <li><a href="index.php?p=tentang">Tentang Kami</a></li>
            <li><a href="index.php?p=visimisi">Visi Misi</a></li>
            <li><a href="index.php?p=profile">Profile</a></li>
            <li><a href="index.php?p=produk">Produk</a></li>
            <li><a href="index.php?p=galeri">Galeri</a></li>
            <li><a href="index.php?p=client">Client</a></li>
            <li><a href="index.php?p=kontak">Kontak</a></li>
            <li><a href="logout.php">Logout</a></li>
      </ul>
       
      </div>
      <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
    </nav>
  </header>

  <main>
  <?php
            $pages_dir = 'pages';
            if(!empty($_GET['p'])) {
                $pages = scandir($pages_dir, 0);
                unset($pages[0], $pages[1]);
                $p = $_GET['p'];
                if(in_array($p.'.php', $pages)) {
                    include($pages_dir.'/'.$p.'.php');
                } else {
                    echo 'Halaman Tidak Ditemukan';
                }
            } else {
                include($pages_dir.'/beranda.php');
            }
            ?>
    </main>

  <footer >
    <p>&copy; 2024 Aditia. All rights reserved.</p>
  </footer>
  <?php
} else {
    echo "<script> alert('Anda Harus Login Dahulu!'); </script>";
    header("location:login.php");
}
?>

  <script src="script.js"></script>
</body>
</html>