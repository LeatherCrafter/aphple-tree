<?php

namespace Learning;

require_once 'tree_interface.php';
require_once 'flower.php';

class AppleTree implements TreeInterface 
{
    private $age = 4;
    
    private $height = 72;
    
    private $branches = 10;
    
    private $blossom = 0;
    
    private $blossoms = [];
    
    private $fruitCount;
    
    function grow()
    {
        $this->age++;
        $this->height = $this->height + 4;
        $this->branches = $this->branches + 2;
        echo "The apple tree is $this->age years old, $this->height inches tall, and has $this->branches branches.<br/>";
	}
    
    function bloom()
    {
        echo "The apple tree is blooming!  ";
        $this->blossom = ($this->age * 2) * $this->branches;
        echo "It has " . $this->blossom . " blossoms.<br/>";
        
        for ($i = 0; $i < $this->blossom; $i++)
        {
            $this->blossoms[] = new Flower;
        }
        
        array_walk($this->blossoms, function ($flower){
            $flower->produceFruit();
        });
        
        $this->fruitCount = count($this->blossoms);
	}
    
    function watch()
    {
        $bugs = rand(0,1);
        if($bugs){
            echo "Found bugs on apples.  ";
            $this->fruitCount = ($this->fruitCount - 10);
            echo "Sprayed tree with insecticide.<br/>";
		}
	}
    
    function harvest()
    {
        echo "There were $this->fruitCount apples picked!<br/>";
    }
    
    function prune()
    {
        $bad_limb = rand(0,1);
        if ($bad_limb){
            $this->branches--;
            echo "Pruned an undesirable branch off the tree.<br/>";
        }
    }
}