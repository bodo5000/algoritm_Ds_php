<?php

function swap(int &$n1, int &$n2)
{
    $temp = $n1;
    $n1 = $n2;
    $n2 = $temp;
}

function partition(array &$arr, int $iBegin, int $jEnd)
{
    $i = $iBegin;
    $j = $jEnd;
    $pivLoc = $i;
    while (true) {
        while ($arr[$pivLoc] <= $arr[$j] && $pivLoc != $j) {
            $j--;
        }
        if ($pivLoc == $j)
            break;
        else if ($arr[$pivLoc] > $arr[$j]) {
            swap($arr[$j], $arr[$pivLoc]);
            $pivLoc = $j;
        }

        while ($arr[$pivLoc] >= $arr[$i] && $pivLoc != $i) {
            $i++;
        }
        if ($pivLoc == $i)
            break;
        else if ($arr[$pivLoc] < $arr[$i]) {
            swap($arr[$i], $arr[$pivLoc]);
            $pivLoc = $i;
        }
    }
    return $pivLoc;
}

function quickSort(array &$arr, int $l, int $h)
{

    if ($l < $h) {
        $piv = partition($arr, $l, $h);
        quickSort($arr, $l, $piv - 1);
        quickSort($arr, $piv + 1, $h);
    }

    return $arr;
}


function printArray($array)
{
    if (is_array($array)) {
        foreach ($array as $element) {
            echo "$element ";
        }
    }
}

$arr = [50, -1, 30, 100, 500];

printArray(quickSort($arr, 0, count($arr) - 1));