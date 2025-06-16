<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan!";
    exit;
}

$id = $_GET['id'];
$query = "SELECT * FROM karyawan WHERE id = ?";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 0) {
    echo "Karyawan tidak ditemukan!";
    exit;
}

$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Karyawan</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 40px; }
        .detail-box {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            width: 500px;
            margin: auto;
        }
        h2 { text-align: center; margin-bottom: 20px; color: #2c3e50; }
        .detail-item { margin-bottom: 12px; font-size: 16px; }
        .label { font-weight: bold; }
        .back-btn {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: white;
            background-color: #3498db;
            padding: 10px 20px;
            border-radius: 6px;
        }
        .back-btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<div class="detail-box">
    <h2>Detail Karyawan</h2>
    <div class="detail-item"><span class="label">Nama:</span> <?= htmlspecialchars($data['nama']) ?></div>
    <div class="detail-item"><span class="label">Divisi:</span> <?= htmlspecialchars($data['divisi']) ?></div>
    <div class="detail-item"><span class="label">Alamat:</span> <?= htmlspecialchars($data['alamat']) ?></div>
    <div class="detail-item"><span class="label">Umur:</span> <?= htmlspecialchars($data['umur']) ?></div>
    <div class="detail-item"><span class="label">Jenis Kelamin:</span> <?= htmlspecialchars($data['jenis_kelamin']) ?></div>
    <div class="detail-item"><span class="label">Status:</span> <?= htmlspecialchars($data['status']) ?></div>
    
    <a href="daftar-karyawan.php" class="back-btn">Kembali</a>
</div>

</body>
</html>
