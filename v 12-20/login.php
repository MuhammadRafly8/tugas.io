<?php
session_start(); // Memulai session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Koneksi ke database
    $servername = "localhost";
    $username = "root"; // default username XAMPP
    $password = ""; // default password XAMPP
    $dbname = "login";

    // Membuat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Memeriksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Mengambil data dari form
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];
    $remember = isset($_POST['remember']); // Mengetahui apakah "Ingat saya" dicentang

    // Mencari user di database
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mengambil data pengguna
        $row = $result->fetch_assoc();
        // Memeriksa password
        if (password_verify($password, $row['password'])) {
            // Password benar, simpan data pengguna di session
            $_SESSION['username'] = $row['username'];
            echo "Login berhasil! Selamat datang, " . $row['username'];

            // Jika "Ingat saya" dicentang, set cookie
            if ($remember) {
                setcookie("username", $row['username'], time() + (86400 * 30), "/"); // Cookie berlaku selama 30 hari
                setcookie("password", $password, time() + (86400 * 30), "/"); // Cookie berlaku selama 30 hari
            } else {
                // Hapus cookie jika tidak dicentang
                if (isset($_COOKIE['username'])) {
                    setcookie("username", "", time() - 3600, "/");
                }
                if (isset($_COOKIE['password'])) {
                    setcookie("password", "", time() - 3600, "/");
                }
            }

            // Redirect atau lakukan tindakan lain setelah login berhasil
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Username tidak ditemukan!";
    }

    // Menutup koneksi
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <style>
        /* (CSS Anda tetap sama) */
    </style>
</head>
<body>
    <h2>Form Login</h2>
    <form action="login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : ''; ?>" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo isset($_COOKIE['password']) ? $_COOKIE['password'] : ''; ?>" required><br><br>

        <input type="checkbox" id="remember" name="remember" <?php echo isset($_COOKIE['username']) ? 'checked' : ''; ?>>
        <label for="remember">Ingat saya</label><br><br>
        
        <input type="submit" value="Login">
    </form>
</body>
</html>