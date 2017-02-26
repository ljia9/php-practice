<?php

function swap(&$arr, $start, $end) {
    $temp = $arr[$start];
    $arr[$start] = $arr[$end];
    $arr[$end] = $temp;
}

###################
### Naive sorts ###
###################

/*
 * Note: You can save some space by sorting on the original array instead of a copy
 * So use the & operator to reference $arr
*/

function bubble(&$arr) {
    for ($i=0; $i<count($arr); $i++) {
        for ($j=0; $j<count($arr)-1; $j++) {
            if ($arr[$j] > $arr[$j+1]) swap($arr, $j, $j+1);
        }
    }
    return $arr;
}

function insertion(&$arr) {
    for ($i=0; $i<count($arr); $i++) {
        $j = $i;
        while ($j > 0 and ($arr[$j-1] > $arr[$j])) {
            swap($arr, $j, $j-1);
            $j--;
        }
    }
    return $arr;
}

function selection(&$arr) {
    for ($i=0; $i<count($arr)-1; $i++) {
        $min = $i;
        for ($j=$i+1; $j<count($arr); $j++) {
            if ($arr[$j] < $arr[$min]) $min = $j;
        } 
        
        if ($min != $i) swap($arr, $i, $min); 
    }

    return $arr;
}

// also called oddeven sort
function bricksort(&$arr) {
    $sorted = false;

    while (!$sorted) {
        $sorted = true;
        // sort odds by comparing to next elements
        for ($i=1; $i<count($arr)-1; $i+=2) {
            if ($arr[$i] > $arr[$i+1]) {
                swap($arr, $i, $i+1);
                $sorted = false;
            }
        }
        //evens here 
        for ($i=0; $i<count($arr)-1; $i+=2) {
            if ($arr[$i] > $arr[$i+1]) {
                swap($arr, $i, $i+1);
                $sorted = false;
            }
        }
    }
    return $arr;
}

###################
## Test functions #
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
$rand = randomInts(25, -100, 100);
print_r(bubble($rand));
print_r(insertion($rand));
print_r(selection($rand));
print_r(bricksort($rand));

?>
