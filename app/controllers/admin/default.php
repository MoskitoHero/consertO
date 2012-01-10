<?php
/**
* 
*/
namespace base\admin;

class defaultController extends \base\Controller
{
	
	function index()
	{
		echo $this->twig->render('admin/default/index.twig');
	}
}

?>