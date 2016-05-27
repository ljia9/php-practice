<?php

require("./graph.php");

// import stuff in order to use heap data structure
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.class.php';
});
function my_autoloader($class) {
    include 'classes/' . $class . '.class.php';
}
spl_autoload_register('my_autoloader');

###################
## define search  #
###################

function bfs($graph, $start, $goal) {
    $visited = array();
    $q = new SplQueue();

    $q->push(array($start));
    while (!$q->isEmpty()) {
        $path = $q->pop();
        $v = end($path);
        if ($v == $goal) return $path;

        if (!in_array($v, $visited)) {
            foreach ($graph->neighborsTo($v) as $val) {
                $newPath = $path;
                array_push($newPath, $val);
                $q->push($newPath);
            }
            array_push($visited, $v);
        }
    }
    return "No path possible!";
}

function dfs($graph, $start, $goal) {
    $visited = array();
    $q = new SplStack();

    $q->push(array($start));
    while (!$q->isEmpty()) {
        $path = $q->pop();
        $v = end($path);
        if ($v == $goal) return $path;

        if (!in_array($v, $visited)) {
            foreach ($graph->neighborsTo($v) as $val) {
                $newPath = $path;
                array_push($newPath, $val);
                $q->push($newPath);
            }
            array_push($visited, $v);
        }
    }
    return "No path possible!";
}

####################
#### Find degrees ##
####################

for ($i=1; $i<=$g->getV(); $i++) {
    printe("Node $i has a degree of " . $g->degree($i));
}

//print_r($g->neighborsTo(15));

###################
# explore with bfs#
###################

print_r(bfs($g, 2, 16));
print_r(dfs($g, 2, 16));
