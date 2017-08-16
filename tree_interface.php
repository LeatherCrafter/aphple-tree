<?php

namespace Learning;

interface TreeInterface 
{
    const DEFAULT_HEIGHT = 72;
    const DEFAULT_BRANCHES = 10;
    const DEFAULT_BLOSSOMAMOUNT = 0;
    const DEFAULT_BLOSSOMS = [];
    const DEFAULT_BUG = 0;
    const DEFAULT_PRUNE = 0;
    const DEFAULT_FRUITCOUNT = [];
    const DEFAULT_HARVEST = 0;
    function fertilize();
    function grow();
    function bloom();
    function watch();
    function prune();
    function status();
}
