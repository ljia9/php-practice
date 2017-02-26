<?php

// import stuff in order to use heap data structure
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.class.php';
});
function my_autoloader($class) {
    include 'classes/' . $class . '.class.php';
}
spl_autoload_register('my_autoloader');

// practice building classes; not really necessary here because I'm importing the real heap above
class BinaryHeap 
{
    protected $heap;

    public function __construct() {
        $this->heap = array();
    }
    public function isEmpty() {
        return empty($this->heap); 
    }
    public function count() {
        return count($this->heap) - 1;
    }
    public function extract() {
        if ($this->isEmpty()) throw new RunTimeException("Heap is empty");

        $root = array_shift($this->heap);

        if (!$this->isEmpty()) {
            
            // maintain heap structure by shifting again
            $last = array_pop($this->heap);
            array_unshift($this->heap, $last);

            $this->adjust(0);
        }

        return $root;
    }
    public function compare($item1, $item2) {
        if ($item1 == $item2) return 0;

        return ($item1 > $item2 ? 1: -1);
    }
    protected function isLeaf($node) {
        return ((2 * $node) + 1) > $this->count();
    }
    protected function adjust($root) {
        if (!$this->isLeaf($root)) {
            $left = (2 * root) + 1;
            $right = (2 * root) + 2;

			// if the root is less than either of its children
            $h = $this->heap;
            
			if (
              (isset($h[$left]) &&
                $this->compare($h[$root], $h[$left]) < 0)
              || (isset($h[$right]) &&
                $this->compare($h[$root], $h[$right]) < 0)
            ) {
                // find the larger child
                if (isset($h[$left]) && isset($h[$right])) {
                    $j = ($this->compare($h[$left], $h[$right]) >= 0) ? $left : $right;
                }
                else if (isset($h[$left])) {
                    $j = $left; // left child only
                }
                else $j = $right; // right child only 

                // swap places with root
                list($this->heap[$root], $this->heap[$j]) = array($this->heap[$j], $this->heap[$root]);

                // recursively adjust semiheap rooted at new
                // node j
                $this->adjust($j);
            }
        }
    }
    public function insert($item) {
        $this->heap[] = $item;
		
		// trickle up to the correct location
		$place = $this->count();
		$parent = floor($place / 2);
		// while not at root and greater than parent
		while (
		  $place > 0 && $this->compare(
			$this->heap[$place], $this->heap[$parent]) >= 0
		) {
			// swap places
			list($this->heap[$place], $this->heap[$parent]) =
				array($this->heap[$parent], $this->heap[$place]);
			$place = $parent;
			$parent = floor($place / 2);
		}
    }
}

###################
##### Heapsort ####
###################

function heapsort($arr) {
    $heap = new SplMinHeap();
    //heapify part - turn the unsorted inital array into a heap to easily find the min val (O(n) times to do O(logN) operation)
    foreach($arr as $val) {
        $heap->insert($val);
    }    
    
    unset($arr); #clear the array to save space
    $arr = array();
    while (!$heap->isEmpty()) {
        $a = $heap->extract();
        array_push($arr, $a);
    }
    return $arr;
}

###################
## Test heapsort ##
###################

function randomInts($num, $hi, $lo) {
    $ans = array();
    foreach (range(0, $num) as $i) {
        $a = rand($lo, $hi);
        array_push($ans, $a);
    }
    return $ans;
}

$sample = array(10, -2, 4, 1, 5, 3, 6, 2, 4, 0);
$rands = randomInts(50, -100, 100);
print_r($rands);
print_r(heapsort($rands));

$myHeap = new BinaryHeap();

?>
