<?php

require('./board.php');

#################
# Test here lol #
#################

function view($board, $num) {
    foreach(range(1, $num) as $i) {
        $board->printBoard();
        $board = $board->evolve();
    }
}

$start = array(array(3,1), array(3,2), array(3,3), array(2,3), array(2,2), array(2,4));
$blinker = array(array(2,1), array(2,2), array(2,3));
$test = new Board();
$test->initialize($blinker, 7, 7);

view($test, 5);

?>
