<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "transupn";

// buat koneksi
$conn = mysqli_connect($host, $username, $password, $dbname);

// cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>