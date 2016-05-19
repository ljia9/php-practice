<?php

require('./cave_system.php');

function printe($string) {
        printf($string);
        printf("\r\n");
}

function main() {
    printe("Welcome to Hunt the Wumpus 2016 (done in object oriented PHP!)");
    $caveSys = new CaveSystem();

    $hunterIsAlive = true;
    $wumpusIsAlive = true;
    $wumpusInCave = array_rand($caveSys->getCaves());
}

function whereAmI($cave) {
    printe("You are in room $cave->roomNumber");
}
function moveOrShoot() {
    return readline("(M)ove or (S)hoot?");
}


#############
# test here #
#############

main();
