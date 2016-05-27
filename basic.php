<?php

###################
# helper functions#
###################

function printe($string) {
    printf($string);
    printf("\r\n");
}

function trueFalse($sym) {
    if ($sym == "1") print("True");
    else print("False");
}

// swap elements from two specified points
function swap(&$arr, $start, $end) {
    $temp = $arr[$start];
    $arr[$start] = $arr[$end];
    $arr[$end] = $temp;
}

##########################
# functions defined here #
##########################

function fizzBuzz($n) {
    foreach (range(0, $n) as $i) {
        if ($i % 15 == 0) printe("fizzBuzz");
        elseif ($i % 5 == 0) printe("Buzz");
        elseif ($i % 3 == 0) printe("fizz");
        else printe($i);
    }
}

function reverseString($str) {
    $ans = "";
    $length = strlen($str)-1;
    for ($i=$length; $i>=0; $i--) {
        $char = substr($str, $i, 1);
        $ans = $ans . $char;
    }
    return $ans;
}

// fermatTest for prime numbers that does not necessarily work because of invalid fermat tests
function fermatTest($num, $k) {
    foreach (range(3, $k) as $i) {
        $a = rand(2, $num-2);
        $b = pow($a, ($num - 1));
        if ($b % $num != 1) return false;
    }
    return true;
}

// simple test if number is prime, not optimal
function isPrime($num) {
    if ($num == 2 or $num == 3 or $num ==5 or $num == 7) return true;
    if ($num % 2 == 0 and $num!=2) return false;
    if ($num % 3 == 0 and $num!=3) return false;
    foreach (range(3, ceil(sqrt($num))) as $i) {
        if ($num % $i == 0) return false;
    }
    return true;
}

function factor($num) {
    $ans = array();
    foreach (range(1, ceil(sqrt($num))) as $i) {
        if ($num % $i == 0) array_push($ans, $i);
    }
    array_push($ans, $num);
    //print_r($ans);
    return $ans;
}

// dumb recursive version of collatz sequence
function collatz($num, $count) {
    if ($num == 1) return $count;
    if ($num % 2 == 0) { $n = $num / 2; $count++; return collatz($n, $count); }
    else { $n = 3*$num + 1; $count++; return collatz($n, $count); }
}

// find circular primes by circling around int by the ten's place
function partitionInt($seq) {
    $length = strlen((string)$seq);
    $ans = array();
    $s = $seq;
    if (isPrime($seq) == false) return false;
    foreach (range(1, $length) as $i) {
        $t = $s / 10;
        $s = $s % 10;
        $u = floor(pow(10, ($length-1))*$s + $t);
        //array_push($ans, $u);
        $s = $u;
        if (isPrime($u) == false) return false;
    }
    return true;
}

// find the permuations of integers from 0 to $num badly
function permute($num) {
    $ans = array();
    $vals = array();
    foreach (range(0,$num) as $val) { array_push($vals, $val); }
    #for ($i=0; $i<gmp_fact(count($vals)); $i++) 
    for ($i=0; $i<=$num; $i++) {
        if ($i != 0) {
            $t = $vals[0];
            $vals[0] = $vals[count($vals)-1];
            $vals[count($vals)-1] = $t;
        }
        for($j=1; $j<$num; $j++) {
            $temp = $vals[$j];
            $vals[$j] = $vals[$j+1]; 
            $vals[$j+1] = $temp; 
            var_dump($vals); 
        }
    }
}

// simple caesar cipher to shift ascii value by specified shiftNum
function caesarEncrypt($message, $shiftNum) {
    $length = strlen($message);
    $ans = "";
    for ($i=0; $i<$length; $i++) {
        $a = ord($message[$i]);
        if ($a < 65 or $a > 122 or ($a >90 and $a < 97)) $ans = $ans . $message[$i];
        elseif ($a >= 97 and $a <= 122) {
            $b = ((($a%97) + $shiftNum)%26); 
            if ($b < 0) $b += 26; // fix negative mod values here
            $ans = $ans . chr($b + 97);
        }
        else {
            $b = ((($a%65) + $shiftNum)%26); 
            if ($b < 0) $b += 26;
            $ans = $ans . chr($b + 65);
        }
    }
    return $ans;
}

// decrypt caesar cipher. Just reverse direction of shiftNum
function caesarDecrypt($message, $shiftNum) {
    $length = strlen($message);
    $ans = "";
    for ($i=0; $i<$length; $i++) {
        $a = ord($message[$i]);
        if ($a < 65 or $a > 122 or ($a >90 and $a < 97)) $ans = $ans . $message[$i];
        elseif ($a >= 97 and $a <= 122) {
            $b = ((($a%97) - $shiftNum)%26); 
            if ($b < 0) $b += 26;
            $ans = $ans . chr($b + 97);
        }
        else {
            $b = ((($a%65) - $shiftNum)%26); 
            if ($b < 0) $b += 26;
            $ans = $ans . chr($b + 65);
        }
    }
    return $ans;
}

// reverse elements in an array between the index range i to j
function reverseBetween($arr, $i, $j) {
    while ($i < $j) {
        swap($arr, $i, $j);
        $i++;
        $j--;
    }
    return $arr;
}

function wrapReverse($arr, $i, $j) {
    // reverse elements in an array wrapping around the index range i to j
    $length = count($arr);
    $numSwaps = ($length - $j + $i) / 2;
    $counter = 0;

    while ($counter <= $numSwaps) {
        swap($arr, $i, $j);
        $i = ($i-1) % $length;
        $j = ($j+1) % $length;
        if ($i < 0) $i += $length; // fix negative mod values here

        $counter++;
    }
    return $arr;
}

function stringEntropy($str) {
    $sum = 0;
    $length = strlen($str);
    foreach (count_chars($str, 1) as $a) {
        $sum -= ($a / $length) * log( ($a / $length), 2);
    }
    return $sum;
}

###########################
# test the functions here #
###########################

$info = array('coffee', 'brown', 'caffeine');
$sample = array(-57, -18, 2, 36, 50);
list($a[0], $a[1], $a[2]) = $info;

//var_dump($a);

//fizzBuzz();
//factor(100);
//printe(reverseString("FortWlmore"));
//permute(2);
print_r($sample);
print_r(reverseBetween($sample, 0, 4));
print_r(wrapReverse($sample, 1, 2));

printe( trueFalse(fermatTest(997, 5)));
printe(caesarEncrypt("The QUick Brown foX Jumps Over the Lazy Dog", -3));
printe(caesarDecrypt("Qeb NRfzh Yoltk clU Grjmp Lsbo qeb Ixwv Ald", -3));

printe(stringEntropy("Hello, world!"));
###################
# circular primes #
###################
/*
$count = 1;
foreach (range(3, 1000000, 2) as $i) {
    if (partitionInt($i) == true) $count++;
}
printe($count);
 */
/*
 * find collatz chain lengths in slow way!
 *
foreach (range(100000, 1000000) as $i) {
    $a = collatz($i, 0);
    if ($a > $max) { $max = $a; printe($i); }
}
printe("chain length is: " . $a);
 */

/*
 * find primes in this range!
 * 
$count = 0;
foreach (range(2, 200001) as $i) {
    if (isPrime($i)) $count++;
    if ($count == 10001) { printe($i); break; }
}
 */

/*
 * find greatest prime factor in this range
 *
$facs = factor(600851475143);
$max = 2;
foreach ($facs as $val) {
    if (isPrime($val)) { $max = $val; }
}
printe($max);

 */
?>
