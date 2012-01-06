<?php
/**
* 
*/
namespace root;

class blogController extends \base\Controller
{	
	function index(){
		$r["blogs"] = \R::$f->begin()->select('*')->from('blog')->limit('10')->get();
		return $r;	
	}
	
	function view($params)
	{
		$r = \R::$f->begin()->select('*')->from('blog')->where('id = ? ')->put($params[0])->get();
		$r["article"] = $r[0];
		unset ($r[0]);
		return $r;
	}
}

?>