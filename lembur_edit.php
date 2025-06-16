<?php
include 'koneksi.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID tidak ditemukan.");
}

$id = $_GET['id'];
$query = "SELECT * FROM lembur WHERE id = '$id'";
$result = mysqli_query($koneksi, $query);

if (!$result || mysqli_num_rows($result) === 0) {
    die("Data lembur tidak ditemukan.");
}

$data = mysqli_fetch_assoc($result);

// Proses update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_jabatan = $_POST['id_jabatan'];
    $tarif = $_POST['tarif'];
    $jumlah_jam = $_POST['jumlah_jam'];

    $update = "UPDATE lembur SET 
                id_jabatan = '$id_jabatan', 
                tarif = '$tarif', 
                jumlah_jam = '$jumlah_jam' 
               WHERE id = '$id'";
    $result = mysqli_query($koneksi, $update);

    if ($result) {
        header("Location: lembur.php");
        exit;
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Tarif Lembur</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #ecf0f1;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 480px;
            margin: 60px auto;
            background-color: #ffffff;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
        }
        label {
            font-weight: 600;
            margin-bottom: 6px;
            display: block;
            color: #34495e;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-bottom: 22px;
            font-size: 15px;
            transition: border 0.2s;
        }
        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #2980b9;
            outline: none;
        }
        .actions {
            text-align: center;
        }
        button,
        .back-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            background-color: #2980b9;
            color: white;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            margin: 0 5px;
            transition: background-color 0.3s;
        }
        button:hover,
        .back-btn:hover {
            background-color: #1f6391;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Tarif Lembur</h2>
        <form method="POST" action="">
            <label for="id_jabatan">Nama Jabatan</label>
            <input type="text" name="id_jabatan" id="id_jabatan" value="<?= htmlspecialchars($data['id_jabatan']) ?>" required>

            <label for="tarif">Tarif Per Jam (Rp)</label>
            <input type="number" name="tarif" id="tarif" value="<?= htmlspecialchars($data['tarif']) ?>" min="0" required>

            <label for="jumlah_jam">Jumlah Jam</label>
            <input type="number" name="jumlah_jam" id="jumlah_jam" value="<?= htmlspecialchars($data['jumlah_jam']) ?>" min="0" required>

            <div class="actions">
                <button type="submit">💾 Simpan</button>
                <a href="lembur.php" class="back-btn">↩️ Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
