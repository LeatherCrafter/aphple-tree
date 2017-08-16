<?php

namespace Learning;

require_once 'tree_interface.php';
require_once 'tree.php';
require_once 'seasons.php';
require_once 'logger_interface.php';
require_once 'logger.php';

$treeAge = [];
$treeHeight = [];
$treeBranches = [];
$treeBug = [];
$treePrune = [];
$treeHarvest = [];
$logger = new Logger;

function arrayAverage($array)
{
    return array_sum($array) / count($array);
}

function arrayTotal($array)
{
    return array_sum($array);
}

for ($i = 0; $i < 10; $i++)
{
    $trees[] = new AppleTree($logger);
}

$seasons = new Season($logger, $trees, 2007);

$seasons->spring();

array_walk($trees, function($tree){
    list($age, $height, $branches, $bug, $harvest, $prune) = explode(",", $tree->status());
    $treeAge[] = $age;
    $treeHeight[] = $height;
    $treeBranches[] = $branches;
    if($bug == 1){
        $treeBug[] = $bug;
    } 
    $treeHarvest[] = $harvest;
    if ($prune == 1){
        $treePrune[] = $prune;
    }
});

$logger->log("The trees are " . $treeAge[0] . " this year.");

$logger->log("The average height of the trees is: " . arrayAverage($treeHeight)) . " inches.";

$seasons->summer(); 

array_walk($trees, function($tree){
    list($age, $height, $branches, $bug, $harvest, $prune) = $tree->status();
    $treeAge[] = $age;
    $treeHeight[] = $height;
    $treeBranches[] = $branches;
    if($bug == 1){
        $treeBug[] = $bug;
    } 
    $treeHarvest[] = $harvest;
    if ($prune == 1){
        $treePrune[] = $prune;
    }
});

$logger->log("The amount of trees that had bugs and were sprayed is: " . count($treeBug)) . ".";

$seasons->fall(); 

array_walk($trees, function($tree){
    list($age, $height, $branches, $bug, $harvest, $prune) = $tree->status();
    $treeAge[] = $age;
    $treeHeight[] = $height;
    $treeBranches[] = $branches;
    if($bug == 1){
        $treeBug[] = $bug;
    } 
    $treeHarvest[] = $harvest;
    if ($prune == 1){
        $treePrune[] = $prune;
    }
});

$logger->log("The total amount of fruit harvested this year is: " . arrayTotal($treeHarvest)) . ".";

$logger->log("The average amount of fruit harvested per tree is: " . arrayAverage($treeHarvest)) . ".";

$seasons->winter();

array_walk($trees, function($tree){
    list($age, $height, $branches, $bug, $harvest, $prune) = $tree->status();
    $treeAge[] = $age;
    $treeHeight[] = $height;
    $treeBranches[] = $branches;
    if($bug == 1){
        $treeBug[] = $bug;
    } 
    $treeHarvest[] = $harvest;
    if ($prune == 1){
        $treePrune[] = $prune;
    }
});

$logger->log("The amount of trees that had to be pruned is: " . count($treePrune)) . ".";

$logger->log("After pruning, the average amount of branches per tree is: " . arrayAverage($treeBranches)) . ".";
  