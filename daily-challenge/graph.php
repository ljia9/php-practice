<?php

function printe($string) {
    printf($string);
    printf("\r\n");
}

class Graph {

    private $V;
    private $E;
    private $adj = array();

    function __construct($V) {
        $this->V = $V;
        $this->E = 0;
        for ($i=1; $i<=$V; $i++) {
            $this->adj[$i] = array();
        }
    }

    public function getV() {
        return $this->V;
    }
    public function getE() {
        return $this->E;
    }
    private function validateV($v) {
        if ($v < 1 or $v > $this->V) throw new Exception("not a valid vertex: $v");
    }
    public function addEdge($from, $to) {
        $this->validateV($from);
        $this->validateV($to);
        $this->E++;
        array_push($this->adj[$from], $to);
        array_push($this->adj[$to], $from);
    }
    public function connected($v, $w) {
        $this->validateV($v);
        $this->validateV($w);
        $arr = $this->adj[$v];
        return in_array($w, $arr);
    }
    public function neighborsTo($v) {
        $this->validateV($v);
        $arr = $this->adj[$v];
        $ans = array();
        foreach ($arr as $val) {
            array_push($ans, $val);
        }
        return $ans;
    }
    public function degree($node) {
        $this->validateV($node);
        return count($this->adj[$node]);
    }
}

###################
#### Read file ####
###################

$f = fopen("input_graph.txt", 'r');
$numVertices = (int)fgets($f);
$g = new Graph($numVertices);

while (($line = fgets($f)) !== false) {
    $l = explode(' ',$line);
    $g->addEdge((int)$l[0], (int)$l[1]);
}
fclose($f);

###################
### Find degrees ##
###################

printe($g->getV());
printe($g->getE());
for ($i=1; $i<=$numVertices; $i++) {
    printe("Node $i has a degree of " . $g->degree($i));
}
print_r($g->neighborsTo(15));
