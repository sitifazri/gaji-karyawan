<?php
include 'koneksi.php';

// Ambil data karyawan dan jabatan untuk dropdown
$karyawan = mysqli_query($koneksi, "SELECT * FROM karyawan");
$jabatan = mysqli_query($koneksi, "SELECT * FROM jabatan");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_karyawan = $_POST['id_karyawan'];
    $id_jabatan = $_POST['id_jabatan'];
    $total_pendapatan = $_POST['total_pendapatan'];

    $insert = mysqli_query($koneksi, "INSERT INTO gaji (id_karyawan, id_jabatan, total_pendapatan) VALUES ('$id_karyawan', '$id_jabatan', '$total_pendapatan')");

    if ($insert) {
        header("Location: gaji.php");
        exit;
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Gaji</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f4f4f4;
            padding: 30px;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            max-width: 400px;
            margin: auto;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        select,
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        button[type="submit"],
        a.back-btn {
            flex: 1;
            text-align: center;
            background-color: #2980b9;
            color: white;
            padding: 10px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 6px;
            border: none;
            text-decoration: none;
            cursor: pointer;
        }

        button[type="submit"]:hover,
        a.back-btn:hover {
            background-color: #1f6391;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h2>Tambah Gaji Karyawan</h2>
    <form method="POST">
        <label>Nama Karyawan:</label><br>
        <select name="id_karyawan" required>
            <option value="">-- Pilih Karyawan --</option>
            <?php while ($row = mysqli_fetch_assoc($karyawan)) { ?>
                <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
            <?php } ?>
        </select><br>

        <label>Jabatan:</label><br>
        <select name="id_jabatan" required>
            <option value="">-- Pilih Jabatan --</option>
            <?php while ($row = mysqli_fetch_assoc($jabatan)) { ?>
                <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
            <?php } ?>
        </select><br>

        <label>Total Gaji:</label><br>
        <input type="number" name="total_pendapatan" required><br>

        <div class="button-group">
            <button type="submit">💾 Simpan</button>
            <a href="gaji.php" class="back-btn">↩️ Kembali</a>
        </div>
    </form>
</body>
</html>
