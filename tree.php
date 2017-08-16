<?php

namespace Learning;

require_once 'tree_interface.php';
require_once 'flower.php';

class AppleTree implements TreeInterface 
{
    private $logger;
    
    private $age;
    
    private $height;
    
    private $branches;
    
    private $blossomAmount;
    
    private $blossoms;
    
    private $bug;
    
    private $prune;
    
    private $fruitCount;
    
    private $harvest;
    
    public function __construct(LoggerInterface $logger, $age = 4)
    {
        $this->logger = $logger;
        $this->age = $age;
        $this->height = self::DEFAULT_HEIGHT;
        $this->branches = self::DEFAULT_BRANCHES;
        $this->blossomAmount = self::DEFAULT_BLOSSOMAMOUNT;
        $this->blossoms = self::DEFAULT_BLOSSOMS;
        $this->bug = self::DEFAULT_BUG;
        $this->prune = self::DEFAULT_PRUNE;
        $this->fruitCount = self::DEFAULT_FRUITCOUNT;
        $this->harvest = self::DEFAULT_HARVEST;
    }
        
    function fertilize()
    {
        $fertilizedGrowthHeight = rand (0,2);
        $fertilizedGrowthBranch = rand (0,3);
        $this->height = $this->height + $fertilizedGrowthHeight;
        $this->branches = $this->branches + $fertilizedGrowthBranch;
    }
    
    function grow()
    {
        $this->age++;
        $this->height = $this->height + 4;
        $this->branches = $this->branches + 2;
	}
    
    function bloom()
    {
        $this->blossomAmount = ($this->age * 2) * $this->branches;
        
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
            $this->bug = 1;
            $this->harvest = $this->harvest - $bugsEat;
		} else {
            $this->bug = 0;
        }
	}
    
    function prune()
    {
        $bad_limb = rand(0,1);
        if ($bad_limb){
            $this->prune = 1;
            $this->branches--;
        } else {
            $this->prune = 0;
        }
    }
    
    function status()
    {
        return "$this->age,$this->height,$this->branches,$this->bug,$this->harvest,$this->prune";
    }
}
