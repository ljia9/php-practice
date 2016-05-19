<?php

require('./cave.php');

class CaveSystem 
{
    private $caves;

    public function initialize() {
        makeCaveMatrix;
        shuffleCaves();
        makeCaves(); 
    }

    private function makeCaves() {
        $this->caves = array();
        for ($i=1; $i<=20; $i++) {
            array_push($this->caves, $i);
        } 
    }
    private function makeCaveMatrix() {
        $caveMatrix = array(
                        array(1, 5, 4), array(0, 7, 2), array(1, 9, 3), array(2, 11, 4),
                        array(3, 13, 0), array(0, 14, 6), array(5, 16, 7), array(1, 6, 8),
                        array(7, 9, 17), array(2, 8, 10), array(9, 11, 18), array(10, 3, 12),
                        array(19, 11, 13), array(14, 12, 4), array(13, 5, 15), array(14, 19, 16),
                        array(6, 15, 17), array(16, 8, 18), array(10, 17, 19), array(12, 15, 18)
                    );
       return $caveMatrix; 
    }
    private function shuffleCaves() {
        $shuffle = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19);
        $shuffle = shuffle($shuffle);
        $z = array();

        foreach (range(1, 20) as $i) {
            $vy = $this->caveMatrix[i];
            $vz = array(0, 0, 0);

            foreach (range(0, 2) as $j) {
                $vz[j] = $shuffle[$vy[j]];
            }

            $z[$shuffle[$i]] = $vz;
        }
        $this->caveMatrix = $z;
    }
    private function startCaveVertices() {
    }
    private function startCaveFeatures(numBats, numPits) {

    }
}

