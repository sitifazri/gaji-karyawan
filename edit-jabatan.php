<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM jabatan WHERE id = $id";
$result = mysqli_query($koneksi, $query);

if (!$result || mysqli_num_rows($result) === 0) {
    echo "Data tidak ditemukan.";
    exit;
}

$data = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_jabatan = $_POST['nama'];
    $gaji_pokok = $_POST['gaji_pokok'];
    $tunjangan = $_POST['tunjangan'];

    $update = "UPDATE jabatan SET nama = '$nama_jabatan', gaji_pokok = '$gaji_pokok', tunjangan = '$tunjangan' WHERE id = $id";
    if (mysqli_query($koneksi, $update)) {
        header("Location: jabatan.php");
        exit;
    } else {
        echo "Gagal update data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Jabatan</title>
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

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color:rgb(55, 158, 255);
            color: white;
            padding: 10px 18px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 6px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color:rgb(158, 202, 243);
        }

        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 6px;
        }

        .error {
            background-color: #c0392b;
            color: white;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        a.kembali {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
            color: #2980b9;
        }

        a.kembali:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Edit Jabatan</h2>

    <form method="POST">
        <?php if (isset($pesan_error)): ?>
            <div class="alert error"><?= $pesan_error ?></div>
        <?php endif; ?>

        <input type="hidden" name="id" value="<?= $data['id'] ?>">

        <label for="nama">Nama Jabatan:</label>
        <input type="text" name="nama" id="nama" value="<?= $data['nama'] ?>" required>

        <label for="gaji_pokok">Gaji Pokok:</label>
        <input type="number" name="gaji_pokok" id="gaji_pokok" value="<?= $data['gaji_pokok'] ?>" required>

        <label for="tunjangan">Tunjangan:</label>
        <input type="number" name="tunjangan" id="tunjangan" value="<?= $data['tunjangan'] ?>" required>

        <input type="submit" value="Update">
    </form>

    <a href="jabatan.php" class="kembali">← Kembali ke Daftar Jabatan</a>
</body>
</html>
