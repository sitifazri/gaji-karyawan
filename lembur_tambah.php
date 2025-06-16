<?php
include 'koneksi.php';


// Proses form ketika disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_jabatan = mysqli_real_escape_string($koneksi, $_POST['id_jabatan']);
    $tarif = mysqli_real_escape_string($koneksi, $_POST['tarif']);
    $jumlah_jam = mysqli_real_escape_string($koneksi, $_POST['jumlah_jam']);

    if ($id_jabatan && $tarif && $jumlah_jam) {
        $query = "INSERT INTO lembur (id_jabatan, tarif, jumlah_jam) 
                  VALUES ('$id_jabatan', '$tarif', '$jumlah_jam')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            header("Location: lembur.php");
            exit;
        } else {
            $error = "Gagal menambahkan data: " . mysqli_error($koneksi);
        }
    } else {
        $error = "Semua field wajib diisi!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Tarif Lembur</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f7fb;
            padding: 20px;
            margin: 0;
        }
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            max-width: 520px;
            margin: 50px auto;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
        }
        h2 {
            margin-bottom: 25px;
            color: #2c3e50;
            text-align: center;
        }
        label {
            font-weight: 600;
            display: block;
            margin-bottom: 6px;
            color: #34495e;
        }
        select, input[type="number"] {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
            transition: border-color 0.3s ease;
        }
        select:focus, input:focus {
            border-color: #2980b9;
            outline: none;
        }
        .button-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        button {
            background-color: #2980b9;
            border: none;
            color: white;
            padding: 10px 20px;
            font-size: 15px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #1f6391;
        }
        .back-btn {
            background-color: #7f8c8d;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 6px;
            color: white;
            font-size: 15px;
        }
        .back-btn:hover {
            background-color: #636e72;
        }
        .alert {
            background: #f8d7da;
            color: #721c24;
            padding: 10px 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Tarif Lembur</h2>

        <?php if (isset($error)) : ?>
            <div class="alert"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <label for="id_jabatan">Nama Jabatan</label>
            <input type="text" name="id_jabatan" id="id_jabatan"  required>


            <label for="tarif">Tarif Per Jam (Rp)</label>
            <input type="number" name="tarif" id="tarif" min="0" required>

            <label for="jumlah_jam">Jumlah Jam</label>
            <input type="number" name="jumlah_jam" id="jumlah_jam" min="0" required>

            <div class="button-group">
                <button type="submit">💾 Simpan</button>
                <a href="lembur.php" class="back-btn">↩️ Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
