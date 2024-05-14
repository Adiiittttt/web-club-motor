<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Client</title>
    <link rel="stylesheet" href="css/stylespages.css">
</head>
<body>
<div id="label-page"><h3>Tampil Data client</h3></div>
<div id="content">
    <p id="tombol-tambah-container">
        <a href="index.php?p=client-input" class="tombol">Tambah client</a>
        <a target="_blank" href="pages/cetak-client.php"><img src="print.png" width="50px" height="50px"></a>
    </p>
    <form class="form-inline" method="post">
    <div align="right">
        <input type="text" name="pencarian">
        <input type="submit" name="search" value="Search" class="tombol">
    </div>
</form>
<table id="tabel-tampil">
    <tr>
        <th id="label-tampil-no">No</th>
        <th>ID client</th>
        <th>Nama</th>
        <th>Foto</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
        <th id="label-opsi">Opsi</th>
    </tr>
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
        $sql = "SELECT * FROM client WHERE idclient LIKE '%$pencarian%' OR nama LIKE '%$pencarian%' OR jeniskelamin LIKE '%$pencarian%' OR alamat LIKE '%$pencarian%'";
        $q_tampil_client = mysqli_query($conn, $sql);
        $queryJml = mysqli_num_rows($q_tampil_client);
    } else {
        $query = "SELECT * FROM client LIMIT $posisi, $batas";
        $q_tampil_client = mysqli_query($conn, $query);
        $queryJml = mysqli_num_rows($q_tampil_client);
        // $queryJml = mysqli_query($conn, "SELECT * FROM client");
        $no = $posisi * 1;
    }

    if (mysqli_num_rows($q_tampil_client) > 0) {
        while ($r_tampil_client = mysqli_fetch_array($q_tampil_client)) {
            if (empty($r_tampil_client['foto']) || ($r_tampil_client['foto'] == '-')) {
                $foto = "admin-no-photo.jpg";
            } else {
                $foto = $r_tampil_client['foto'];
            }
            ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $r_tampil_client['idclient']; ?></td>
                <td><?php echo $r_tampil_client['nama']; ?></td>
                <td><img src="images/<?php echo $foto; ?>" width="70px" height="70px"></td>
                <td><?php echo $r_tampil_client['jeniskelamin']; ?></td>
                <td><?php echo $r_tampil_client['alamat']; ?></td>
                <td>
            
                        <div class="tombol-opsi-container">
                            <a target="_blank" href="pages/cetak-detail-client.php?id=<?php echo $r_tampil_client['idclient']; ?>" class="tombol">Cetak Detail</a>
                        </div>
                        <div class="tombol-opsi-container">
                            <a href="index.php?p=client-edit&id=<?php echo $r_tampil_client['idclient']; ?>" class="tombol">Edit</a>
                        </div>
                        <div class="tombol-opsi-container">
                            <a href="proses/client-hapus.php?id=<?php echo $r_tampil_client['idclient']; ?>" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="tombol">Hapus</a>
                        </div>
                    </td>
                </tr>
                <?php $nomor++;
            }
        } else {
            echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>";
        }
        ?>
    </table>

    <?php
    if (isset($_POST['pencarian'])) {
        if ($_POST['pencarian'] != '') {
            echo "<div style='float:left;'>";
            // echo $queryJml;
            // $jml = mysqli_num_rows(mysqli_query($conn, $queryJml));
            echo "Data Hasil Pencarian: <b>$queryJml</b>";
            echo "</div>";
        }
    } else {
        ?>
        <div style="float: left;">
            <?php
            // var_dump($queryJml);
            $jml = $queryJml;
            // $jml = mysqli_num_rows(mysqli_query($conn, ));
            echo "Jumlah Data : <b>$jml</b>";
            ?>
        </div>
        <div class="pagination">
            <?php
            $jml_hal = ceil($jml / $batas);
            for ($i = 1; $i <= $jml_hal; $i++) {
                if ($i != $hal) {
                    echo "<a href='?p=client&hal=$i'>$i</a>";
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