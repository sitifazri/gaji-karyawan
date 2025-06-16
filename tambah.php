<!DOCTYPE html>
<html>
<head>
    <title>Tambah Karyawan</title>
</head>
<body>
    <h1>Tambah Data Karyawan</h1>
    <form action="tambah_proses.php" method="POST">
        Nama: <input type="text" name="nama" required><br><br>
        Jabatan: <input type="text" name="jabatan"><br><br>
        Gaji Pokok: <input type="number" name="gaji_pokok"><br><br>
        Tunjangan: <input type="number" name="tunjangan"><br><br>
        <input type="submit" value="Simpan">
    </form>
</body>
</html>
