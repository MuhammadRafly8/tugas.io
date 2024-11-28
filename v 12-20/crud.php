<?php
include 'koneksi.php';

$search = '';
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $stmt = $conn->prepare("SELECT * FROM mahasiswa WHERE nama LIKE ? OR nrp LIKE ? OR email LIKE ? OR jurusan LIKE ?");
    $searchParam = "%" . $search . "%";
    $stmt->bind_param("ssss", $searchParam, $searchParam, $searchParam, $searchParam);
    $stmt->execute();
    $mahasiswa = $stmt->get_result();
} else {
    $mahasiswa = $conn->query("SELECT * FROM mahasiswa");
}

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']); // Menggunakan intval untuk memastikan $id adalah integer
    $stmt = $conn->prepare("DELETE FROM mahasiswa WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Data Mahasiswa</h1>
    
    <form method="GET" action="">
        <input type="text" name="search" placeholder="Cari Mahasiswa" value="<?php echo htmlspecialchars($search); ?>">
        <input type="submit" value="Cari">
    </form>

    <p><a href="create.php">Tambah Mahasiswa</a></p>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NRP</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $mahasiswa->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['nrp']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['jurusan']; ?></td>
            <td><img src="<?php echo $row['gambar']; ?>" alt="Gambar" width="100"></td>
            <td>
                <a href="?delete=<?php echo $row['id']; ?>">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>