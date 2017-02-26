<?php

###################
# Define Bogosort #
###################

// one of the worst sorts available: just randomly shuffle the array
function bogosort($arr) {
    while (!arraySorted($arr)) 
        shuffle($arr);
    
    return $arr;
}

// lol have to check if $arr is sorted by sorting it
function arraySorted($arr) {
    $a = $arr;
    sort($a);
    if ($a == $arr) return true;
    else            return false; 
}

###################
#### Test Sort ####
###################

$sample = array(10, -2, 4, 1, 5, 3, 6, 2, 4, 0);
print_r(bogosort($sample));
