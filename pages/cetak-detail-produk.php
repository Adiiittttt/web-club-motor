<?php
include "../koneksi.php";

$id_produk = $_GET["id"];

$q_tampil_produk = mysqli_query($conn, "SELECT * FROM produk WHERE idproduk = '$id_produk'");
$r_tampil_produk = mysqli_fetch_array($q_tampil_produk);

if (empty($r_tampil_produk['foto']) || ($r_tampil_produk['foto'] == '-')) {
    $foto = "admin-no-photo.jpg";
} else {
    $foto = $r_tampil_produk['foto'];
}
?>

<div id="label-page"><h3>Kartu produk</h3></div>

<div id="content">
    <table id="tabel-input">
        <tr>
            <td class="label-formulir">foto produk</td>
            <td class="isian-formulir">
                <img src="../images/<?php echo $foto; ?>" width=70px height=75px>
            </td>
        </tr>
        <tr>
            <td class="label-formulir">ID produk</td>
            <td class="isian-formulir"><?php echo $r_tampil_produk["idproduk"]; ?></td>
        </tr>
        <tr>
            <td class="label-formulir">Nama Produk</td>
            <td class="isian-formulir"><?php echo $r_tampil_produk['namaproduk']; ?></td>
        </tr>
        <tr>
            <td class="label-formulir">Harga</td>
            <td class="isian-formulir"><?php echo $r_tampil_produk['harga']; ?></td>
        </tr>
    </table>
</div>

<script>
    window.print();
</script>