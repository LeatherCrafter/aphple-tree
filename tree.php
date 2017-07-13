<?php

namespace Learning;

require_once 'tree_interface.php';
require_once 'flower.php';

class AppleTree implements TreeInterface 
{
    private $age = 4;
    
    private $height = 72;
    
    private $branches = 10;
    
    private $blossomAmount = 0;
    
    private $blossoms = [];
    
    private $fruitCount = [];
    
    private $harvest = 0;
        
    function fertilize()
    {
        $fertilizedGrowthHeight = rand (0,2);
        $fertilizedGrowthBranch = rand (0,3);
        $this->height = $this->height + $fertilizedGrowthHeight;
        $this->branches = $this->branches + $fertilizedGrowthBranch;
        echo "Fertilized apple tree.  ";
    }
    
    function grow()
    {
        $this->age++;
        $this->height = $this->height + 4;
        $this->branches = $this->branches + 2;
        echo "It is $this->age years old, $this->height inches tall, and has $this->branches branches.<br/>";
	}
    
    function bloom()
    {
        echo "The apple tree is blooming!  ";
        $this->blossomAmount = ($this->age * 2) * $this->branches;
        echo "It has " . $this->blossomAmount . " blossoms.<br/>";
        
        for ($i = 0; $i < $this->blossomAmount; $i++)
        {
            $this->blossoms[] = new Flower;
        }
        
        array_walk($this->blossoms, function ($flower){
            $flower->produceFruit();
            array_push($this->fruitCount, $flower->fruitAmount());
        });
        
        $this->harvest = count($this->fruitCount);
	}
    
    function watch()
    {
        $bugs = rand(0,1);
        $bugsEat = rand(10, 20);
        if($bugs){
            echo "Found bugs on apples.  ";
            $this->harvest = $this->harvest - $bugsEat;
            echo "Sprayed tree with insecticide.<br/>";
		}
	}
    
    function harvest()
    {
        echo "There were $this->harvest apples picked!<br/>";
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