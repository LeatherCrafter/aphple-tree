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
        echo "It's springtime!<br/>";
        $this->apply($this->trees, function(TreeInterface $tree){
            $tree->fertilize();
            $tree->grow();
            $tree->bloom();
        });
        echo "<br/>";
	}
    
    function summer()
    {
        echo "It's summertime!<br/>";
        $this->apply($this->trees, function(TreeInterface $tree){
            $tree->watch();
        });
        echo "<br/>";
	}
    
    function fall()
    {
        echo "It's fall, time to harvest!<br/>";
        $this->apply($this->trees, function(TreeInterface $tree){
            $tree->harvest();
        });
        echo "<br/>";
    }
    
    function winter()
    {
        echo "It's wintertime!<br/>";
        $this->apply($this->trees, function(TreeInterface $tree){
            $tree->prune();
        });
        echo "<br/><br/>";
    }
}