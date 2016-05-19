<?php

putenv('TERM=xterm-color');

class Snake {
    private $window;
    private $hasEnded = false;
    private $movementX;
    private $movementY;
    private $food = array();
    private $snake = array();
    private $boardsize = array();

    private function draw() {
        ncurses_wclear($this->window);

        ncurses_wrefresh($this->window);
        ncurses_getmaxy($this->wind, $winy, $winx);
    }

    public function run() {
        ncurses_init();
        ncurses_curs_set(0);

        $this->window = ncurses_newwin(0, 0, 0, 0);

        ncurses_refresh();
        ncurses_getmaxyx(STDSCR, $this->boardSize[1], $this->boardSize[0]);

        ncurses_end();
    }
}

$snake = new Snake();
$snake->run();

?>
