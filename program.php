<?php
namespace Learning;
require_once 'tree_interface.php';
require_once 'tree.php';
require_once 'seasons.php';
    
for ($i = 0; $i < 10; $i++){
    $trees[] = new AppleTree;
    $seasons = new Season($trees);
    $seasons->spring();
    $seasons->summer();
    $seasons->fall();
    $seasons->winter();
}