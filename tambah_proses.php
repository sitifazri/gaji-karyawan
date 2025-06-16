<?php
include 'db.php';

$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$gaji_pokok = $_POST['gaji_pokok'];
$tunjangan = $_POST['tunjangan'];

$conn->query("INSERT INTO karyawan (nama, jabatan, gaji_pokok, tunjangan) 
              VALUES ('$nama', '$jabatan', '$gaji_pokok', '$tunjangan')");

header("Location: index.php");
?>
