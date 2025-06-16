<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Tambah Karyawan - Sistem Kantor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 40px;
        }
        .form-container {
            background-color: white;
            max-width: 500px;
            margin: auto;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }
        label {
            display: block;
            margin-top: 15px;
            color: #555;
            font-weight: bold;
        }
        input[type="text"], input[type="number"], select, textarea {
            width: 100%;
            padding: 10px 12px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 15px;
        }
        textarea {
            resize: vertical;
        }
        .gender-group {
            margin-top: 6px;
        }
        .gender-group label {
            font-weight: normal;
            margin-right: 20px;
        }
        .btn-submit {
            margin-top: 25px;
            width: 100%;
            padding: 12px;
            background-color: #2980b9;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }
        .btn-submit:hover {
            background-color: #1f6391;
        }
        .btn-back {
            margin-top: 10px;
            display: block;
            text-align: center;
            text-decoration: none;
            color: #2980b9;
            font-weight: 600;
        }
        .btn-back:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Tambah Karyawan</h2>
        <form action="proses_tambah_karyawan.php" method="POST">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" placeholder="Masukkan nama lengkap" required>

            <label for="divisi">Divisi</label>
            <select name="divisi" id="divisi" required>
                 <option value="">-- Pilih Divisi --</option>
                 <option value="HRD">HRD</option>
                 <option value="Keuangan">Keuangan</option>
                 <option value="IT">IT</option>
                 <option value="Marketing">Marketing</option>
                 <option value="Produksi">Produksi</option>
            </select>


            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>

            <label for="umur">Umur</label>
            <input type="number" name="umur" id="umur" min="18" max="70" placeholder="Masukkan umur" required>

            <label>Jenis Kelamin</label>
            <div class="gender-group">
                <label><input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki</label>
                <label><input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan</label>
            </div>

            <label for="status">Status</label>
            <select name="status" id="status" required>
                <option value="">-- Pilih Status --</option>
                <option value="aktif">Aktif</option>
                <option value="tidak aktif">Tidak Aktif</option>
            </select>
            
            <button type="submit" class="btn-submit">Simpan</button>
        </form>
        <a href="index.php" class="btn-back">← Kembali ke Dashboard</a>
    </div>
</body>
</html>
