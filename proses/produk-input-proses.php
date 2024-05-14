<?php
include '../koneksi.php';

$idproduk = $_POST["idproduk"];
$namaproduk = $_POST["namaproduk"];
$harga = $_POST['harga'];

if (isset($_POST["simpan"])) {
    extract($_POST);

    $namaproduk_file = $_FILES["foto"]["name"];

    if (!empty($namaproduk_file)) {
        // Baca lokasi file sementara dan namaproduk file dari form (fupload)
        $lokasi_file = $_FILES['foto']['tmp_name'];
        $tipe_file = pathinfo($namaproduk_file, PATHINFO_EXTENSION);
        $file_foto = $idproduk . "." . $tipe_file;

        // Tentukan folder untuk menyimpan file
        $folder = "../images/$file_foto";

        // Hapus file foto lama jika ada
        if (!empty($foto_awal)) {
            unlink("../images/$foto_awal");
        }

        // Apabila file berhasil di upload
        move_uploaded_file($lokasi_file, "$folder");
    } else {
        $file_foto = $foto_awal;
    }

    $sql = "INSERT INTO produk VALUES('$idproduk', '$namaproduk', '$harga',  '$file_foto')";
    $query = mysqli_query($conn, $sql);

    header("location:../index.php?p=produk");
}
?>