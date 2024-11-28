<?php 
// create associative array
$associativeArray = [
    "key1" => "value1",
    "key2" => "value2",
    "key3" => "value3"
];

//contoh 1
$person = [
    "name" => "ali",
    "age" => 17,
    "email" => "ali123@example.com"
];

// Accessing values using keys
echo "Name: " . $person["name"] . "\n"; // Output: Name: ali
echo "Age: " . $person["age"] . "\n";   // Output: Age: 17
echo "Email: " . $person["email"] . "\n"; // Output: Email: ali123@example.com

//contoh 2
$person = [
    "name" => "ulin",
    "age" => 18,
    "email" => "ulingacor@example.com"
];

foreach ($person as $key => $value) {
    echo "$key: $value\n";
}

// Output:
// name:ulin
// age: 18
// email: ulingacor@example.com
?>