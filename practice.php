<?php

##########################
# functions defined here #
##########################

function printe($string) {
    printf($string);
    printf("\r\n");
}

function trueFalse($sym) {
    if ($sym == "1") printe("True");
    else print("False");
}

function fizzBuzz() {
    foreach (range(0, 100) as $i) {
        if ($i % 15 == 0) printe("fizzBuzz");
        elseif ($i % 5 == 0) printe("Buzz");
        elseif ($i % 3 == 0) printe("fizz");
        else printe($i);
    }
}

function fermatTest($num, $k) {
    foreach (range(3, $k) as $i) {
        $a = rand(2, $num-2);
        $b = pow($a, ($num - 1));
        if ($b % $num != 1) return false;
    }
    return true;
}

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
    //print_r($ans);
    return $ans;
}

function collatz($num, $count) {
    if ($num == 1) return $count;
    if ($num % 2 == 0) { $n = $num / 2; $count++; return collatz($n, $count); }
    else { $n = 3*$num + 1; $count++; return collatz($n, $count); }
}

function partitionInt($seq) {
    $length = strlen((string)$seq);
    $ans = array();
    $s = $seq;
    if (isPrime($seq)) return false;
    foreach (range(1, $length) as $i) {
        $t = $s / 10;
        $s = $s % 10;
        $u = floor(pow(10, ($length-1))*$s + $t);
        //array_push($ans, $u);
        $s = $u;
        if (isPrime($u) == false) return false;
        else continue;
    }
    return true;
}

###########################
# test the functions here #
###########################

$operands = array(2, 10);
//printe( $operands[0] + $operands[1]);

$info = array('coffee', 'brown', 'caffeine');
list($a[0], $a[1], $a[2]) = $info;

//var_dump($a);

//fizzBuzz();
//factor(100);
printe( trueFalse(fermatTest(997, 5)));
printe( trueFalse(isPrime(337)));
printe( trueFalse(isPrime(1132)));

$count = 0;
foreach (range(3, 100000) as $i) {
    if (partitionInt($i) == true) $count++;
    else continue;
}
printe($count);
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
    if (isPrime($val)) {
        $max = $val;
    }
}
printe($max);

 */
?>