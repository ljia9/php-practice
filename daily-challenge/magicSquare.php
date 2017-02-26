<?php

function printe($string) {
    printf($string);
    printf("\r\n");
}

function trueFalse($sym) {
    if ($sym == "1") print("True");
    else print("False");
}

########################
## Challenge functions #
########################

function isSquare($arr) {
    $a = sqrt(count($arr));
    if ((int)$a == $a) return true;
    return false;
}

function isMagicSquare($arr) {
    if (!isSquare($arr)) throw new Exception('Error: input is not a square!');

    $a = sqrt(count($arr));
    $magicNum = ($a*(pow($a, 2) + 1)) / 2;
    $k = 0;
    
    for ($i=0; $i<$a; $i++) {
        $sum  = 0;
        $sum1 = 0;
        // check rows
        for($j=$k; $j<$k+$a; $j++) {
            $sum += $arr[$j];
        }
        $k += $a;
        // check columns
        for($j=$i; $j<count($arr); $j+=$a) {
            $sum1 += $arr[$j];
        }
        if ($sum != $magicNum or $sum1 != $magicNum) return false;
    }

    // check diagonals
    for ($i=0; $i<2; $i++) {
        $sum  = 0;
        $sum1 = 0;
        for($j=0; $j<count($arr); $j +=$a+1) {
            $sum += $arr[$j];
        }
        for($j=count($arr)-$a; $j>0; $j = $j-$a+1) {
            $sum1 += $arr[$j];
        }
        if ($sum != $magicNum or $sum1 != $magicNum) return false;
    }
    
    return true;

}

###################
## Call functions #
###################

$true1 = array(8, 1, 6, 3, 5, 7, 4, 9, 2);
$true2 = array(2, 7, 6, 9, 5, 1, 4, 3, 8);
$true3 = array(1, 15, 14, 4, 10, 11, 8, 5, 7, 6, 9, 12, 16, 2, 3, 13);
$false1 = array(3, 5, 7, 8, 1, 6, 4, 9, 2);
$false2 = array(8, 1, 6, 7, 5, 3, 4, 9, 2);
$false3 = array(1, 15, 14, 4, 10, 11, 8, 5, 7, 6, 9, 12, 16, 2, 3);

printe(trueFalse(isMagicSquare($true1)));
printe(trueFalse(isMagicSquare($true2)));
printe(trueFalse(isMagicSquare($true3)));
printe(trueFalse(isMagicSquare($false1)));
printe(trueFalse(isMagicSquare($false2)));
printe(trueFalse(isMagicSquare($false3)));

