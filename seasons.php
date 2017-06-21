<?php

namespace Learning;

class Season 
{
    protected $trees = [];
    
    function __construct($trees)
    {
        $this->trees = $trees;
    }
    
    function apply($trees, callable $callback)
    {
        array_walk($trees, $callback);
    }
    
    function spring()
    {
        echo "It's springtime!  ";
        $this->apply($this->trees, function(TreeInterface $tree){
            $tree->grow();
            $tree->bloom();
        });
	}
    
    function summer()
    {
        echo "It's summertime!  ";
        $this->apply($this->trees, function(TreeInterface $tree){
            $tree->watch();
        });
	}
    
    function fall()
    {
        echo "It's fall, time to harvest!  ";
        $this->apply($this->trees, function(TreeInterface $tree){
            $tree->harvest();
        });
    }
    
    function winter()
    {
        echo "It's wintertime!  ";
        $this->apply($this->trees, function(TreeInterface $tree){
            $tree->prune();
        });
        echo "<br/><br/>";
    }
}