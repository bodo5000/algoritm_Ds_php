<?php

function swap(int &$n1, int &$n2)
{
    $temp = $n1;
    $n1 = $n2;
    $n2 = $temp;
}

function heapify(&$Array, $n, $i)
{
    $max = $i;
    $left = 2 * $i + 1;
    $right = 2 * $i + 2;

    if ($left <= $n && $Array[$left] > $Array[$max]) {
        $max = $left;
    }

    if ($right <= $n && $Array[$right] > $Array[$max]) {
        $max = $right;
    }

    if ($max != $i) {
        swap($Array[$i], $Array[$max]);
        heapify($Array, $n, $max);
    }
}
function heapSort(&$Array, $n)
{
    //build heap
    for ($i = (int) ($n / 2); $i >= 0; $i--) {
        heapify($Array, $n - 1, $i);
    }

    for ($i = $n - 1; $i >= 0; $i--) {
        swap($Array[$i], $Array[0]);
        heapify($Array, $i - 1, 0);
    }

    return $Array;
}

function printArray($array)
{
    if (is_array($array)) {
        foreach ($array as $element) {
            echo "$element ";
        }
    }
}

$array = [-4, 20, 100, 4, 50];

printArray(heapSort($array, count($array)));