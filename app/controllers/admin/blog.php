<?php
/**
* 
*/
namespace base\admin;

class blogController extends \base\Controller
{
	function index(){
		$r["blogs"] = \R::$f->begin()->select('*')->from('blog')->limit('10')->get();
		foreach($r["blogs"] as $k => $v){
			echo $v["id"];
			$r["blogs"][$k]["edit_url"] = \Link::build('admin','blog','edit',array("id" => $v["id"]));
			$r["blogs"][$k]["delete_url"] = \Link::build('admin','blog','delete',array("id" => $v["id"]));
			$r["add_url"] = \Link::build('admin','blog','add');			
		}
		return $r;	
	}
	
	function edit($params)
	{
		$r = \R::$f->begin()->select('*')->from('blog')->where('id = ? ')->put($params[0])->get();
		$r["article"] = $r[0];
		unset ($r[0]);
		return $r;
	}
}

?>