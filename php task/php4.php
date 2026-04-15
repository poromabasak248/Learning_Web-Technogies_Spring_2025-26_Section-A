<?php
$num1 = 8;
$num2 = 24;
$num3 = 3;

echo " Given Three numbers: 8 , 24, 3 <br>";

if($num1 > $num2 && $num1 > $num3){
    echo "{$num1} is the LARGEST number <br>";
}
else if($num2 > $num1 && $num2 > $num3){
    echo "{$num2} is the LARGEST number <br>";
}
else{
    echo "{$num3} is the LARGEST number <br>";
}



?>