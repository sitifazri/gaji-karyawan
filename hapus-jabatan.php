<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM jabatan WHERE id = $id";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: jabatan.php?pesan=hapus_sukses");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
