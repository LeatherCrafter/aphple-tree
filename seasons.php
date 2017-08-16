<?php

namespace Learning;

class Season 
{
    private $logger;
    
    private $trees = [];
    
    private $year;
    
    function __construct(LoggerInterface $logger, $trees, $year)
    {
        $this->logger = $logger;
        $this->trees = $trees;
        $this->year = $year;
    }
    
    function apply($trees, callable $callback)
    {
        array_walk($trees, $callback);
    }
    
    function spring()
    {
        $this->logger->log("It's springtime in $this->year!");
        $this->year++;
        $this->apply($this->trees, function(TreeInterface $tree){
            $tree->fertilize();
            $tree->grow();
            $tree->bloom();
        });
        $this->logger->log("<br/>");
	}
    
    function summer()
    {
        $this->logger->log("It's summertime!");
        $this->apply($this->trees, function(TreeInterface $tree){
            $tree->watch();
        });
        $this->logger->log("<br/>");
	}
    
    function fall()
    {
        $this->logger->log("It's fall, time to harvest!");
        $this->logger->log("<br/>");
    }
    
    function winter()
    {
        $this->logger->log("It's wintertime!");
        $this->apply($this->trees, function(TreeInterface $tree){
            $tree->prune();
        });
        $this->logger->log("<br/><br/>");
    }
}
