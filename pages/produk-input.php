<div id="label-page"><h3>Input Data produk</h3></div>
<div id="content">
    <form action="proses/produk-input-proses.php" method="post" enctype="multipart/form-data">
        <table id="tabel-input">
            <tr>
                <td class="label-formulir">Foto Produk</td>
                <img src="images/<?php echo $foto; ?>" width="70px" height="75px">
                <td class="isian-formulir"><input type="file" name="foto" class="isian-formulir isian-formulir-border"></td>
            </tr>
            <tr>
                <td class="label-formulir">ID produk</td>
                <td class="isian-formulir"><input type="text" name="idproduk" class="isian-formulir isian-formulir-border"></td>
            </tr>
            <tr>
                <td class="label-formulir">Nama Produk</td>
                <td class="isian-formulir"><input type="text" name="namaproduk" class="isian-formulir isian-formulir-border"></td>
            </tr>
            <tr>
                <td class="label-formulir">harga</td>
                <td class="isian-formulir"><textarea rows="2" cols="40" name="harga" class="isian-formulir isian-formulir-border"></textarea></td>
            </tr>
            <tr>
                <td class="label-formulir"></td>
                <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" onclick="return confirm('Yakin Data Disimpan?')" class="tombol"></td>
            </tr>
        </table>
    </form>
</div>