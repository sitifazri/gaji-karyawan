<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan!";
    exit;
}

$id = intval($_GET['id']);

// Cek apakah ID valid dan ada di database
$cek = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE id = $id");
if (mysqli_num_rows($cek) == 0) {
    echo "Data tidak ditemukan!";
    exit;
}
// Proses hapus data di gaji dulu
mysqli_query($koneksi, "DELETE FROM gaji WHERE id_karyawan = $id");

// Baru hapus data di karyawan
$query = "DELETE FROM karyawan WHERE id = $id";
$result = mysqli_query($koneksi, $query);


// Proses hapus
$query = "DELETE FROM karyawan WHERE id = $id";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: daftar-karyawan.php?pesan=hapus_sukses");
    exit;
} else {
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>
