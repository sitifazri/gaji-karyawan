<?php
include 'koneksi.php';

$id = $_GET['id'];
$hapus = mysqli_query($koneksi, "DELETE FROM gaji WHERE id = '$id'");

if ($hapus) {
    header("Location: gaji.php");
    exit;
} else {
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>
