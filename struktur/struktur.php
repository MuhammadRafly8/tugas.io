<?php 
//pengulangan

//for
// Print numbers from 1 to 10
for ($i = 1; $i <= 10; $i++) {
    echo "Number: $i\n";
}

//while
$i = 1; // Initialization

// menampilkan nomer mulai 1 sampe 10
while ($i <= 10) {
    echo "Number: $i\n";
    $i++; // Increment
}

//do while
$i = 1;
// Print numbers from 1 to 10 using do...while
do {
    echo "Number: $i\n";
    $i++;
} while ($i <= 10);

//foreach
class Person {
    public $name;
    public $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }
}

$people = [
    new Person("Al", 25),
    new Person("bei", 30),
    new Person("can", 35)
];

// Print each person's name and age
foreach ($people as $person) {
    echo "{$person->name} is {$person->age} years old.\n";
}
?>