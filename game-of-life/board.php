<?php

function printe($string) {
    printf($string);
    printf("\r\n");
}

#####################
# Class Constructor #
#####################

class Board {

    public function initialize($arr, $h, $w) {
        $this->height = $h;
        $this->width = $w;
        $this->cells = $arr;
    }

    public function getHeight() {
        return $this->height; 
    }
    public function getWidth() {
        return $this->width; 
    }
    public function liveCells() {
        return $this->cells;
    }
    
    private function isAlive($arr) {
        if (in_array($arr, $this->cells) == true) return true;
        else return false;
    }
    private function neighborTo($arr) {
        $count = 0;
        foreach ($this->cells as $val) {
            $dx = abs($val[0] - $arr[0]);
            $dy = abs($val[1] - $arr[1]);
            if ($dx <= 1 and $dy <= 1 and !($dx==0 and $dy==0)) $count++;
        }
        return $count;
    }
    private function shouldSurvive($arr) {
        $n = $this->neighborTo($arr);
        return (($n >= 2 and $n < 4) and $this->isAlive($arr));
    }
    private function shouldReproduce($arr) {
        return (!$this->isAlive($arr) and $this->neighborTo($arr) == 3);
    }

    public function evolve() {
        $survivors = array();
        foreach (range(0, $this->width) as $i) {
            foreach (range(0, $this->height) as $j) {
                $arr = array($i, $j);
                if ($this->shouldSurvive($arr) or $this->shouldReproduce($arr)) array_push($survivors, $arr);
            }
        }
        $b = new Board();
        $b->initialize($survivors, $this->height, $this->width);
        return $b;
    }
    public function printBoard() {
        printe("New Generation:");
        printe("===============");
        foreach (range(0, $this->width) as $i) {
            foreach (range(0, $this->height) as $j) {
                $arr = array($i, $j);
                if ($this->isAlive($arr) == true) print('#');
                else print('-');
            }
            printe('');
        }
        printe('');
    }
}

