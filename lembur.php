<?php
include 'koneksi.php';

// Query data lembur
$query = "SELECT * FROM lembur";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query error: " . mysqli_error($koneksi));
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tarif Lembur</title>
    <style>
        * {
            margin: 0; 
            padding: 0; 
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background-color: #f4f4f4;
        }
        .container {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 260px;
            background-color: #2c3e50;
            color: white;
            padding: 20px 15px;
        }
        .sidebar h2 {
            font-size: 20px;
            margin-bottom: 25px;
            text-align: center;
        }
        .sidebar ul {
            list-style: none;
        }
        .sidebar ul li {
            margin-bottom: 12px;
            margin-top: 2px;
            font-size: 17px;
        }
        .sidebar ul li a {
            text-decoration: none;
            color: white;
            padding: 10px 16px;
            display: block;
            border-radius: 6px;
            transition: background-color 0.3s;
        }
        .sidebar ul li a:hover,
        .sidebar ul li a.active {
            background-color: #1a252f;
        }
        .main {
            flex: 1;
            background-color: #ffffff;
        }
        .header {
            background-color: rgb(189, 197, 216);
            color: rgb(37, 54, 109);
            padding: 15px;
            text-align: center;
            font-weight: bold;
            font-size: 20px;
            margin: 30px;
        }
        .header h1 {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: white;
            font-family: Bacasime Antique;
        }
        .pt {
            width: 60px;
            height: 65px;
            margin-right: 20px;
        }
        .content {
            padding: 30px;
        }
        h2 {
            font-size: 22px;
            color:rgb(255, 255, 255);
            margin-bottom: 15px;
            margin-top:25px;
        }
        h3{
            font-size: 22px;
            color:rgb(10, 1, 1);
            margin-bottom: 20px;
        }
        a.btn-primary {
            display: inline-block;
            background-color: #2980b9;
            color: white;
            padding: 10px 16px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        a.btn-primary:hover {
            background-color: #1f6391;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px 16px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
        }
        th {
            background-color: #2c3e50;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        tr:hover {
            background-color: #f0f0f0;
        }
        .btn {
            padding: 6px 12px;
            font-size: 13px;
            text-decoration: none;
            border-radius: 4px;
            color: white;
            margin-right: 5px;
        }
        .btn-warning { 
            background-color: #f39c12; 
        }
        .btn-danger { 
            background-color: #e74c3c; 
        }
        .btn-warning:hover { 
            background-color: #e67e22; 
        }
        .btn-danger:hover {
            background-color: #c0392b;
        }
        footer {
            margin-top: 250px;
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 25px 100px;
            font-size: 14px;
            letter-spacing: 5px;
        }

    </style>
</head>
<body>
<div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>🧾 SISTEM GAJI</h2>
        <ul>
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="daftar-karyawan.php">Daftar Karyawan</a></li>
            <li><a href="jabatan.php">Daftar Jabatan</a></li>
            <li><a href="rating.php">Daftar Rating</a></li>
            <li><a href="lembur.php" class="active">Tarif Lembur</a></li>
            <li><a href="gaji.php">Gaji Karyawan</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main">
        <div class="header">
            <h1><img src="img/PT.png" class="pt" alt="Logo">SITI&DiO COMPANY</h1>
        </div>

        <div class="content">
            <h3>🕒 Daftar Tarif Lembur</h3>
            <a href="lembur_tambah.php" class="btn-primary">+ Tambah Tarif</a>
            <table>
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Jabatan</th>
                    <th>Tarif Per Jam</th>
                    <th>Jumlah Jam</th>
                    <th>Total Lembur</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    $id_jabatan = isset($row['id_jabatan']) ? $row['id_jabatan'] : '-';
                    $tarif = isset($row['tarif']) ? $row['tarif'] : 0;
                    $jumlah_jam = isset($row['jumlah_jam']) ? $row['jumlah_jam'] : 0;
                    $total = $tarif * $jumlah_jam;

                    echo "<tr>
                        <td>{$no}</td>
                        <td>{$id_jabatan}</td>
                        <td>Rp " . number_format($tarif, 0, ',', '.') . "</td>
                        <td>{$jumlah_jam} jam</td>
                        <td>Rp " . number_format($total, 0, ',', '.') . "</td>
                        <td>
                            <a href='lembur_edit.php?id=" . urlencode($row['id']) . "' class='btn btn-warning'>✒️Edit</a>
                            <a href='lembur_hapus.php?id=" . urlencode($row['id']) . "' class='btn btn-danger' onclick=\"return confirm('Yakin ingin menghapus data ini?')\">⛔Hapus</a>
                        </td>
                    </tr>";
                    $no++;
                }
                ?>
                </tbody>
            </table>
             <footer>
                &copy; <?= date("Y") ?> SITI&DiO Company. All rights reserved.
                <br> By: siti fazri arohmah.
            </footer>
        </div>
    </div>
</div>
</body>
</html>
