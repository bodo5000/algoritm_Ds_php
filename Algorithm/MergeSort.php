<?php

function merge(&$arr, $left, $middle, $right)
{
    $leftArrayLength = $middle - $left + 1;
    $rightArrayLength = $right - $middle;

    $leftArray = array_slice($arr, $left, $leftArrayLength);
    $rightArray = array_slice($arr, $middle + 1, $rightArrayLength);

    $i = 0;
    $j = 0;
    $k = $left;

    while ($i < $leftArrayLength && $j < $rightArrayLength) {
        if ($leftArray[$i] <= $rightArray[$j]) {
            $arr[$k] = $leftArray[$i];
            $i++;
        } else {
            $arr[$k] = $rightArray[$j];
            $j++;
        }
        $k++;
    }

    while ($i < $leftArrayLength) {
        $arr[$k] = $leftArray[$i];
        $i++;
        $k++;
    }

    while ($j < $rightArrayLength) {
        $arr[$k] = $rightArray[$j];
        $j++;
        $k++;
    }
}

function mergeSort(&$arr, $left, $right)
{
    if ($left < $right) {

        $middle = $left + (int) (($right - $left) / 2);

        mergeSort($arr, $left, $middle);
        mergeSort($arr, $middle + 1, $right);
        merge($arr, $left, $middle, $right);
    }

    return $arr;
}

function printArray(array $a)
{
    foreach ($a as $element) {
        echo "$element ";
    }

    echo "\n";
}

$arr = [80, 90, 60, 30, 50, 70, 40];

printArray(mergeSort($arr, 0, count($arr) - 1));