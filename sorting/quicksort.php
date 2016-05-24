<?php

####################
# Define Quicksort #
####################

function quicksort($arr) {
    // base case: if only one element, done partitioning/sorting
    if (count($arr) < 2) return $arr;

    //reset($arr);
    $left = $right = array();
    $pivot = array_shift($arr);

    for ($i=0; $i<count($arr); $i++) {
        if ($arr[$i] < $pivot) array_push($left, $arr[$i]);
        else                   array_push($right, $arr[$i]);
    }

    // recursive, divide and conqueor call here on partition;
    return array_merge(quicksort($left), array($pivot), quicksort($right));
}

###################
#### Test Sort ####
###################

// populate an array with random integers in a certain range
function randomInts($num, $hi, $lo) {
    $ans = array();
    foreach (range(0, $num) as $i) {
        $a = rand($lo, $hi);
        array_push($ans, $a);
    }
    return $ans;
}

$sample = array(10, -2, 4, 1, 5, 3, 6, 2, 4, 0);
$rands = randomInts(50, -100, 100);
print_r($rands);
print_r(quicksort($rands));

//in reality, use php's implementation: sort();
