<?php
/**
* 
*/
namespace base\root;

class blogController extends \base\Controller
{	
	public $components = array(
						"base\Link" => "link",
						"base\Session" => "session",
						"base\Paginator" => "paginator"
						);

	function index(){
		$lnk = $this->link->build('root','blog');
		$id = $this->session->var->route["id"];
		$this->paginator->init( $lnk , $id, 'blog', 3 );
		$r["blogs"] = \R::getAll("SELECT * FROM blog ORDER BY `id` DESC LIMIT " . $this->paginator->limit);
		foreach ($r["blogs"] as $k => $v) {
			$r["blogs"][$k]["lnk"] = $this->link->build('','blog', 'view', array($v["slug"]));
		}
		$r["pagination"] = $this->paginator->paginate();
		echo $this->twig->render('root/blog/index.twig', $r);
		return true;

	}
	
	function view($params)
	{
		$r = \R::$f->begin()->select('*')->from('blog')->where('slug = ? ')->put($params[0])->get();
		$r["article"] = $r[0];
		unset ($r[0]);
		echo $this->twig->render('root/blog/view.twig', $r);
		return true;
	}
}

?>