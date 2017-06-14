<?php
namespace Learning;

require_once 'tree.php';

$appleTree = new AppleTree;

for ($i = 0; $i < 10; $i++){
    $appleTree->spring();
    $appleTree->summer();
    $appleTree->fall();
    $appleTree->winter();
}