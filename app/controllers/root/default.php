<?php
/**
* 
*/
namespace root;

class defaultControllerClass extends \base\ControllerClass
{
	
	function index()
	{
		return array('name' => 'joe', 'chien'=> 'doberman');
	}
}

?>