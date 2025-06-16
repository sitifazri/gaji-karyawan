<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $divisi = $_POST['divisi'];
    $alamat = $_POST['alamat'];
    $umur = $_POST['umur'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $status = $_POST['status'];
    $rating = $_POST['rating'];
    $jabatan = $_POST['jabatan'];
    $foto = $_POST['foto'];

    $query = "INSERT INTO karyawan (nama, divisi, alamat, umur, jenis_kelamin, status)
              VALUES ('$nama', '$divisi', '$alamat', '$umur', '$jenis_kelamin', '$status')";

    if ($koneksi->query($query)) {
        header("Location: daftar-karyawan.php");
        exit();
    } else {
        echo "Gagal menyimpan data: " . $koneksi->error;
    }
} else {
    echo "Akses tidak sah.";
}
?>
