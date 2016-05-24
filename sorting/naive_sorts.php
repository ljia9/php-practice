<?php

function swap($arr, $start, $end) {
    $temp = $arr[$start];
    $arr[$start] = $arr[$end];
    $arr[$end] = $temp;
    return $arr;
}

###################
### Naive sorts ###
###################

function bubble($arr) {
    for ($i=0; $i<count($arr); $i++) {
        for ($j=0; $j<count($arr)-1; $j++) {
            if ($arr[$j] > $arr[$j+1]) $arr = swap($arr, $j, $j+1);
        }
    }
    return $arr;
}

function insertion($arr) {
    for ($i=0; $i<count($arr); $i++) {
        $j = $i;
        while ($j > 0 and ($arr[$j-1] > $arr[$j])) {
            $arr = swap($arr, $j, $j-1);
            $j--;
        }
    }
    return $arr;
}

function selection($arr) {
    for ($i=0; $i<count($arr)-1; $i++) {
        $min = $arr[0];
        for ($j=$i+1; $j<=$i; $j++) {
            if ($arr[$j] > $arr[$min]) $min = $j;
        } 
        
        if ($min != $i) $arr = swap($arr, $i, $j); 
    }

    return $arr;
}

###################
## Test functions #
###################

$sample = array(10, -2, 4, 1, 5, 3, 6, 2, 4, 0);
print_r(bubble($sample));
print_r(insertion($sample));
print_r(selection($sample));

?>
