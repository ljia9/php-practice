<?php

require('./board.php');

#################
# Test here lol #
#################

function main() 
{
    // Create objects to make funny moves
    $toad = array(array(3,1), array(3,2), array(3,3), array(2,3), array(2,2), array(2,4));
    $blinker = array(array(2,1), array(2,2), array(2,3));
    $ship = array(array(3,2), array(3,4), array(4,5), array(6,5), array(7,5), array(8,5), array(8,4), array(8,3), array(7,2));
    $spaceship = array(array(1,2), array(3,2), array(4,3), array(4,4), array(4,5), array(4,6), array(3,6), array(2,6), array(1,5));

    $space = new Board();
    $space->initialize($spaceship, 50, 20);

    // Start the program
    printe("\r\nWelcome!");
    printe("Watch my beautiful command line version of Conway's Game of Life! Tell me what shape you want to see.");
    $resp = readline("(b)linker, (s)paceship, (t)oad, or (m)ess: ");


    if ($resp == "b") { $space->initialize($blinker, 50, 30); view($space, 70); }
    elseif ($resp == "s") { $space->initialize($spaceship, 50, 30); view($space, 70); }
    elseif ($resp == "t") { $space->initialize($toad, 50, 30); view($space, 70); }
    elseif ($resp == "m") { $space->initialize($ship, 50, 30); view($space, 70); }
    else printe("ERROR: you need to input a correct letter");
}

function view($board, $num) {
    foreach(range(1, $num) as $i) {
        $board->printBoard();
        $board = $board->evolve();
        usleep(9000);
    }
}

main();

?>
