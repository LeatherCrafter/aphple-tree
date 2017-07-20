<?php

namespace Learning;

class Season 
{
    private $logger;
    
    private $trees = [];
    
    function __construct(LoggerInterface $logger, $trees)
    {
        $this->logger = $logger;
        $this->trees = $trees;
    }
    
    function apply($trees, callable $callback)
    {
        array_walk($trees, $callback);
    }
    
    function spring()
    {
        $this->logger->log("It's springtime!");
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
        $this->apply($this->trees, function(TreeInterface $tree){
            $tree->harvest();
        });
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
