<?php
function swap(int &$n1, int &$n2)
{
    $temp = $n1;
    $n1 = $n2;
    $n2 = $temp;
}

function bubbleSort(array $array)
{
    $isSorted = true;
    $array_size = count($array);

    for ($i = 0; $i < $array_size - 1; $i++) { //for passes n-1
        for ($j = 0; $j < $array_size - 1 - $i; $j++) { //sorting
            if ($array[$j] > $array[$j + 1]) {
                swap($array[$j], $array[$j + 1]);
                $isSorted = false;
            }
        }
        $count++;
        if ($isSorted)
            break;
    }
    return $array;
}
function printArray($array)
{
    if (is_array($array)) {
        foreach ($array as $element) {
            echo "$element ";
        }
    }
}

printArray(bubbleSort([100, 60, 20, 50, 30, 90]));