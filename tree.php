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
        $this->fruitCount = self::DEFAULT_FRUITCOUNT;
        $this->harvest = self::DEFAULT_HARVEST;
    }
        
    function fertilize()
    {
        $fertilizedGrowthHeight = rand (0,2);
        $fertilizedGrowthBranch = rand (0,3);
        $this->height = $this->height + $fertilizedGrowthHeight;
        $this->branches = $this->branches + $fertilizedGrowthBranch;
        $this->logger->log("Fertilized apple tree.");
    }
    
    function grow()
    {
        $this->age++;
        $this->height = $this->height + 4;
        $this->branches = $this->branches + 2;
        $this->logger->log("The apple tree is $this->age years old, $this->height inches tall, and has $this->branches branches.");
	}
    
    function bloom()
    {
        $this->logger->log("The apple tree is blooming!");
        $this->blossomAmount = ($this->age * 2) * $this->branches;
        $this->logger->log("It has " . $this->blossomAmount . " blossoms.");
        
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
            $this->logger->log("Found bugs on apples.");
            $this->harvest = $this->harvest - $bugsEat;
            $this->logger->log("Sprayed tree with insecticide.");
		}
	}
    
    function harvest()
    {
        $this->logger->log("There were $this->harvest apples picked!");
    }
    
    function prune()
    {
        $bad_limb = rand(0,1);
        if ($bad_limb){
            $this->branches--;
            $this->logger->log("Pruned an undesirable branch off the tree.");
        }
    }
}
