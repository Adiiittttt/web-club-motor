<?php
include '../koneksi.php';

$idclient = $_POST["idclient"];
$nama = $_POST["nama"];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];

if (isset($_POST["simpan"])) {
    extract($_POST);

    $nama_file = $_FILES["foto"]["name"];

    if (!empty($nama_file)) {
        // Baca lokasi file sementara dan nama file dari form (fupload)
        $lokasi_file = $_FILES['foto']['tmp_name'];
        $tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
        $file_foto = $idclient . "." . $tipe_file;

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

    $sql = "INSERT INTO client VALUES('$idclient', '$nama', '$jenis_kelamin', '$alamat', '$status', '$file_foto')";
    $query = mysqli_query($conn, $sql);

    header("location:../index.php?p=client");
}
?>