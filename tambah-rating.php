<?php
include 'koneksi.php';

// Proses saat form dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rating = $_POST['rating'];

    if (!empty($rating)) {
        $query = "INSERT INTO rating (rating) VALUES ('$rating')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            header("Location: rating.php?pesan=tambah_sukses");
            exit;
        } else {
            $error = "Gagal menambahkan data: " . mysqli_error($koneksi);
        }
    } else {
        $error = "Nama rating tidak boleh kosong.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Rating</title>
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
        input[type="text"] {
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
        .error {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <h2>Tambah Rating Baru</h2>

    <?php if (!empty($error)) echo "<div class='error'>$error</div>"; ?>

    <form method="POST">
        <label for="rating">Nama Rating:</label>
        <input type="text" name="rating" id="rating" required>
        <input type="submit" value="Simpan">
    </form>
</body>
</html>
