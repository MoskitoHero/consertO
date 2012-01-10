<?php
/**
* 
*/

namespace base;

class siteConfig extends Main

{
	public $mainConfig; // object
	public $yamlConfig;
	public $globalConfig;
	
	private static $instance;
	
	function __construct()
	{
		$yaml = new \base\yaml\sfYamlParser();
		$this->yamlConfig = $yaml->parse(file_get_contents(APP_ROOT_DIR . '/config/config.yml'));
		$this->link = \base\Link::singleton();
		$this->session = \base\Session::singleton();
		$this->auth = \base\Auth::singleton();
	}
	
	function getHeaderConfig(){
		foreach ($this->yamlConfig["header"] as $k => $v){
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
		$array = $this->buildMenu($array);
		return $array;
	}
	
	function buildMenu($array)
	{
		switch ( $this->session->getVar('u_lvl') )
		{
			case 10:
				break;
			case 5:
				unset($array['menu']['admin']);
				break;
			case 1:
				unset($array['menu']['admin']);
				unset($array['menu']['vip']);
				break;
			default:
				unset($array['menu']['admin']);
				unset($array['menu']['vip']);
		}
		return $array;
	}
	
	function getFooterConfig(){
		foreach ($this->yamlConfig["footer"] as $k => $v){
			$array[$k] = $v;
		}
		if ($this->session->getVar("display_sidebar") == false) {
			$array["display_sidebar"] = false;
			echo "no sidebar";
		} else {
			$array["display_sidebar"] = true;
		}
		return $array;
	}
	
	function getCssConfig(){
		foreach ($this->yamlConfig["header"]["css"] as $k => $v){
			$array[] = $this->getAssetURI($v["source"], 'css');
		}
		return $array;
	}
	
	function getJsConfig(){
		foreach ($this->yamlConfig["header"]["js"] as $k => $v){
			$array[] = $this->getAssetURI($v["source"], 'js');
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
			foreach ($this->yamlConfig["global"] as $k => $v){
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
	
	public static function singleton()
    {
        if (!isset(self::$instance)) {
            //echo 'Creating new instance of : ';
            $className = __CLASS__;
            //echo $className;
            self::$instance = new $className;
        }
        return self::$instance;
    }
    
    public function __clone()
    {
        trigger_error('Clone is not allowed.', E_USER_ERROR);
    }

    public function __wakeup()
    {
        trigger_error('Unserializing is not allowed.', E_USER_ERROR);
    }
}
?>