<?php
$arr = [1, 2, 3, 4, 5];
$searchElement = 6;

echo "The elements of array: ";
foreach($arr as $value){
    echo "{$value} <br>";
}

 foreach($arr as $v){
    if($v == $searchElement){
        echo "{$searchElement} is found <br>";
    }    
}
 echo "{$searchElement} is not found <br>";



?>