<?php
include 'koneksi.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Validasi ID
if ($id <= 0) {
    header("Location: rating.php?pesan=hapus_gagal_id_tidak_valid");
    exit;
}

// Cek apakah rating masih digunakan di tabel karyawan
$cek = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM karyawan WHERE id_rating = $id");
if (!$cek) {
    echo "Gagal mengecek data: " . mysqli_error($koneksi);
    exit;
}

$data = mysqli_fetch_assoc($cek);
if ($data['total'] > 0) {
    // Rating masih digunakan, redirect dengan pesan gagal
    header("Location: rating.php?pesan=hapus_gagal_dipakai&jumlah=" . $data['total']);
    exit;
}

// Jika tidak digunakan, lanjut hapus
$query = "DELETE FROM rating WHERE id = $id";
if (mysqli_query($koneksi, $query)) {
    header("Location: rating.php?pesan=hapus_sukses");
    exit;
} else {
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>
