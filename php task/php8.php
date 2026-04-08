<?php

echo "The array to declare: <br>";

$arr = [
    [1, 2, 3, 'A'],
    [1, 2, 'B', 'C'],
    [1, 'D', 'E', 'F'],
];

foreach ($arr as $row) {
    foreach ($row as $value) {
        echo "{$value} ";
    }
    echo "<br>";
}

echo "<br>";
echo "Shape 1: <br>";

for ($i = 3; $i >= 1; $i--) {
    for ($j = 1; $j <= $i; $j++) {
        echo "{$j} ";
    }
    echo "<br>";
}

echo "<br>";
echo "Shape 2: <br>";

$char = 'A';

for ($i = 1; $i <= 3; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "{$char} ";
        $char++;
    }
    echo "<br>";
}


?>