<?php
// Memanggil koneksi ke database
include "../koneksi.php";
?>

<link rel="stylesheet" type="text/css" href="../stylespages.css">

<div><h3>Data client</h3></div>
<div id="content">
    <table border="1" id="tabel-tampil">
        <tr>
            <th id="label-tampil-no">No</th>
            <th>ID client</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
        </tr>
        <?php
        $nomor = 1;
        $query = "SELECT * FROM client ORDER BY idclient DESC";
        $q_tampil_client = mysqli_query($conn, $query);
        if (mysqli_num_rows($q_tampil_client) > 0) {
            while ($r_tampil_client = mysqli_fetch_array($q_tampil_client)) {
                if (empty($r_tampil_client['foto']) || ($r_tampil_client['foto'] == "-")) {
                    $foto = "admin-no-photo.jpg";
                } else {
                    $foto = $r_tampil_client['foto'];
                }
                ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $r_tampil_client['idclient']; ?></td>
                    <td><?php echo $r_tampil_client['nama']; ?></td>
                    <td><img src="../images/<?php echo $foto; ?>" width="70px" height="70px"></td>
                    <td><?php echo $r_tampil_client['jeniskelamin']; ?></td>
                    <td><?php echo $r_tampil_client['alamat']; ?></td>
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