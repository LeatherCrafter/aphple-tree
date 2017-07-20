<?php

namespace Learning;

require_once 'tree_interface.php';
require_once 'tree.php';
require_once 'seasons.php';
require_once 'logger_interface.php';
require_once 'logger.php';

$logger = new Logger;

for ($i = 0; $i < 10; $i++)
{
    $trees[] = new AppleTree($logger);
}

$seasons = new Season($logger, $trees);

$seasons->spring();   
$seasons->summer();   
$seasons->fall();   
$seasons->winter();

for ($i = 0; $i < 5; $i++)
{
    $seasons->spring();   
    $seasons->summer();   
    $seasons->fall();   
    $seasons->winter(); 
}
  