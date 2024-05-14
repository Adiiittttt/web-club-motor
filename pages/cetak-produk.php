<?php
// Memanggil koneksi ke database
include "../koneksi.php";
?>

<link rel="stylesheet" type="text/css" href="../stylespages.css">

<div><h3>Data produk</h3></div>
<div id="content">
    <table border="1" id="tabel-tampil">
        <tr>
            <th id="label-tampil-no">No</th>
            <th>ID produk</th>
            <th>Nama produk</th>
            <th>Foto produk</th>
            <th>Harga</th>

        </tr>
        <?php
        $nomor = 1;
        $query = "SELECT * FROM produk ORDER BY idproduk DESC";
        $q_tampil_produk = mysqli_query($conn, $query);
        if (mysqli_num_rows($q_tampil_produk) > 0) {
            while ($r_tampil_produk = mysqli_fetch_array($q_tampil_produk)) {
                if (empty($r_tampil_produk['foto']) || ($r_tampil_produk['foto'] == "-")) {
                    $foto = "admin-no-photo.jpg";
                } else {
                    $foto = $r_tampil_produk['foto'];
                }
                ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $r_tampil_produk['idproduk']; ?></td>
                    <td><?php echo $r_tampil_produk['namaproduk']; ?></td>
                    <td><img src="../images/<?php echo $foto; ?>" width="70px" height="70px"></td>
                    <td><?php echo $r_tampil_produk['harga']; ?></td>
                </tr>
                <?php $nomor++;
            }
        }
        ?>
    </table>
</div>

<script>
    window.print();
</script>