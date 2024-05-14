<?php



$conn = new mysqli('localhost', 'root', '', 'companyprofile');

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>