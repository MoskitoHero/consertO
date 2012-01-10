<?php
/**
* 
*/

namespace base;

class sidebar extends Main

{
	public $yamlSidebar;
		
	function __construct()
	{
		$yaml = new \base\yaml\sfYamlParser();
		$this->yamlSidebar = $yaml->parse(file_get_contents(APP_ROOT_DIR . '/config/sidebar.yml'));
		$this->link = \base\Link::singleton();
		$this->session = \base\Session::singleton();
		$this->auth = \base\Auth::singleton();
		$this->config = \base\siteConfig::singleton();
		$loader = new \	Twig_Loader_Filesystem('app/views');
		$this->twig = new \Twig_Environment($loader);
	}
	
	function get(){
		$this->getBefore();
		$this->getMenu();
		$this->getAfter();
	}
	
	function getMenu() {
		if ($this->yamlSidebar['menu']) {
			$r = $this->config->getHeaderConfig();
			echo $this->twig->render('__skeleton/menu.twig', $r);
		}
	}
	
	function getBefore() {
		$r = array();
		foreach ($this->yamlSidebar['default']['before'] as $k => $v) {
			$this->printAccordingToType($v);
		}
	}
	
	function getAfter() {
		$r = array();
		foreach ($this->yamlSidebar['default']['after'] as $k => $v) {
			$this->printAccordingToType($v);
		}
	}
	
	function printAccordingToType($v) {
		if ($v["active"]) {
			if ($v["type"] ==  "links") {
				unset($v["type"]);
				unset($v["active"]);
				$r["links"] = $v;
				echo $this->twig->render('__skeleton/sidebar_links.twig', $r);
			}
			if ($v["type"] ==  "text") {
				unset($v["type"]);
				unset($v["active"]);
				$r["text"] = $v;
				echo $this->twig->render('__skeleton/sidebar_text.twig', $r);
			}
			if ($v["type"] ==  "google_analytics") {
				unset($v["type"]);
				unset($v["active"]);
				$r["code"] = $v["code"];
				echo $this->twig->render('__skeleton/sidebar_GA.twig', $r);
			}
			if ($v["type"] == "search") {
				echo $this->twig->render('__skeleton/sidebar_search.twig');
			}
		}
	}
}
?>