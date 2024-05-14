<?php
$idclient = $_GET['id'];
$q_tampil_client = mysqli_query($conn, "SELECT * FROM client WHERE idclient='$idclient'");
$r_tampil_client = mysqli_fetch_array($q_tampil_client);

if (empty($r_tampil_client['foto']) || ($r_tampil_client['foto'] == '-')) {
    $foto = "admin-no-photo.jpg";
} else {
    $foto = $r_tampil_client["foto"];
}
?>

<div id="label-page"><h3>Edit Data client</h3></div>
<div id="content">
    <form action="proses/client-edit-proses.php" method="post" enctype="multipart/form-data">
        <table id="tabel-input">
            <tr>
                <td class="label-formulir">FOTO</td>
                <td class="isian-formulir">
                    <img src="images/<?php echo $foto; ?>" width="70px" height="75px">
                    <input type="file" name="foto" class="isian-formulir isian-formulir-border">
                    <input type="hidden" name="foto_awal" value="<?php echo $r_tampil_client['foto']; ?>">
                </td>
            </tr>
            <tr>
                <td class="label-formulir">ID client</td>
                <td class="isian-formulir">
                    <input type="text" name="idclient" value="<?php echo $r_tampil_client['idclient']; ?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled">
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Nama</td>
                <td class="isian-formulir">
                    <input type="text" name="nama" value="<?php echo $r_tampil_client['nama']; ?>" class="isian-formulir isian-formulir-border">
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Jenis Kelamin</td>
                <?php
                if ($r_tampil_client['jeniskelamin'] == "Pria") {
                    echo "<td class='isian-formulir'><input type='radio' name='jenis_kelamin' value='Pria' checked>Pria</label></td>";
                } else {
                    echo "<td class='isian-formulir'><input type='radio' name='jenis_kelamin' value='Pria'>Pria</label></td>";
                }
                ?>
            </tr>
            <tr>
                <td class="label-formulir"></td>
                <?php
                if ($r_tampil_client['jeniskelamin'] == "Wanita") {
                    echo "<td class='isian-formulir'><input type='radio' name='jenis_kelamin' value='Wanita' checked>Wanita</td>";
                } else {
                    echo "<td class='isian-formulir'><input type='radio' name='jenis_kelamin' value='Wanita'>Wanita</td>";
                }
                ?>
            </tr>
            <tr>
                <td class="label-formulir">Alamat</td>
                <td class="isian-formulir">
                    <textarea rows="2" cols="40" name="alamat" class="isian-formulir isian-formulir-border"><?php echo $r_tampil_client['alamat']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td class="label-formulir"></td>
                <td class="isian-formulir">
                    <input type="submit" name="simpan" onclick="return confirm('Yakin Data Disimpan?')" value="Simpan" id="tombol-simpan">
                </td>
            </tr>
        </table>
    </form>
</div>