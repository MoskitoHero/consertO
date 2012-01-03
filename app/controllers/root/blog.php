<?php
/**
* 
*/
namespace root;

class blogController extends \base\Controller
{
	
	function view($params)
	{
		return array('name' => 'joe', 'chien'=> $params[0]);
	}
}

?>