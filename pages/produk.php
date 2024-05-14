<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
    <link rel="stylesheet" href="css/produk.css">
</head>
<body>
    <div id="label-page"><h3>Data Produk</h3></div>
    <div id="content">
        <p id="tombol-tambah-container">
            <a href="index.php?p=produk-input" class="tombol">Tambah Produk</a>
            <a target="_blank" href="pages/cetak-produk.php"><img src="images/print.png" width="50px" height="50px"></a>
        </p>
        <form class="form-inline" method="post">
            <div align="right">
                <input type="text" name="pencarian" placeholder="Cari Produk">
                <input type="submit" name="search" value="Search" class="tombol">
            </div>
        </form>
        <div class="produk-cards">
            <?php
            $batas = 10;
            extract($_GET);
            if (empty($hal)) {
                $posisi = 0;
                $hal = 1;
                $nomor = 1;
            } else {
                $posisi = ($hal - 1) * $batas;
                $nomor = $posisi + 1;
            }

            $query = '';
            if (isset($_POST['pencarian']) && $_POST['pencarian'] != '') {
                $pencarian = $_POST['pencarian'];
                $sql = "SELECT * FROM produk WHERE idproduk LIKE '%$pencarian%' OR namaproduk LIKE '%$pencarian%' OR harga LIKE '%$pencarian%'";
                $q_tampil_produk = mysqli_query($conn, $sql);
                $queryJml = mysqli_num_rows($q_tampil_produk);
            } else {
                $query = "SELECT * FROM produk LIMIT $posisi, $batas";
                $q_tampil_produk = mysqli_query($conn, $query);
                $queryJml = mysqli_num_rows($q_tampil_produk);
                $no = $posisi * 1;
            }

            if ($queryJml > 0) {
                while ($r_tampil_produk = mysqli_fetch_array($q_tampil_produk)) {
                    $foto = ($r_tampil_produk['foto'] != '-') ? $r_tampil_produk['foto'] : 'admin-no-photo.jpg';
                    ?>
                    <div class="produk-card">
                        <img src="images/<?php echo $foto; ?>" alt="<?php echo $r_tampil_produk['namaproduk']; ?>">
                        <div class="content">
                            <h3><?php echo $r_tampil_produk['namaproduk']; ?></h3>

                            <p><?php echo $r_tampil_produk['harga']; ?></p>
                        <div class="tombol-opsi-container">
                            <a target="_blank" href="pages/cetak-detail-produk.php?id=<?php echo $r_tampil_produk['idproduk']; ?>" class="tombol">Cetak Detail</a>
                        </div>
                        <div class="tombol-opsi-container">
                            <a href="index.php?p=produk-edit&id=<?php echo $r_tampil_produk['idproduk']; ?>" class="tombol">Edit</a>
                        </div>
                        <div class="tombol-opsi-container">
                            <a href="proses/produk-hapus.php?id=<?php echo $r_tampil_produk['idproduk']; ?>" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="tombol">Hapus</a>
                        </div>
        
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>Data Tidak Ditemukan</p>";
            }
            ?>
        </div>
        <?php
        if (isset($_POST['pencarian'])) {
            if ($_POST['pencarian'] != '') {
                echo "<div style='float:left;'>";
                echo "Data Hasil Pencarian: <b>$queryJml</b>";
                echo "</div>";
            }
        } else {
            ?>
            <div style="float: left;">
                <?php
                $jml = $queryJml;
                echo "Jumlah Data : <b>$jml</b>";
                ?>
            </div>
            <div class="pagination">
                <?php
                $jml_hal = ceil($jml / $batas);
                for ($i = 1; $i <= $jml_hal; $i++) {
                    if ($i != $hal) {
                        echo "<a href='?p=produk&hal=$i'>$i</a>";
                    } else {
                        echo "<a class='active'>$i</a>";
                    }
                }
                ?>
            </div>
            <?php
        }
        ?>
    </div>
</body>
</html>