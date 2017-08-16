<?php

namespace Learning;

require_once 'fruit.php';

class Flower
{
    private $fruitArray = [];
    private $fruit = 0;
    
    function produceFruit()
    {
        $fruitGrow = rand(1, 5);
        if ($fruitGrow != 5){
            $this->fruit = new Fruit;
            array_push($this->fruitArray, $this->fruit);
        }
    }
    
    function fruitAmount()
    {
        return $this->fruitArray;
    }
}
