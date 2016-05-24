<?php

###################
# helper functions#
###################

function printe($string) {
    printf($string);
    printf("\r\n");
}

function trueFalse($sym) {
    if ($sym == "1") printe("True");
    else print("False");
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

function fermatTest($num, $k) {
    // fermatTest that does not necessarily work because of invalid fermat tests
    foreach (range(3, $k) as $i) {
        $a = rand(2, $num-2);
        $b = pow($a, ($num - 1));
        if ($b % $num != 1) return false;
    }
    return true;
}

function isPrime($num) {
    // simple test if number is prime, not optimal
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
    // dumb recursive version of collatz sequence
    if ($num == 1) return $count;
    if ($num % 2 == 0) { $n = $num / 2; $count++; return collatz($n, $count); }
    else { $n = 3*$num + 1; $count++; return collatz($n, $count); }
}

function partitionInt($seq) {
    // find circular primes by circling around int by the ten's place
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

function permute($num) {
    // find the permuations of integers from 0 to $num badly
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

function caesarEncrypt($message, $shiftNum) {
    // simple caesar cipher to shift ascii value by specified shiftNum
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

function caesarDecrypt($message, $shiftNum) {
    // decrypt caesar cipher. Just reverse direction of shiftNum
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

###########################
# test the functions here #
###########################

$info = array('coffee', 'brown', 'caffeine');
list($a[0], $a[1], $a[2]) = $info;

//var_dump($a);

//fizzBuzz();
//factor(100);
//printe(reverseString("FortWlmore"));
permute(2);
printe( trueFalse(fermatTest(997, 5)));
printe(caesarEncrypt("The QUick Brown foX Jumps Over the Lazy Dog", -3));
printe(caesarDecrypt("Qeb NRfzh Yoltk clU Grjmp Lsbo qeb Ixwv Ald", -3));

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
    if (isPrime($val)) {
        $max = $val;
    }
}
printe($max);

 */
?>
