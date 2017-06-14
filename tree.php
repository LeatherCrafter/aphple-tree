<?php
namespace Learning;

interface TreeInterface {
    function grow();
    function beginGrowth();
    function watch();
    function harvest();
    function prune();
    function spring();
    function summer();
    function fall();
    function winter();
}

class AppleTree implements TreeInterface {
    private $age = 4;
    private $height = 72;
    private $branches = 10;
    private $blossom = 0;
    function grow(){
        $this->age++;
        $this->height = $this->height + 4;
        $this->branches = $this->branches + 2;
        echo "The apple tree is $this->age years old, $this->height inches tall, and has $this->branches branches.  ";
	}
    function beginGrowth(){
        echo "The apple tree is blooming!  ";
        $this->blossom = ($this->age * 2) * $this->branches;
        echo "It has " . $this->blossom . " blossoms.  ";
	}
    function watch(){
        $bugs = rand(0,1);
        if($bugs){
            echo "Found bugs on apples.  ";
            //subtract 10 apples
            echo "Sprayed tree with insecticide.  ";
		}
	}
    function harvest(){
        //echo final apple count
    }
    function prune(){
        $bad_limb = rand(0,1);
        if ($bad_limb){
            $this->branches--;
            echo "Pruned an undesirable branch off the tree.  ";
        }
    }
    function spring(){
        echo "It's springtime!  ";
        $this->grow();
        $this->beginGrowth();
        echo "<br/>";
	}
    function summer(){
        echo "It's summertime!  ";
        $this->watch();
        echo"<br/>";
	}
    function fall(){
        echo "It's fall, time to harvest!  ";
        $this->harvest();
        echo "<br/>";
    }
    function winter(){
        echo "It's wintertime!  ";
        $this->prune();
        echo "<br/><br/>";
    }
}