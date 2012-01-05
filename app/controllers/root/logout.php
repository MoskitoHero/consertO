<?php
/**
* 
*/
namespace root;

class logoutController extends \base\Controller
{
	
	function index()
	{
		\Auth::destroy();
		\Auth::driveOut();
	}
	
}

?>