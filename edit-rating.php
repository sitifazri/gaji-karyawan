<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM rating WHERE id = $id";
$result = mysqli_query($koneksi, $query);

if (!$result || mysqli_num_rows($result) === 0) {
    echo "Data tidak ditemukan.";
    exit;
}

$data = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $presentase = $_POST['presentase_bonus'];
    $rating = $_POST['rating'];

    $update = "UPDATE rating SET presentase_bonus = '$presentase', rating = '$rating' WHERE id = $id";
    if (mysqli_query($koneksi, $update)) {
        header("Location: rating.php");
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
    <title>Edit Rating</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 40px;
        }
        .form-container {
            background-color: #fff;
            padding: 30px;
            width: 400px;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #2c3e50;
        }
        label {
            display: block;
            margin: 12px 0 6px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn-submit {
            background-color: #2c3e50;
            color: white;
            padding: 12px;
            width: 100%;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .btn-submit:hover {
            background-color: #1a252f;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit Rating Karyawan</h2>
        <form method="post">
            <label for="presentase_bonus">Presentase Bonus</label>
            <input type="text" id="presentase_bonus" name="presentase_bonus" value="<?= htmlspecialchars($data['presentase_bonus']) ?>" required>

            <label for="rating">Rating (1–5)</label>
            <input type="number" id="rating" name="rating" min="1" max="5" value="<?= htmlspecialchars($data['rating']) ?>" required>

            <button class="btn-submit" type="submit">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
