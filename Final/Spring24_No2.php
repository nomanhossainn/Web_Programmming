<?php
$seed = 7;
$term = 5;
$previous = $seed;

function sumOfDigits($previous)
{
    $sum = 0; 
    while ($previous != 0) {
        $temp = $previous % 10; 
        $sum = $sum + $temp; 
        $previous = $previous / 10; 
    }
    return $sum;
}
for ($i = 0; $i < $term; $i++) {
    echo $previous . ", ";
    $previous = $previous + sumOfDigits($previous);
}
