<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "kantor_db"; // GANTI dengan nama database kamu

$koneksi = new mysqli($host, $user, $pass, $db);

if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}
?>
