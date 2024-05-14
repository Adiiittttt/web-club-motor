<?php
include'../koneksi.php';
$idproduk=$_GET['id'];

mysqli_query($conn,
    "DELETE FROM produk
    WHERE idproduk='$idproduk'"
    );

    header("location:../index.php?p=produk");
    ?>