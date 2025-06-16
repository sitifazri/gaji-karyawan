<?php 
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Gaji - Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        * {
            margin: 0; padding: 0; box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
            background-color: #f4f4f4;
        }
        .container {
            display: flex;
            flex: 1;
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
            display: flex;
            flex-direction: column;
            background-color: #ffffff;
            padding-bottom: 60px; /* space for footer */
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
        h3 {
            font-size: 28px;
            color:rgb(37, 54, 109);
            margin: 25px 0 15px 30px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        a.btn-primary {
            display: inline-block;
            background-color: #2980b9;
            color: white;
            padding: 10px 16px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            margin-left: 30px;
            margin-bottom: 15px;
        }
        a.btn-primary:hover {
            background-color: #1f6391;
        }
        table {
            width: 90%;
            margin-left: 29px;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 9px 16px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
        }
        th {
            background-color: #2c3e50;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin : 20px;
        }
        tr:hover {
            background-color: #f0f0f0;
        }
        .foto-karyawan {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            object-fit: cover;
        }
        footer {
            margin-top: 322px;
            margin-left: 23px;
            margin-right: 23px;
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 30px;
            font-size: 14px;
        }
        marquee {
            margin: 0 30px;
            font-size: 14px;
            font-weight: bold;
            color: #444;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>🧾 SISTEM GAJI</h2>
            <ul>
                <li><a href="index.php" class="active">Dashboard</a></li>
                <li><a href="daftar-karyawan.php">Daftar Karyawan</a></li>
                <li><a href="jabatan.php">Daftar Jabatan</a></li>
                <li><a href="rating.php">Daftar Rating</a></li>
                <li><a href="lembur.php">Tarif Lembur</a></li>
                <li><a href="gaji.php">Gaji Karyawan</a></li>
            </ul>
        </div>

        <!-- Main -->
        <div class="main">
            <div class="header">
                <h1><img src="img/PT.png" alt="Logo PT" class="pt">SITI&DiO COMPANY</h1>
            </div>

            <marquee behavior="alternate" direction="left">hallo saya sitifazriarohma semoga harimu indah🍌⛅🌈🌟</marquee>

            <h3>⭐ DAFTAR RATING KARYAWAN</h3>

            <table>
                
                        <th>No</th>
                        <th>Nama</th>
                        <th>Rating</th>
                        <th>Bonus (%)</th>
                
            
            </table>

            <footer>
                &copy; 2025 SITI&DiO Company. All rights reserved.<br>
                By: siti fazri arohmah.
            </footer>
        </div>
    </div>
</body>
</html>
