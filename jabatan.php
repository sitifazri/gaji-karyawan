    <?php 
    include 'koneksi.php';

    $query = "SELECT * FROM jabatan";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        echo "Query error: " . mysqli_error($koneksi);
        exit;
    }
    ?>
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>Sistem Gaji - Daftar Jabatan</title>
        <link rel="stylesheet" href="css/style.css">
        <style>
            /* Reset dan font */
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
        }
        .header h1 {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: white;
            font-family: Bacasime Antique;
            font size: 38px;
            margin: 0.5pxpx;
        }
        .pt {
            width: 60px;
            height: 65px;
            margin-right: 20px;
        }
        .content {
            padding: 30px;
        }
        h3{
            font-size: 28px;
            color:rgb(7, 7, 7);
            margin-bottom: 20px;
        }
        a.btn-primary {
            display: inline-block;
            background-color: #2980b9;
            color: white;
            padding: 10px 19px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            margin-bottom: 15px;
            font-size: 14px;
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
        .btn-warning { background-color: #f39c12;
        }
        .btn-danger { background-color: #e74c3c; 
        }
        .btn-warning:hover { background-color: #e67e22; 
        }
        .btn-danger:hover { background-color: #c0392b; 
        }
         footer {
            margin-top: 250px;
            margin-left: 11px;
            margin-right: 25px;
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 14px;
            letter-spacing: 0.3px;
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
                    <li><a href="jabatan.php" class="active">Daftar Jabatan</a></li>
                    <li><a href="rating.php">Daftar Rating</a></li>
                    <li><a href="Lembur.php">Tarif Lembur</a></li>
                    <li><a href="gaji.php">Gaji Karyawan</a></li>
                </ul>
            </div>

            <!-- Konten utama -->
            <div class="main-content">
                <div class="header">
                    <h1><img src="img/PT.png" alt="Logo PT" class="pt">SITI&DiO COMPANY</h1>
                </div>

                <h3>✍️ DAFTAR JABATAN</h3>
                <a href="tambah-jabatan.php" class="btn-primary">+ Tambah Jabatan</a>

                <?php if (isset($_GET['pesan']) && $_GET['pesan'] == 'hapus_sukses') : ?>
                    <div style="background-color:rgb(149, 170, 202); color: white; padding: 10px 15px; border-radius: 6px; margin-top: 20px;">Data jabatan berhasil dihapus.</div>
                <?php endif; ?>

                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Jabatan</th>
                            <th>Gaji Pokok</th>
                            <th>Tunjangan</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                            echo "<td>Rp " . number_format($row['gaji_pokok'], 0, ',', '.') . "</td>";
                            echo "<td>Rp " . number_format($row['tunjangan'], 0, ',', '.') . "</td>";
                            echo "<td>
                                  <div class='btn-group'>
                                  <a href='edit-jabatan.php?id=" . urlencode($row['id']) . "' class='btn btn-warning'>✒️Edit</a>
                                  <a href='hapus-jabatan.php?id=" . urlencode($row['id']) . "' class='btn btn-danger' onclick=\"return confirm('Yakin ingin menghapus data ini?')\">⛔Hapus</a>
                                  </div>
                                  </td>";
                            echo "</tr>";
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
    </body>
    </html>
