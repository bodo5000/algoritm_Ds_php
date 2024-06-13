<?php

function swap(int &$n1, int &$n2)
{
    $temp = $n1;
    $n1 = $n2;
    $n2 = $temp;
}

function selectionSort(array $a, string $sortType = 'asc')
{
    $array_size = count($a);
    $sortType = strtolower($sortType);

    for ($i = 0; $i < $array_size - 1; $i++) {
        $min_i = $i;
        for ($j = $i + 1; $j < $array_size; $j++) {
            if ($sortType == 'asc') {
                if ($a[$j] < $a[$min_i]) {
                    $min_i = $j;
                }
            } elseif ($sortType == 'desc') {
                if ($a[$j] > $a[$min_i]) {
                    $min_i = $j;
                }
            } else {
                echo 'sort type must be asc or desc';
                return;
            }
        }
        if ($i != $min_i) {
            swap($a[$i], $a[$min_i]);
        }
    }
    return $a;
}
function printArray($array)
{
    if (is_array($array)) {
        foreach ($array as $element) {
            echo "$element ";
        }
    }
}

printArray(selectionSort([60, 40, 50, 30, 10, 20, 5], 'asc'));