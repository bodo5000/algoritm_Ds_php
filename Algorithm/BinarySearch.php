<?php

function binarySearch($arr, $target)
{
    $left = 0;
    $right = count($arr) - 1;
    while ($left <= $right) {
        $mid = floor(($left + $right) / 2);

        if ($arr[$mid] === $target) {
            return $arr[$mid];
        }
        if ($arr[$mid] < $target) {
            $left = $mid + 1;
        } else {
            $right = $mid - 1;
        }
    }

    echo "that target not in array";
}

$array = [20, 30, 40, 50];

echo binarySearch($array, 100);