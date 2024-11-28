<?php
//membuat array
//cara lama
$nama = array("Rahmad", "Rifqi", "Rizki");
//cara baru
$bulan = ["januari", "febuary", "maret"];

//menampilkan array
//var_dump / print(r)
var_dump($nama);
echo "<br>";
print_r($bulan);
echo "<br>";
//menambahkan data ke array
$nama[] = "Rahmad";

//pengulangan pada array
//for 
for ($i = 0; $i < count($nama); $i++) {
    echo $nama[$i] . "<br>";
}

//foreach
// Mendeklarasikan array
$buah = array("Apel", "Pisang", "Jeruk", "Mangga", "Anggur");

// Menggunakan foreach untuk mengulangi elemen dalam array
foreach ($buah as $item) {
    echo "Buah: " . $item . "<br>";
}
?>