<?php
/**
* 
*/
namespace base\root;

class defaultController extends \base\Controller
{
	
	function index()
	{
		echo $this->twig->render('root/default/index.twig');
		return true;
	}
	
}

?>