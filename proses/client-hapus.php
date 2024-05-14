<?php
include'../koneksi.php';
$idclient=$_GET['id'];

mysqli_query($conn,
    "DELETE FROM client
    WHERE idclient='$idclient'"
    );

    header("location:../index.php?p=client");
    ?>