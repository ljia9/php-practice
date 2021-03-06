<?php

require('./board.php');

// Define main function
function main() 
{
    // Create objects to make funny moves
    $board   = new Board();
    $toad    = array(array(3,1), array(3,2), array(3,3), array(2,3), array(2,2), array(2,4));
    $blinker = array(array(2,1), array(2,2), array(2,3));
    $circle  = array(array(15,19), array(17,20), array(18,19), array(19,19), array(18,18), array(19,18),array(18,17), array(19,17), array(18,16));
    $ship    = array(array(3,2), array(3,4), array(4,5), array(6,5), array(7,5), array(8,5), array(8,4), array(8,3), array(7,2));
    $space   = array(array(1,2), array(3,2), array(4,3), array(4,4), array(4,5), array(4,6), array(3,6), array(2,6), array(1,5));
    $whoa    = array(array(19,19), array(19,20), array(20,19), array(20,20), array(21,21), array(22,21), array(22,20));
    $vroom   = array(array(15,15), array(16,15), array(15,16), array(16,17), array(16,18), array(16,19), array(15,19), array(15,20), array(15,21));
    $lol     = array(
                array(10,10),array(10,11),array(11,10),array(11,11),array(12,10),array(12,9),array(12,8),array(13,8),
                array(13,14),array(14,14),array(15,14),array(13,16),array(14,16),array(15,16),array(14,17),
                array(6,18),array(5,18),array(6,19),array(5,19),array(6,20),array(5,20)
               );
    $fun     = array(
                array(15,8),array(16,8), array(17,8), array(15,13), array(14,13),array(14,12),array(14,14),array(13,13),array(13,14),array(15,15),
                array(10,17),array(9,18),array(9,19),array(11,18),array(11,19),array(10,19),array(12,19)
               );
    $pulsar  = array(
                array(4,1),array(5,1),array(6,1),array(7,3),array(7,4),array(7,5),array(4,6),array(5,6),array(6,6),array(2,3),array(2,4),array(2,5),
                array(4,8),array(5,8),array(6,8),array(7,9),array(7,10),array(7,11),array(4,13),array(5,13),array(6,13),array(2,9),array(2,10),array(2,11),
                array(10,1),array(11,1),array(12,1),array(14,3),array(14,4),array(14,5),array(10,6),array(11,6),array(12,6),array(9,3),array(9,4),array(9,5),
                array(10,8),array(11,8),array(12,8),array(14,9),array(14,10),array(14,11),array(10,13),array(11,13),array(12,13),array(9,9),array(9,10),
                  array(9,11)
               );
    $gosper  = array(
                array(5,1), array(5,2), array(6,1), array(6,2),
                array(5,11),array(6,11),array(7,11),array(4,12),array(8,12),array(3,13),array(9,13),array(3,14),array(9,14),array(6,15),array(4,16),
                  array(8,16),array(5,17),array(6,17),array(7,17),array(6,18),
                array(3,21),array(4,21),array(5,21),array(3,22),array(4,22),array(5,22),array(2,23),array(6,23),array(1,25),array(2,25),array(6,25),array(7,25),
                array(3,35),array(3,36),array(4,35),array(4,36)
               );

    // Start the program
    $resp = true;
    while ($resp != false) {
        printe("\r\nWelcome!");
        printe("Watch my command line version of Conway's Game of Life! Type what object you want to see.");
        $resp = readline("(b)linker, (c)ircle, (f)un, (g)osper, (l)ol, (p)lusar, (r)andom, (s)paceship, (t)oad, (m)ess, (v)room, (w)hoa, (q)uit: ");

        if     ($resp == "b") { $board->initialize($blinker, 10, 10); view($board, 50, 50000); }
        elseif ($resp == "c") { $board->initialize($circle, 40, 40); view($board, 30, 50000);  }
        elseif ($resp == "f") { $board->initialize($fun, 40, 40); view($board, 230, 50000);    }
        elseif ($resp == "g") { $board->initialize($gosper, 70, 40); view($board, 130, 3000);  }
        elseif ($resp == "w") { $board->initialize($whoa, 40, 40); view($board, 75, 50000);    }
        elseif ($resp == "v") { $board->initialize($vroom, 40, 40); view($board, 250, 50000);  }
        elseif ($resp == "l") { $board->initialize($lol, 40, 40); view($board, 220, 50000);    }
        elseif ($resp == "p") { $board->initialize($pulsar, 16, 16); view($board, 50, 50000);  }
        elseif ($resp == "s") { $board->initialize($space, 60, 10); view($board, 80, 50000);   }
        elseif ($resp == "t") { $board->initialize($toad, 10, 10); view($board, 50, 50000);    }
        elseif ($resp == "m") { $board->initialize($ship, 50, 30); view($board, 50, 50000);    }
        elseif ($resp == "r") { $r=makeRandom(); $board->initialize($r, 40, 40); view($board, 50, 50000); } 
        elseif ($resp == "q") { $resp = false;                                                 }
        else                  { printe("\r\nERROR: you need to input a correct letter!");      }
    }
}

// Make a random initial object
function makeRandom() {
    $a = rand(20, 40);
    $ans = array();
    for ($i=0; $i<$a; $i++) {
        $rand1 = rand(2, 20);
        $rand2 = rand(2, 20);
        array_push($ans, array($rand1, $rand2));
    }
    return $ans;
}

// Evolve the initial board to see the Game of Life
function view($board, $num, $delay) {
    foreach(range(1, $num) as $i) {
        $board->printBoard();
        $board = $board->evolve();
        usleep($delay);
    }
}

#################
# Call function #
#################

main();

?>
