<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($koneksi, trim($_POST['nama']));
    $gaji_pokok = mysqli_real_escape_string($koneksi, trim($_POST['gaji_pokok']));
    $tunjangan = mysqli_real_escape_string($koneksi, trim($_POST['tunjangan']));

    if ($nama == "" || $gaji_pokok == "" || $tunjangan == "") {
        header("Location: tambah-jabatantambah.php?pesan=kosong");
        exit;
    } else {
        $query = "INSERT INTO jabatan (nama, gaji_pokok, tunjangan) VALUES ('$nama', '$gaji_pokok', '$tunjangan')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            header("Location: jabatan.php?pesan=tambah_sukses");
            exit;
        } else {
            // Untuk debugging: aktifkan ini saat develop
            // echo "Query Error: " . mysqli_error($koneksi);
            header("Location: jabatan-tambah.php?pesan=gagal");
            exit;
        }
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Jabatan</title>
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
            background-color: #2980b9;
            color: white;
            padding: 10px 18px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 6px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #1f6391;
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
    <h2>Tambah Jabatan Baru</h2>

    <form method="POST" action="tambah-jabatan.php">
        <?php if (isset($_GET['pesan'])): ?>
            <?php if ($_GET['pesan'] == 'kosong'): ?>
                <div class="alert error">Nama jabatan, gaji pokok, dan tunjangan tidak boleh kosong.</div>
            <?php elseif ($_GET['pesan'] == 'gagal'): ?>
                <div class="alert error">Gagal menambahkan jabatan. Silakan coba lagi.</div>
            <?php endif; ?>
        <?php endif; ?>

        <label for="nama">Nama Jabatan:</label>
        <input type="text" name="nama" id="nama" required>

        <label for="gaji_pokok">Gaji Pokok:</label>
        <input type="number" name="gaji_pokok" id="gaji_pokok" required>

        <label for="tunjangan">Tunjangan:</label>
        <input type="number" name="tunjangan" id="tunjangan" required>

        <input type="submit" value="Simpan">
    </form>

    <a href="jabatan.php" class="kembali">← Kembali ke Daftar Jabatan</a>
</body>
</html>

