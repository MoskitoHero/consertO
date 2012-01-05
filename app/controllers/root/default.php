<?php
/**
* 
*/
namespace root;

class defaultController extends \base\Controller
{
	
	function index()
	{
		return array('name' => 'joe', 'chien'=> 'doberman');
	}
	
}

?>