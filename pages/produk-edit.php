<?php
$idproduk = $_GET['id'];
$q_tampil_produk = mysqli_query($conn, "SELECT * FROM produk WHERE idproduk='$idproduk'");
$r_tampil_produk = mysqli_fetch_array($q_tampil_produk);

if (empty($r_tampil_produk['foto']) || ($r_tampil_produk['foto'] == '-')) {
    $foto = "admin-no-photo.jpg";
} else {
    $foto = $r_tampil_produk["foto"];
}
?>

<div id="label-page"><h3>Edit Data Produk</h3></div>
<div id="content">
    <form action="proses/produk-edit-proses.php" method="post" enctype="multipart/form-data">
        <table id="tabel-input">
            <tr>
                <td class="label-formulir">foto</td>
                <td class="isian-formulir">
                    <img src="images/<?php echo $foto; ?>" width="70px" height="75px">
                    <input type="file" name="foto" class="isian-formulir isian-formulir-border">
                    <input type="hidden" name="foto_awal" value="<?php echo $r_tampil_produk['foto']; ?>">
                </td>
            </tr>
            <tr>
                <td class="label-formulir">ID produk</td>
                <td class="isian-formulir">
                    <input type="text" name="idproduk" value="<?php echo $r_tampil_produk['idproduk']; ?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled">
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Nama produk</td>
                <td class="isian-formulir">
                    <input type="text" name="namaproduk" value="<?php echo $r_tampil_produk['namaproduk']; ?>" class="isian-formulir isian-formulir-border">
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Harga</td>
                    <td class="isian-formulir">
                        <input type="text" name="harga" value="<?php echo $r_tampil_produk['harga']; ?>" class="isian-formulir isian-formulir-border">
                    </td>
            </tr>
            <!-- <tr>
                <td class="label-formulir">tahun</td>
                <td class="isian-formulir">
                    <textarea rows="2" cols="40" name="tahun" class="isian-formulir isian-formulir-border"><?php echo $r_tampil_produk['tahun']; ?></textarea>
                </td>
            </tr> -->
            <tr>
                <td class="label-formulir"></td>
                <td class="isian-formulir">
                    <input type="submit" name="simpan" onclick="return confirm('Yakin Data Disimpan?')" value="Simpan" id="tombol-simpan">
                </td>
            </tr>
        </table>
    </form>
</div>