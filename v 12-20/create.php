<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nrp = $_POST['nrp'];
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];

    // Upload gambar
    $gambar = $_FILES['gambar']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($gambar);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Cek apakah file adalah gambar JPG
    if ($imageFileType !== 'jpg') {
        die("Hanya file JPG yang diperbolehkan.");
    }

    // Cek apakah ada error saat upload
    if ($_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
            // Menggunakan prepared statement untuk menghindari SQL Injection
            $stmt = $conn->prepare("INSERT INTO mahasiswa (nama, nrp, email, jurusan, gambar) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $nama, $nrp, $email, $jurusan, $target_file);
            $stmt->execute();
            $stmt->close();
        } else {
            die("Error uploading file.");
        }
    } else {
        die("Upload file error: " . $_FILES['gambar']['error']);
    }

    // Redirect kembali ke halaman CRUD setelah berhasil
    header("Location: crud.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Tambah Mahasiswa</h1>
    
    <form method="POST" action="create.php" enctype="multipart/form-data"> <!-- Perbaikan di sini -->
        <input type="text" name="nama" placeholder="Nama" required>
        <input type="text" name="nrp" placeholder="NRP" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="jurusan" placeholder="Jurusan" required>
        <input type="file" name="gambar" accept=".jpg" required>
        <button type="submit" name="submit">Tambah Mahasiswa</button>
    </form>

    <p><a href="crud.php">Kembali ke Data Mahasiswa</a></p>
</body>
</html>