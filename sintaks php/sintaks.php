<?php
// Operator and aritmatika
$a = 10;
$b = 3;

echo "Penjumlahan: " . ($a + $b) . "<br>"; //output = 13
echo "Pengurangan: " . ($a - $b) . "<br>"; //output = 7
echo "Perkalian: " . ($a * $b) . "<br>"; //output = 30
echo "Pembagian: " . ($a / $b) . "<br>"; //output = 3.3333
echo "Modulus: " . ($a % $b) . "<br>"; //output = 1
// Penggabungan string/ concatenation / concat 
$greeting = "Hello";
$name = "Alice";
$punctuation = "!";

// Menggabungkan beberapa string
$message = $greeting . ", " . $name . $punctuation;

echo $message; // Output: Hello, Alice!

// Menggabungkan string dengan variabel
$city = "Jakarta";
$country = "Indonesia";

$location = "Kota: " . $city . ", Negara: " . $country;

echo $location; // Output: Kota: Jakarta, Negara: Indonesia

// Assignment 

// assigment penjumlahan
$x = 10;
$x += 5; 
echo "Nilai x setelah penugasan penjumlahan: " . $x . "<br>"; // Output: Nilai x setelah penugasan penjumlahan: 15

// assignment array
$fruits = [];
$fruits[] = "Apel";
$fruits[] = "Pisang"; 

echo "Daftar Buah: " . implode(", ", $fruits) . "<br>"; // Output: Daftar Buah: Apel, Pisang

// Perbandingan 
$a = 5;
$b = '5';

if ($a == $b) {
    echo "a dan b sama (sama dengan).<br>"; // Output: a dan b sama (sama dengan).
}

// Identitas
$a = 5;
$b = '5';

if ($a === $b) {
    echo "a dan b identik.<br>";
} else {
    echo "a dan b tidak identik.<br>"; // Output: a dan b tidak identik.
}

// Var_dump
$integer = 42;
$string = "Hello, World!";
$array = array(1, 2, 3, "four");
$object = (object) ['property' => 'value'];

// Using var_dump to display information about the variables
var_dump($integer);
var_dump($string);
var_dump($array);
var_dump($object);

// Logika
$score = 85;

//if-else
if ($score >= 90) {
    echo "Grade: A";
} elseif ($score >= 80) {
    echo "Grade: B"; // This will be printed
} elseif ($score >= 70) {
    echo "Grade: C";
} else {
    echo "Grade: D";
}

// switch case
$day = 3;

switch ($day) {
    case 1:
        echo "Monday";
        break;
    case 2:
        echo "Tuesday";
        break;
    case 3:
        echo "Wednesday"; 
        break;
    default:
        echo "Another day";
}
?>