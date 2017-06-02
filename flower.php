<?php
namespace Learning;

class Flower {
	public $fruit_array = array();
	function apple(){
		$fruit = rand (0, 1);
		if ($fruit){
			array_push($this->fruit_array, 1);
		}
		
		
	}
	
}



?>