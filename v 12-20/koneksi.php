<?php
$host = "localhost"; // ganti dengan host Anda
$user = "root"; // ganti dengan username Anda
$password = ""; // ganti dengan password Anda
$dbname = "crud"; // ganti dengan nama database Anda

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>