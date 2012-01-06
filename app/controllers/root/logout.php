<?php
/**
* 
*/
namespace base\root;

class logoutController extends \base\Controller
{
	public $components = array(
		"base\Auth" => "auth"
	);
	
	function index()
	{
		$this->auth->destroy();
		$this->auth->driveOut();
	}
	
}

?>