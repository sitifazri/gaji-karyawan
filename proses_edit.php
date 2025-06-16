
<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = intval($_POST['id']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $divisi = mysqli_real_escape_string($koneksi, $_POST['divisi']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $umur = intval($_POST['umur']);
    $jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
    $status = mysqli_real_escape_string($koneksi, $_POST['status']);

    $query = "UPDATE karyawan SET 
                nama='$nama',
                divisi='$divisi',
                alamat='$alamat',
                umur=$umur,
                jenis_kelamin='$jenis_kelamin',
                status='$status'
              WHERE id=$id";

    if (mysqli_query($koneksi, $query)) {
        header("Location: daftar-karyawan.php?pesan=update_berhasil");
        exit;
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($koneksi);
    }
} else {
    echo "Akses ditolak!";
}
