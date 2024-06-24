<?php

function linearSearch(array $array, $target)
{
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] == $target) {
            return $array[$i];
        }
    }

    echo "that target is not in array\n";
}


$array = [20, 30, 40, 50];

echo linearSearch($array, 100);