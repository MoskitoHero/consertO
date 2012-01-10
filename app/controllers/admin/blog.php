<?php
/**
* 
*/
namespace base\admin;

class blogController extends \base\Controller
{
	public $components = array(
						"base\Link" => "link",
						"base\Auth" => "auth",
						"base\Session" => "session",
						"base\Paginator" => "paginator"
						);

	function index(){
		$lnk = $this->link->build('admin','blog');
		$id = $this->session->var->route["id"];
		$this->paginator->init( $lnk , $id, 'blog', 10 );
		$r["blogs"] = \R::getAll("SELECT * FROM blog ORDER BY `id` DESC LIMIT " . $this->paginator->limit);
		foreach($r["blogs"] as $k => $v){
			$r["blogs"][$k]["view_url"] = $this->link->build('admin','blog','view',array("id" => $v["id"]));
			$r["blogs"][$k]["edit_url"] = $this->link->build('admin','blog','edit',array("id" => $v["id"]));
			$r["blogs"][$k]["delete_url"] = $this->link->build('admin','blog','delete',array("id" => $v["id"]));
			$r["add_url"] = $this->link->build('admin','blog','add');			
		}
		$r["pagination"] = $this->paginator->paginate();
		echo $this->twig->render('admin/blog/index.twig', $r);
		return true;	
	}
	
	function view($params)
	{
		$r = \R::$f->begin()->select('*')->from('blog')->where('id = ? ')->put($params[0])->get();
		$r["article"] = $r[0];
		unset ($r[0]);
		$r["edit_url"] = $this->link->build('admin','blog','edit',array("id" => $params[0]));
		$r["delete_url"] = $this->link->build('admin','blog','delete',array("id" => $params[0]));
		$r["add_url"] = $this->link->build('admin','blog','add');
		echo $this->twig->render('admin/blog/view.twig', $r);
		return true;
	}
	
	function edit($params)
	{
		$r = \R::$f->begin()->select('*')->from('blog')->where('id = ? ')->put($params[0])->get();
		$r["article"] = $r[0];
		unset ($r[0]);
		$r["form_url"] = $this->link->build('admin','blog','update',$params);
		$this->session->setVar("display_sidebar", false);
		echo $this->twig->render('admin/blog/edit.twig', $r);
		return true;
	}
	
	function update($params)
	{
		$article = \R::load('blog', $params['id']);
		$article->title = $params['title'];
		$article->author = $params['author'];
		$article->date = $params['date'];
		$article->content = stripslashes($params['content']);
		$article->slug = $this->slug($params['title']);
		$id = $params['id'];
		\R::store($article);
		if (isset($params['submit'])){ $a = 'edit'; }
		if (isset($params['save_exit'])){ $a = 'view'; }
		$this->session->setVar("notice", "Article $id updated");
		$this->auth->driveOut('admin/blog/' . $a . '/' . $id);
	}
	
	function add()
	{
		$r_url = $this->link->build('admin','blog','create');
		$r = array("form_url" => $r_url);
		$this->session->setVar("display_sidebar", false);
		echo $this->twig->render('admin/blog/add.twig', $r);
		return true;
	}
	
	function create($params)
	{
		$article = \R::dispense( 'blog' );
		$article->title = $params['title'];
		$article->author = $params['author'];
		$article->date = $params['date'];
		$article->content = stripslashes($params['content']);
		$article->slug = $this->slug($params['title']);
		$id = \R::store($article);
		if (isset($params['submit'])){ $a = 'edit'; }
		if (isset($params['save_exit'])){ $a = 'view'; }
		$this->session->setVar("notice", "Article $id created");
		$this->auth->driveOut('admin/blog/' . $a . '/' . $id);
	}
	
	function delete($params)
	{
		$id = $params[0];
		$article = \R::load('blog', $id);
		\R::trash($article);
		$this->session->setVar("notice", "Article $id deleted");
		$this->auth->driveOut('admin/blog/');
	}
}

?>