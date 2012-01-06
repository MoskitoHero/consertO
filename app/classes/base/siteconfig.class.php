<?php
/**
* 
*/

namespace base;

class siteConfig extends Main

{
	public $mainConfig; // object
	public $jsonConfig;
	public $globalConfig;
	
	function __construct()
	{
		//$this->mainConfig = simplexml_load_file(APP_ROOT_DIR .'/config/config.xml');
		$json = file_get_contents(APP_ROOT_DIR .'/config/config.json');
		$this->jsonConfig = json_decode($json);
		$this->link = new Link();
		$this->session = new Session();
		$this->auth = new Auth();
	}
	
	function getHeaderConfig(){
		foreach ($this->jsonConfig->header as $k => $v){
			$array[$k] = $v;
		}
		$array['current_page'] = $this->getCurrentRoutePrintedName();
		$array['css'] = $this->getCssConfig();
		$array['js'] = $this->getJsConfig();
		if ($this->auth->sessionStarted()) {
			$array['logout'] = "true";
			$array['logout_link'] = $this->link->build('logout');
			$array['login'] = "false";
		} else {
			$array['logout'] = "false";
			$array['login_link'] = $this->link->build('login');
			$array['login'] = "true";
		}
		return $array;
	}
	
	function getFooterConfig(){
		foreach ($this->jsonConfig->footer as $k => $v){
			$array[$k] = $v;
		}
		return $array;
	}
	
	function getCssConfig(){
		foreach ($this->jsonConfig->css as $k => $v){
			$array[] = $this->getAssetURI($v->source, 'css');
		}
		return $array;
	}
	
	function getJsConfig(){
		foreach ($this->jsonConfig->js as $k => $v){
			$array[] = $this->getAssetURI($v->source, 'js');
		}
		return $array;
	}
	
	private function getAssetURI($string, $type) {
		if (strstr($string, 'http://') == false ) {
			$string = APP_ROOT_URL . 'assets/' . $type . '/' . $string;
		}
		return $string;
	}
	
	function getGlobalConfig(){
		if (!isset($this->globalConfig)) {
			foreach ($this->jsonConfig->global as $k => $v){
				$array[$k] = $v;
			}
			$this->globalConfig = $array;
		}
		return $this->globalConfig;
	}
	
	function getCurrentRoutePrintedName() {
		$m = ($this->session->route->module == "root")?"":$this->session->route->module . " ";
		$c = ($this->session->route->controller == "default")?"":$this->session->route->controller;
		$a = ($this->session->route->action == "index")?"":" :: " . $this->session->route->action;
		return $m . $c . $a;
	}
}
?>