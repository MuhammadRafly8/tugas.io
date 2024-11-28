<?php 
// date
function tampilkanTanggalWaktu() {
    return date("Y-m-d H:i:s");
}
echo "Tanggal dan Waktu Sekarang: " . tampilkanTanggalWaktu() . "<br>";

// untuk menapmilkan tanggal dengan format tertentu
function tampilkanTanggal($format) {
    // Mengembalikan tanggal saat ini dalam format yang ditentukan
    return date($format);
}

// Memanggil fungsi dengan berbagai format
echo "Tanggal dalam format Y-m-d: " . tampilkanTanggal("Y-m-d") . "<br>";//output > 2020-02-12
echo "Tanggal dalam format d/m/Y: " . tampilkanTanggal("d/m/Y") . "<br>"; //output > 12/02/2020
echo "Tanggal dalam format F j, Y: " . tampilkanTanggal("F j, Y") . "<br>"; //output > Februari 12, 2020
echo "Tanggal dalam format l, d F Y: " . tampilkanTanggal("l, d F Y") . "<br>"; //output > senin, 11 november 2024
// Y = tahun dalam 4 digit, m = bulan dalam 2 digit, d = hari dalam 2 digit, F =  Nama bulan dalam format lengkap (contoh: Oktober), l = nama hari

// echo date("L, D-M-Y");

echo date("L, D-M-Y");

// time
// Mengatur zona waktu
date_default_timezone_set("Asia/Jakarta");

// Mendapatkan timestamp saat ini
$timestamp = time();

// Menampilkan timestamp
echo "Timestamp saat ini: " . $timestamp . "<br>";

// Mengonversi timestamp ke format tanggal
$tanggal = date("Y-m-d H:i:s", $timestamp);
echo "Waktu saat ini: " . $tanggal . "<br>";
?>