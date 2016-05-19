<?php

class Cave 
{
    private $roomNumber;
    private $vertices;
    private $hasBats;
    private $hasPit;

    public function initialize($roomNum) {
        $this->roomNumber = $roomNum;
        $this->vertices = array();
    }
}
