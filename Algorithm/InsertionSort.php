<?php

function insertionSort($a)
{
    for ($i = 0; $i < count($a); $i++) {
        $key = $a[$i];
        $j = $i - 1;

        while ($j >= 0 && $a[$j] > $key) {
            $a[$j + 1] = $a[$j];
            $j--;
        }
        $a[$j + 1] = $key;
    }
    return $a;
}

function printArray(array $a)
{
    foreach ($a as $element) {
        echo "$element ";
    }

    echo "\n";
}

$arr = [80, 90, 60, 30, 50, 70, 40];

printArray(insertionSort($arr));