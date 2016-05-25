<?php

###################
# Define Mergesort#
###################

// recursively partition the array into smaller and smaller sublists
function mergesort($arr) {
    //base case to return if sublist has size of 1
    if (count($arr) <=1) return $arr;

    $left = $right = array();
    for ($i=0; $i<count($arr); $i++) {
        if ($i%2==0) array_push($left, $arr[$i]);
        else         array_push($right, $arr[$i]);
    }

    $left = mergesort($left);
    $right = mergesort($right);

    //now merge sorted sublists
    return merge($left, $right);
}

function merge($left, $right) {
    $ans = array();
    // actually sort the elements in the sublists naively
    while (!empty($left) and !empty($right)) {
        if ($left[0] <= $right[0]) {
            array_push($ans, $left[0]);
            array_shift($left);
        }
        else {
            array_push($ans, $right[0]);
            array_shift($right);
        }
    }

    // In case there are extra elements after main loop above, exhaust them and add
    // them to the ans array (they must be the largest elements now) 
    while (!empty($left)) {
        array_push($ans, $left[0]);
        array_shift($left);
    }
    while (!empty($right)) {
        array_push($ans, $right[0]);
        array_shift($right);
    }
    return $ans;
}

###################
## Test mergesort #
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
$rands = randomInts(50, -200, 200);
print_r($rands);
print_r(mergesort($sample));
print_r(mergesort($rands));
