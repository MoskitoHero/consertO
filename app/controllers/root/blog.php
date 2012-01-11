<?php
/**
* 
*/
namespace base\root;

use Symfony\Component\HttpFoundation\Session;
use Symfony\Component\HttpFoundation\Response;


class blogController extends \base\Controller
{	
	public $components = array(
						"base\Link" => "link",
						"base\Session" => "session",
						"base\Paginator" => "paginator",
						"base\siteConfig" => "conf"
						);

	function index(){
		$lnk = $this->link->build("root","blog");
		$id = $this->session->var->route["id"];
		$this->paginator->init( $lnk , $id, "blog", 3 );
		$r["blogs"] = \R::getAll("SELECT * FROM blog ORDER BY `id` DESC LIMIT " . $this->paginator->limit);
		foreach ($r["blogs"] as $k => $v) {
			$r["blogs"][$k]["lnk"] = $this->link->build("","blog", "view", array($v["slug"]));
		}
		$r["pagination"] = $this->paginator->paginate();
		echo $this->twig->render("root/blog/index.twig", $r);

	}
	
	function view($params)
	{
		$r = \R::$f->begin()->select("*")->from("blog")->where("slug = ? ")->put($params[0])->get();
		$r["article"] = $r[0];
		unset ($r[0]);
		echo $this->twig->render("root/blog/view.twig", $r);
	}
	function rss(){
		$xml ="<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<rss version=\"2.0\">\n\t<channel>\n\t\t";
		$c = $this->conf->yamlConfig;
		$xml .= "<title>" . $c["header"]["website_title"] . "</title>\n\t\t";
		$xml .= "<link>" . $this->link->build("root","blog","rss") . "</link>\n\t\t";
		$xml .= "<description>" . $c["header"]["website_description"] . "</description>\n\t\t";
		$xml .= "<language>" . $c["header"]["website_locale"] . "</language>\n\t\t";
		$xml .= "<copyright>" . "Copyright " . $c["footer"]["date"] . " " . $c["footer"]["copyright_holder"] . "</copyright>\n\t\t";
		$r["blogs"] = \R::getAll("SELECT * FROM blog ORDER BY `id` DESC LIMIT 10");
		foreach ($r["blogs"] as $k => $v) {
			$xml .= "<item>\n\t\t\t<title>";
			$xml .= $v["title"];
			$xml .= "</title>\n\t\t\t<description>";
			$xml .= $v["article"];
			$xml .= "</description>\n\t\t\t<link>";
			$xml .= $this->link->build("","blog", "view", array($v["slug"]));
			$xml .= "</link>\n\t\t\t<pubdate>";
			$xml .= $v["date"];
			$xml .= "</pubdate>\n\t\t</item>\n\t";
		}
		$xml .= "</channel>\n</rss>";
		$response = new \Symfony\Component\HttpFoundation\Response($xml, 200, array("Content-Type" => "application/rss+xml", "Charset" => "UTF-8"));
		$response->send();
	}
}

?>