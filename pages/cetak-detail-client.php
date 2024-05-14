<?php
include "../koneksi.php";

$id_client = $_GET["id"];

$q_tampil_client = mysqli_query($conn, "SELECT * FROM client WHERE idclient = '$id_client'");
$r_tampil_client = mysqli_fetch_array($q_tampil_client);

if (empty($r_tampil_client['foto']) || ($r_tampil_client['foto'] == '-')) {
    $foto = "admin-no-photo.jpg";
} else {
    $foto = $r_tampil_client['foto'];
}
?>

<div id="label-page"><h3>Kartu client</h3></div>

<div id="content">
    <table id="tabel-input">
        <tr>
            <td class="label-formulir">FOTO</td>
            <td class="isian-formulir">
                <img src="../images/<?php echo $foto; ?>" width=70px height=75px>
            </td>
        </tr>
        <tr>
            <td class="label-formulir">ID client</td>
            <td class="isian-formulir"><?php echo $r_tampil_client["idclient"]; ?></td>
        </tr>
        <tr>
            <td class="label-formulir">Nama</td>
            <td class="isian-formulir"><?php echo $r_tampil_client['nama']; ?></td>
        </tr>
        <tr>
            <td class="label-formulir">Jenis Kelamin</td>
            <td class="isian-formulir"><?php echo $r_tampil_client['jeniskelamin']; ?></td>
        </tr>
        <tr>
            <td class="label-formulir">Alamat</td>
            <td class="isian-formulir"><?php echo $r_tampil_client['alamat']; ?></td>
        </tr>
    </table>
</div>

<script>
    window.print();
</script>